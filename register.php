<?php
session_start();
require 'dbconnect.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST["username"] ?? '');
  $email = trim($_POST["email"] ?? '');
  $password = $_POST["password"] ?? '';
  $confirm = $_POST["confirm_password"] ?? '';
  $address = trim($_POST["address"] ?? '');
  $contact = trim($_POST["contact_number"] ?? '');
  $gender = $_POST["gender"] ?? '';
  $user_type = $_POST["user_type"] ?? '';

  if (!$username || !$email || !$password || !$confirm || !$address || !$contact || !$gender || !$user_type) {
    $error = "All fields are required.";
  } elseif ($password !== $confirm) {
    $error = "Passwords do not match!";
  } else {
    // Check email duplication
    $check = $conn->prepare("SELECT user_id FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
      echo "<script>alert('This email is already registered.');</script>";
    } else {
      $Password = $password;
      $otp = rand(1000, 9999);
      $expiry = date("Y-m-d H:i:s", strtotime("+3 minutes"));

      $_SESSION['email'] = $email;
      $_SESSION['otp_for'] = 'register';

      $stmt = $conn->prepare("INSERT INTO user
        (username, email, password, address, contact_number, gender, user_type, otp, otp_used, otp_expiry)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'no', ?)");
      $stmt->bind_param("sssssssis", $username, $email, $Password, $address, $contact, $gender, $user_type, $otp, $expiry);
      $stmt->execute();

      // Send OTP Email
      $mail = new PHPMailer(true);
      try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pradipshiyani75@gmail.com';
        $mail->Password = 'cqwx caci uyhf wiwl'; // Gmail App password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('pradipshiyani75@gmail.com', ' Online Library');
        $mail->addAddress($email, $username);
        $mail->isHTML(true);
        $mail->Subject = ' Your OTP Code for Online Library Registration';

        // HTML Email Template
        $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <style>
            body {
              margin: 0;
              padding: 0;
              background: #f4f6f8;
              font-family: Arial, sans-serif;
            }
            .container {
              max-width: 600px;
              margin: 20px auto;
              background: #fff;
              border-radius: 10px;
              overflow: hidden;
              box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }
            .header {
              background: #007bff;
              color: #fff;
              padding: 15px;
              text-align: center;
              font-size: 22px;
              font-weight: bold;
            }
            .content {
              padding: 20px;
              text-align: center;
              color: #333;
            }
            .content h2 {
              margin-top: 0;
            }
            .otp-box {
              display: inline-block;
              padding: 15px 25px;
              background: #f1f5ff;
              border: 2px dashed #007bff;
              font-size: 28px;
              font-weight: bold;
              color: #007bff;
              letter-spacing: 4px;
              margin: 20px 0;
              border-radius: 8px;
            }
            .footer {
              background: #343a40;
              color: #fff;
              padding: 10px;
              text-align: center;
              font-size: 12px;
            }
          </style>
        </head>
        <body>
          <div class="container">
            <div class="header"> Online Library</div>
            <div class="content">
              <h2>Hello, ' . htmlspecialchars($username) . ' </h2>
              <p>Thank you for registering with <strong>Online Library</strong>.</p>
              <p>Please use the following OTP to complete your registration:</p>
              <div class="otp-box">' . $otp . '</div>
              <p>This OTP is valid for <strong>3 minutes</strong> and can only be used once.</p>
              <p>If you did not request this, please ignore this email.</p>
            </div>
            <div class="footer">
              &copy; ' . date("Y") . ' Online Library. All Rights Reserved.
            </div>
          </div>
        </body>
        </html>
        ';
        $mail->send();
      } catch (Exception $e) {
        $error = "OTP email sending failed. Please try again.";
      }

      if (!isset($error)) {
        header("Location: verifyotp.php");
        exit();
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="register-bg">
    <div class="register-box">
      <form id="registerForm" action="register.php" method="POST">
        <h2 class="register-title">Sign Up</h2>
        <p style="color: #fff;">Create new account</p>

        <div class="register-form-group">
          <input type="text" name="username" placeholder=" " maxlength="50" required />
          <label>User Name</label>
        </div>

        <div class="register-form-group">
          <input type="email" name="email" id="email" placeholder=" " maxlength="50" required />
          <label>Email</label>
          <span id="register-error-email" style="color:red;"></span>
        </div>

        <div class="register-form-group" style="position: relative;">
          <input type="password" id="userPassField" name="password" placeholder=" " maxlength="70" required />
          <label>Password</label>
          <span class="register-toggle-password" onclick="togglePassword('userPassField', 'eyeIconPass')">
            <img id="eyeIconPass" src="img/hide.png" width="24" height="24" />
          </span>
          <span id="register-error-pass" style="color:red;"></span>
        </div>

        <div class="register-form-group">
          <input type="password" id="confirm-password" name="confirm_password" placeholder=" " maxlength="70"
            required />
          <label>Confirm Password</label>
          <span class="register-toggle-password" onclick="togglePassword('confirm-password', 'eyeIcon2')">
            <img id="eyeIcon2" src="img/hide.png" width="24" height="24" />
          </span>
          <span id="register-error-confirm" style="color:red;"></span>
        </div>

        <div class="register-form-group">
          <input type="text" name="address" placeholder=" " maxlength="150" required />
          <label>Address</label>
        </div>

        <div class="register-form-group">
          <input type="number" name="contact_number" id="contact" placeholder=" " maxlength="10" required />
          <label for="contact">Contact number</label>
          <span id="register-error-contact" style="color:red;"></span>
        </div>

        <div class="register-gender-options">
          <label>Gender :</label>
          <label><input type="radio" name="gender" value="male" /> Male</label>
          <label><input type="radio" name="gender" value="female" /> Female</label>
          <label><input type="radio" name="gender" value="other" /> Other</label>
        </div>

        <div class="register-usertype-options">
          <label>User type :</label>
          <label><input type="radio" name="user_type" value="school" /> School</label>
          <label><input type="radio" name="user_type" value="employee" /> Employee</label>
        </div>

        <button id="register-btn" type="submit">Sign Up</button>
      </form>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    function togglePassword(inputId, eyeIconId) {
      const passwordInput = document.getElementById(inputId);
      const eyeIcon = document.getElementById(eyeIconId);
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.src = "img/seen.png";
      } else {
        passwordInput.type = "password";
        eyeIcon.src = "img/hide.png";
      }
    }

    // Email Validation
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("register-error-email");
    const allowedDomains = ["gmail.com", "yahoo.com", "outlook.com", "hotmail.com", "live.com", "icloud.com", "aol.com", "protonmail.com", "zoho.com", "rediffmail.com", "yandex.com", "mail.ru", "gmx.com", "qq.com"];
    emailInput.addEventListener("blur", () => {
      const emailValue = emailInput.value.trim();
      const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
      if (emailValue !== "" && !emailPattern.test(emailValue)) {
        emailError.textContent = "Invalid email format";
        emailInput.value = "";
        setTimeout(() => { emailError.textContent = ""; }, 3000);
        emailInput.focus();
        return;
      }
      const domain = emailValue.split("@")[1]?.toLowerCase();
      if (domain && !allowedDomains.includes(domain)) {
        emailError.textContent = "Use a specific free email provider";
        emailInput.value = "";
        setTimeout(() => { emailError.textContent = ""; }, 3000);
        emailInput.focus();
        return;
      }
      emailError.textContent = "";
    });

    // Password Strength
    document.getElementById("userPassField").addEventListener("blur", function () {
      let passInput = document.getElementById("userPassField");
      let passError = document.getElementById("register-error-pass");
      let passwordValue = passInput.value.trim();
      if (passwordValue === "") { passError.textContent = ""; return; }
      let passPattern = /^.{8,}$/;
      if (!passPattern.test(passwordValue)) {
        passError.textContent = "Password must be at least 8 characters";
        passInput.value = "";
        passInput.focus();
        setTimeout(() => { passError.textContent = ""; }, 3000);
      } else { passError.textContent = ""; }
    });

    // Confirm Password
    document.getElementById("confirm-password").addEventListener("blur", function () {
      let passInput = document.getElementById("userPassField");
      let confirmInput = document.getElementById("confirm-password");
      let confirmError = document.getElementById("register-error-confirm");
      if (confirmInput.value.trim() === "") { confirmError.textContent = ""; return; }
      if (passInput.value !== confirmInput.value) {
        confirmError.textContent = "Passwords do not match.";
        confirmInput.value = "";
        confirmInput.focus();
        setTimeout(() => { confirmError.textContent = ""; }, 3000);
      } else { confirmError.textContent = ""; }
    });

    // Contact Validation
    const contactInput = document.getElementById("contact");
    const contactError = document.getElementById("register-error-contact");
    contactInput.addEventListener("input", () => {
      let value = contactInput.value.replace(/\D/g, "");
      if (value.length > 10) value = value.slice(0, 10);
      contactInput.value = value;
    });
    contactInput.addEventListener("blur", () => {
      if (contactInput.value.length !== 10) {
        contactError.textContent = "Please enter exactly 10 digits";
        setTimeout(() => { contactError.textContent = ""; }, 3000);
      } else { contactError.textContent = ""; }
    });

    // Final Check
    document.getElementById("registerForm").addEventListener("submit", function (e) {
      let username = document.querySelector('input[name="username"]').value.trim();
      let email = document.querySelector('input[name="email"]').value.trim();
      let password = document.querySelector('input[name="password"]').value.trim();
      let confirmPassword = document.querySelector('input[name="confirm_password"]').value.trim();
      let address = document.querySelector('input[name="address"]').value.trim();
      let contact = document.querySelector('input[name="contact_number"]').value.trim();
      let gender = document.querySelector('input[name="gender"]:checked');
      let userType = document.querySelector('input[name="user_type"]:checked');
      if (!username || !email || !password || !confirmPassword || !address || !contact || !gender || !userType) {
        alert("Please fill in all the fields.");
        e.preventDefault();
        return;
      }
    });

    // Scroll Top On Refresh
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () { window.scrollTo(0, 0); };
    });
  </script>
</body>

</html>