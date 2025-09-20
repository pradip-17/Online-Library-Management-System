<?php
session_start();
include("../dbconnect.php");

$errorMessage = "";
$inputUsername = "";
$inputPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $inputUsername = $username;
    $inputPassword = $password;

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM admins WHERE admin_username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($admin = mysqli_fetch_assoc($result)) {
                if ($password === $admin['admin_password']) {
                    //  Set session variables
                    $_SESSION["admin_logged_in"] = true;
                    $_SESSION["admin_id"] = $admin['admin_id'];
                    $_SESSION["admin_username"] = $admin['admin_username'];

                    header("Location: dashboard.php");
                    exit();
                } else {
                    $errorMessage = " Password does not match.";
                    $inputPassword = "";
                }
            } else {
                $errorMessage = " Username not found.";
                $inputUsername = "";
            }
        } else {
            $errorMessage = " Query preparation error.";
        }
    } else {
        $errorMessage = "⚠ All fields are required.";
        if (empty($username))
            $inputUsername = "";
        if (empty($password))
            $inputPassword = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="icon" type="image/png" href="../img/library logo.png">

    <style>
        body.admin-login-body {
            margin: 0;
            background-image: url('../Img/back-ground img6.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .admin-login-container {
            background: black;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            height:340px;
        }

        .admin-login-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .admin-login-input {
            width: 94.5%;
            padding: 10px;
            margin-bottom: 30px;
            background: #333;
            color: white;
            border: none;
        }

        .admin-login-button {
            width: 100%;
            margin-top: 25px;
            padding: 10px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .admin-login-button:hover {
            background-color:  #525252ff;
            color: aliceblue;
        }

        .admin-login-error {
            color: red;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
        
    </style>
</head>

<body class="admin-login-body">
    <div class="admin-login-container">
        <h2 class="admin-login-title">Admin Login</h2>


        <form method="post">
            <input type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($inputUsername) ?>"
                class="admin-login-input" maxlength="50" required>
            <input type="password" name="password" placeholder="Password" maxlength="50"
                value="<?= htmlspecialchars($inputPassword) ?>" class="admin-login-input" required>
            <button type="submit" class="admin-login-button">Login</button>
        </form>

        <?php if (!empty($errorMessage)): ?>
            <div id="adminErrorMsg" class="admin-login-error"><?= $errorMessage ?></div>
        <?php endif; ?>
    </div>

    <!-- Auto-hide message after 3 seconds -->
    <script>
        const errorMsg = document.getElementById("adminErrorMsg");
        if (errorMsg) {
            setTimeout(() => {
                errorMsg.style.display = "none";
            }, 3000);
        }
    </script>
</body>

</html>