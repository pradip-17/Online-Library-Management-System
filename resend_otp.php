<?php
session_start();
require 'dbconnect.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// fetchind email from session
$email = $_SESSION['email'] ?? '';
$process = $_SESSION['otp_for'] ?? '';

if (!$email || !$process) {
    die("Invalid process. Please start again.");
}

// generate new otp
$newOtp = rand(1000, 9999);
$expiryTime = date("Y-m-d H:i:s", strtotime("+3 minutes"));

// update in database
$stmt = $conn->prepare("UPDATE user SET otp=?, otp_expiry=?, otp_used='no' WHERE email=?");
$stmt->bind_param("sss", $newOtp, $expiryTime, $email);
$stmt->execute();

// send email
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'pradipshiyani75@gmail.com'; 
    $mail->Password   = 'cqwx caci uyhf wiwl'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('pradipshiyani75@gmail.com', 'online library management system');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Your Resent OTP Code';
    $mail->Body    = "<p>Dear user,</p>
                      <p>Your new OTP is: <b>$newOtp</b></p>
                      <p>This OTP will expire in 3 minutes.</p>";

    $mail->send();

    header("Location: verifyotp.php?resent=1");
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}