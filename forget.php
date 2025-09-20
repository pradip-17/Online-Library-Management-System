<?php
session_start();
require 'dbconnect.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error_message = "";

// Get email from POST
$email = $_POST['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($email) {
    // Get latest user with this email
    $stmt = $conn->prepare("SELECT * FROM user WHERE email=? ORDER BY user_id DESC LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user) {
      $otp = rand(1000, 9999);
      $expiry = date("Y-m-d H:i:s", strtotime("+180 seconds"));

      // Update OTP in DB
      $update = $conn->prepare("UPDATE user SET otp=?, otp_expiry=?, otp_used='no' WHERE user_id=?");
      $update->bind_param("ssi", $otp, $expiry, $user['user_id']);
      $update->execute();

      // Send OTP via email
      $mail = new PHPMailer(true);
      try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "pradipshiyani75@gmail.com";
        $mail->Password = "cqwx caci uyhf wiwl"; // App password
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->setFrom("pradipshiyani75@gmail.com", "Online Library");
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = " Reset Your Password - by otp";

        //  Beautiful Email Template
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; background: #f7f8fa; padding: 20px;'>
          <div style='max-width: 500px; margin: auto; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);'>
            <div style='background: #4a90e2; padding: 20px; text-align: center; color: white;'>
              <h1 style='margin: 0;'>My Library</h1>
            </div>
            <div style='padding: 20px; color: #333;'>
              <h2 style='margin-top: 0; color: #4a90e2;'>Forgot Password</h2>
              <p>Hello <strong>{$user['username']}</strong>,</p>
              <p>We received a request to reset your password. Use the following One-Time Password (OTP) to proceed:</p>
              
              <div style='font-size: 28px; font-weight: bold; text-align: center; margin: 20px 0; color: #4a90e2;'>
                $otp
              </div>
              
              <p>This OTP is valid for <strong>3 minutes</strong>. If you did not request a password reset, please ignore this email.</p>
              
              <p style='margin-top: 30px;'>Thank you,<br><strong>My Library Team</strong></p>
            </div>
            <div style='background: #f1f1f1; padding: 10px; text-align: center; font-size: 12px; color: #555;'>
              &copy; " . date('Y') . " My Library. All rights reserved.
            </div>
          </div>
        </div>";

        $mail->send();

        //  Set session for OTP verification
        $_SESSION['email'] = $email;
        $_SESSION['otp_for'] = 'forget';

        header("Location: verifyotp.php");
        exit();
      } catch (Exception $e) {
        $error_message = "Failed to send OTP email.";
      }
    } else {
      $error_message = "Email not found!";
    }
  } else {
    $error_message = "Please enter an email address.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forget</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="forget-img">
    <div class="forget-container">
      <form method="POST" action="">
        <h2 class="forget-title-1">Reset your password</h2>
        <p class="text-white text-center">Don't worry, we can help.</p>

        <div class="forget-form-group">
          <input type="text" id="email" name="email" placeholder=" " required />
          <label for="email">Email</label>
        </div>

        <button id="forget-btn" type="submit">Send OTP</button>

        <!-- Error Message Below Button -->
        <?php if (!empty($error_message)): ?>
          <div id="error-msg" style="color:red; font-size:14px; margin-top:8px; text-align:center;">
            <?= htmlspecialchars($error_message) ?>
          </div>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>

  <?php if (!empty($error_message)): ?>
    <script>
      setTimeout(function () {
        document.getElementById('error-msg').style.display = 'none';
      }, 3000); // 3 seconds
    </script>
  <?php endif; ?>
</body>

</html>