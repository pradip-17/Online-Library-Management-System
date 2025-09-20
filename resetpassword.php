<?php
session_start();
require 'dbconnect.php';

$success = "";
$error = "";

$email = $_SESSION['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $password = $_POST['user_password'] ?? '';
  $confirmPassword = $_POST['confirm_password'] ?? '';

  if (strlen($password) < 8) {
    $error = "Password must be at least 8 characters.";
  } elseif ($password !== $confirmPassword) {
    $error = "Passwords do not match.";
  } else {
    // Secure password hashing
    $Password = $password;

    $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $Password, $email);

    if ($stmt->execute()) {
      // sessionમાં success flag drop
      $_SESSION['reset_success'] = true;

      // destroy old session but email copy save
      $emailCopy = $email;
      session_unset();
      session_destroy();

      // redirect to login with email
      header("Location: login.php?email=" . urlencode($emailCopy));
      exit();
    } else {
      $error = "Something went wrong.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="styles.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .reset-bg {
      background-image: url('Img/back-ground img6.png');
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .reset-box {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      width: 90%;
      max-width: 500px;
      height: 450px;
      background-color: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(10px);
      border-radius: 40px;
      padding: 20px;
    }

    .reset-title {
      color: white;
      font-size: 2em;
      text-align: center;
      padding-bottom: 50px;
    }

    .reset-form-group {
      position: relative;
      border-bottom: 3px solid white;
      width: 100%;
      max-width: 350px;
      margin: 20px auto;
    }

    .reset-form-group input {
      width: 100%;
      height: 50px;
      background: transparent;
      border: none;
      outline: none;
      font-size: 1.1em;
      color: rgba(242, 240, 240, 0.9);
      padding: 20px 20px 10px 20px;
    }

    .reset-form-group input::placeholder {
      color: transparent;
    }

    .reset-form-group label {
      position: absolute;
      top: 50%;
      left: 20px;
      transform: translateY(-50%);
      font-size: 1.2em;
      color: aliceblue;
      pointer-events: none;
      transition: 0.3s;
    }

    .reset-form-group input:focus+label,
    .reset-form-group input:not(:placeholder-shown)+label {
      top: 0;
      color: #fff;
    }

    .reset-toggle-password {
      position: absolute;
      right: 10px;
      top: 12px;
      cursor: pointer;
    }

    #reset-btn {
      width: 100%;
      height: 40px;
      border-radius: 40px;
      border: none;
      font-size: 1.5em;
      font-weight: 400;
      margin: 40px 0;
      cursor: pointer;
      transition: 0.5s;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgb(21, 80, 125);
    }

    #reset-btn:hover {
      background-color: rgb(28, 69, 101);
      color: aliceblue;
    }

    #phpMessage {
      margin-top: 10px;
      font-size: 1rem;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="reset-bg">
    <div class="reset-box">
      <form action="resetpassword.php" method="POST" id="resetForm">
        <h2 class="reset-title">Reset your password</h2>

        <!-- password -->
        <div class="reset-form-group" style="position: relative;">
          <input type="password" id="userPassField" name="user_password" placeholder=" " maxlength="70" required />
          <label>Password</label>
          <span class="reset-toggle-password" onclick="togglePassword('userPassField', 'eyeIconPass')">
            <img id="eyeIconPass" src="img/hide.png" width="24" height="24" />
          </span>
          <span id="passErrorMsg"
            style="color:red; position:absolute; right:10px; top:50%; transform:translateY(-50%); font-size:0.9rem;"></span>
        </div>

        <!-- confirm password -->
        <div class="reset-form-group" style="position: relative;">
          <input type="password" id="confirm-password" name="confirm_password" placeholder=" " maxlength="70"
            required />
          <label>Confirm Password</label>
          <span class="reset-toggle-password" onclick="togglePassword('confirm-password', 'eyeIcon2')">
            <img id="eyeIcon2" src="img/hide.png" width="24" height="24" />
          </span>
          <span id="password-error"
            style="color:red; position:absolute; right:10px; top:50%; transform:translateY(-50%); font-size:0.9rem;"></span>
        </div>

        <button id="reset-btn" type="submit">Submit</button>

        <!-- PHP Message -->
        <?php if (!empty($error)): ?>
          <p id="phpMessage" style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <script>
    // Hide PHP error after 3 sec
    setTimeout(() => {
      const phpMsg = document.getElementById("phpMessage");
      if (phpMsg && phpMsg.style.color === "red") {
        phpMsg.style.display = "none";
      }
    }, 3000);

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

    // strong password check
    document.getElementById("userPassField").addEventListener("blur", function () {
      let passInput = document.getElementById("userPassField");
      let passError = document.getElementById("passErrorMsg");
      let passwordValue = passInput.value.trim();

      if (passwordValue.length > 0 && passwordValue.length < 8) {
        passError.textContent = "Password must be at least 8 characters.";
        passInput.value = "";
        passInput.focus();
        setTimeout(() => { passError.textContent = ""; }, 3000);
      }
    });

    // confirm password check
    document.getElementById("confirm-password").addEventListener("blur", function () {
      let passInput = document.getElementById("userPassField");
      let confirmInput = document.getElementById("confirm-password");
      let confirmError = document.getElementById("password-error");

      if (confirmInput.value.length > 0 && passInput.value !== confirmInput.value) {
        confirmError.textContent = "Passwords do not match.";
        confirmInput.value = "";
        confirmInput.focus();
        setTimeout(() => { confirmError.textContent = ""; }, 3000);
      }
    });
  </script>
</body>
</html>