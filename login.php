<?php
session_start();
require 'dbconnect.php';

// Default values
$emailValue = "";
$passwordValue = "";
$message = "";

// Prefill from GET first (when redirected with email)
if (!empty($_GET['email'])) {
  $emailValue = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
}

// Handle POST (login form submit)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST['email'] ?? '');
  $password = trim($_POST['password'] ?? '');

  if (!empty($email) && !empty($password)) {
    $sql = "SELECT * FROM user WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();

      // If password is hashed, use password_verify, else direct compare
      if (password_verify($password, $user['password']) || $user['password'] === $password) {
        $_SESSION['user'] = $user;
        $_SESSION['user_id'] = $user['user_id'];
        header("Location: searchbook.php");
        exit();
      } else {
        $_SESSION['login_message'] = "Incorrect password.";
        $_SESSION['email_value'] = $email;
        $_SESSION['password_value'] = "";
      }
    } else {
      $_SESSION['login_message'] = "Invalid email.";
      $_SESSION['email_value'] = "";
      $_SESSION['password_value'] = $password;
    }
    header("Location: login.php");
    exit();
  } else {
    $_SESSION['login_message'] = "Please fill in all fields.";
    $_SESSION['email_value'] = $email;
    $_SESSION['password_value'] = $password;
    header("Location: login.php");
    exit();
  }
}

// Retrieve session data after redirect
if (isset($_SESSION['login_message'])) {
  $message = $_SESSION['login_message'];
  unset($_SESSION['login_message']);
}
if (isset($_SESSION['email_value']) && empty($emailValue)) {
  $emailValue = $_SESSION['email_value'];
  unset($_SESSION['email_value']);
}
if (isset($_SESSION['password_value'])) {
  $passwordValue = $_SESSION['password_value'];
  unset($_SESSION['password_value']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="icon" type="image/png" href="img/library logo.png">
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <style>
    /* Footer Design */
    .footer {
      background-color: black;
      color: #999;
      padding: 40px 20px;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .footer a {
      color: #075069ff;
      /* link color */
      text-decoration: none;
      font-size: 14px;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .footer-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 270px;
      /* responsive spacing between columns */
      margin-top: 25px;
    }

    .footer-grid div p {
      font-weight: bold;
      color: #9e9a2bff;
      margin-bottom: 10px;
    }

    .footer-contact {
      margin-bottom: 25px;
      font-size: 16px;
      color: #ff6b6b;
    }

    .footer-contact a {
      color: #feca57;
    }

    @media screen and (max-width: 768px) {
      .footer-grid {
        gap: 40px;
      }
    }
  </style>
</head>

<body>
  <div class="img d-flex align-items-center justify-content-center">
    <!-- main container -->
    <div class="login-form-container">
      <form method="POST" action="" class="w-100" autocomplete="off">

        <h2 class="title">Login</h2>

        <!-- Email -->
        <div class="form-group">
          <input type="text" name="email" id="email" placeholder=" " required
            value="<?= htmlspecialchars($emailValue ?? '') ?>" />
          <label>Email</label>
        </div>

        <!-- Password -->
        <div class="form-group position-relative">
          <input type="password" id="password" name="password" placeholder=" " required
            value="<?= htmlspecialchars($passwordValue ?? '') ?>" />
          <label for="password">Password</label>
          <span class="toggle-password" onclick="togglePassword()"
            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
            <img id="eyeIcon" src="img/hide.png" width="24" height="24" />
          </span>
        </div>

        <p>

          <label for="remember">Don't remember me</label>
          <a href="forget.php">Forget password?</a>
        </p>

        <button id="for-btn-login" type="submit">Login</button>

        <p>Don't have an account? <a href="register.php">Register</a></p>

        <!-- Error Message Show -->
        <?php if (!empty($message)): ?>
          <div id="login-message" style="color: red; text-align: center; margin-top: 10px;">
            <?= htmlspecialchars($message) ?>
          </div>

          <script>
            // Hide message after 3 seconds
            setTimeout(() => {
              const msg = document.getElementById("login-message");
              if (msg) msg.style.display = "none";
            }, 3000);
          </script>
        <?php endif; ?>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer>  
    <div class="login-footer">  
        <div class="login-footer-contact">  
            Questions? Call <a href="tel:000-800-919-1743">+91 76220 89347</a>  
        </div>  
        <div class="login-footer-grid">  
            <div>  
                <p>Discover</p>  
                <a href="index.php">Home</a><br>  
                <a href="about_us.php">About Us</a>  
            </div>  
            <div>  
                <p>Support</p>  
                <a href="help_center.php">Help Centre</a> <br>  
            </div>  
            <div>  
                <p>Legal</p>  
                <a href="Privacy_policy.php">Privacy Policy</a>  
            </div>  
            <div>  
                <p>Contact</p>  
                <a href="contact_us.php">Contact Us</a>  
            </div>  
        </div>  
    </div>  
</footer>

  <script src="javascript.js"></script>

  <!-- Bootstrap JS -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>