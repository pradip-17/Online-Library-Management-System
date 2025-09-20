<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="icon" type="image/png" href="img/library logo.png">

  <style>
    body.contactus-body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #012d38ff;
      margin: 0;
      padding: 0;
      color: #fff;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .contactus-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    .contactus-container {
      width: 100%;
      max-width: 600px;
      background: #042937ff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      text-align: center;
    }

    .contactus-title {
      font-size: 2.5rem;
      margin-bottom: 25px;
      color: #feca57;
      letter-spacing: 2px;
    }

    .contactus-info h3 {
      margin-bottom: 20px;
      color: #feca57;
      font-size: 2rem;
    }

    .contactus-info p {
      margin-bottom: 15px;
      line-height: 1.6;
      font-size: 1.1rem;
    }

    .contactus-info strong {
      color: #fff;
    }
  </style>
</head>

<body class="contactus-body">

  <?php include "header.php" ?>

  <div class="contactus-wrapper">
    <div class="contactus-container">
      <h2 class="contactus-title">Contact Us</h2>
      <div class="contactus-info">
        <h3>Contact Information</h3>
        <p><strong>Address:</strong> 123 Library Street, Surat, India</p>
        <p><strong>Phone:</strong> +91 76220 89347</p>
        <p><strong>Email:</strong> support@onlinelibrary.com</p>
        <p>We’re here to help you 24/7. You can send us an email any time!</p>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      window.onbeforeunload = function () {
        window.scrollTo(0, 0);
      };
    });
  </script>
</body>

</html>
+