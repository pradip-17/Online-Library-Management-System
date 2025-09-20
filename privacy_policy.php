<?php
// privacy.php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy </title>
    <link rel="icon" type="image/png" href="img/library logo.png">


    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--light);
            color: var(--text);
            margin: 0;
        }

        /* ===== Header ===== */
        .privacy-header {
           
            color: #060606ff;
            text-align: center;
            padding: 60px 20px;
            box-shadow: var(--shadow);
        }

        .privacy-header h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .privacy-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* ===== Content ===== */
        .privacy-container {
            max-width: 950px;
            margin: 30px auto;
            padding: 25px 20px;
            background: var(--card);
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        .privacy-container h2 {
            font-size: 1.3rem;
            margin: 18px 0 10px;
            color: var(--primary);
        }

        .privacy-container p,
        .privacy-container li {
            color: var(--muted);
            margin-bottom: 12px;
        }

        .privacy-container ul {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        /* ===== Footer ===== */
        .privacy-footer {
            text-align: center;
            padding: 18px;
            margin-top: 40px;
            background: #f1f3f9;
            color: var(--muted);
            font-size: 0.9rem;
        }

        .privacy-footer a {
            color: var(--primary);
            text-decoration: none;
            margin: 0 6px;
            font-weight: 500;
        }

        .privacy-footer a:hover {
            text-decoration: underline;
        }

        .privacy-policy-cancel-btn {
            position: absolute;
            right: 20px;
            top: 5%;
            transform: translateY(-50%);
            background: #204266ff;
            border: none;
            color: white;
            font-size: 1.2rem;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .privacy-policy-cancel-btn:hover {
            background: #ff1a1a;
        }
    </style>
</head>

<body>

    <?php include "header.php" ?>

    <!-- Header -->
    <header class="privacy-header">
        <h1>Privacy Policy</h1>
        <button class="privacy-policy-cancel-btn" onclick="window.history.back()">✖</button>
        <p>Your privacy matters at Online Library Management System</p>
    </header>

    <!-- Content -->
    <main class="privacy-container">
        <h2>1. Information We Collect</h2>
        <p>We collect personal details like <strong>name, email, and password</strong> during registration. This
            information is stored securely in our database.</p>

        <h2>2. How We Use Your Data</h2>
        <p>Your information is used only for:</p>
        <ul>
            <li>Account creation and login authentication</li>
            <li>Book borrowing & downloading features</li>
            <li>Sending verification OTP and password reset emails</li>
        </ul>

        <h2>3. Data Security</h2>
        <p>We use encryption (hashed passwords) and secure sessions to protect your account. Unauthorized access to user
            data is strictly prevented.</p>

        <h2>4. Cookies</h2>
        <p>We may use cookies to improve user experience, such as keeping you logged in. You can disable cookies in your
            browser settings.</p>

        <h2>5. Third-Party Sharing</h2>
        <p>Your personal data is <strong>never sold or shared</strong> with third parties. Data is used only within the
            Online Library Management System.</p>

        <h2>6. OTP & Email Security</h2>
        <p>OTP is valid for limited time (60–180 seconds). We recommend not sharing OTP or password with anyone.</p>

        <h2>7. User Rights</h2>
        <p>You can request to update or delete your account anytime. For support, email us at
            <strong>support@onlinelibrary.com</strong>.
        </p>

        <h2>8. Updates</h2>
        <p>This privacy policy may be updated from time to time. Please check this page periodically.</p>
    </main>

    <!-- Footer -->
    <footer class="privacy-footer">
        <p>&copy; 2025 Online Library Management System </p>
    </footer>

    <script>
        // when you refersh page then reload page top
        document.addEventListener("DOMContentLoaded", function () {
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            };
        });

    </script>
</body>

</html>