<?php
session_start();
require 'dbconnect.php';



$email = $_SESSION['email'] ?? '';
$process = $_SESSION['otp_for'] ?? '';

if (!isset($_SESSION['email']) && isset($_GET['email'])) {
    $_SESSION['email'] = $_GET['email'];
    $_SESSION['otp_for'] = 'register';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify_otp'])) {
    $digit1 = $_POST['digit1'] ?? '';
    $digit2 = $_POST['digit2'] ?? '';
    $digit3 = $_POST['digit3'] ?? '';
    $digit4 = $_POST['digit4'] ?? '';
    $userOtp = $digit1 . $digit2 . $digit3 . $digit4;

    $sql = "SELECT * FROM user WHERE email = ? ORDER BY user_id DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if (!$result) {
        $error = "Email not found!";
    } else {
        $otp = $result['otp'];
        $expiry = $result['otp_expiry'];
        $otp_used = $result['otp_used'];
        $now = date("Y-m-d H:i:s");

        if ($otp_used == 'yes') {
            $error = "This OTP has already been used";
        } elseif ($now > $expiry) {
            $error = "OTP has expired";
        } elseif ($userOtp != $otp) {
            $error = "OTP is wrong";
        } else {
            $up = $conn->prepare("UPDATE user SET otp_used='yes' WHERE email=?");
            $up->bind_param("s", $email);
            $up->execute();

            unset($_SESSION['otp_for']);
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['user'] = $result['username'];

            if ($process === 'register') {
                header("Location: login.php");
                exit();
            } elseif ($process === 'forget') {
                header("Location: resetpassword.php");
                exit();
            } else {
                die("Unknown process.");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verifyotp</title>
    <link rel="icon" type="image/png" href="img/library logo.png">
    <link rel="stylesheet" href="styles.css" />
    

</head>
</body>


<div class="otp-bg">
    <div class="otp-container">

        <!-- OTP Form -->
        <form method="post" action="verifyotp.php">
            <h2 class="otp-title">Verification Code</h2>
            <h6 style="color:white;">We have sent the verification code to your email address.</h6>

            <?php if (!empty($_GET['resent'])): ?>
                <p style="color:lightgreen;">New OTP has been sent to your email.</p>
            <?php endif; ?>

            <div class="otp-input-group">
                <input type="text" name="digit1" maxlength="1" required oninput="moveNext(this, 'digit2')" onkeydown="handleBack(this, event, null)">
                <input type="text" name="digit2" maxlength="1" required oninput="moveNext(this, 'digit3')" onkeydown="handleBack(this, event, 'digit1')">
                <input type="text" name="digit3" maxlength="1" required oninput="moveNext(this, 'digit4')" onkeydown="handleBack(this, event, 'digit2')">
                <input type="text" name="digit4" maxlength="1" required onkeydown="handleBack(this, event, 'digit3')">
            </div>

            <button id="otp-confirm-btn" name="verify_otp" type="submit">Confirm</button>

            <div class="otp-timer">
                Time left: <span id="otp-countdown">03:00</span>
            </div>
        </form>

        <!-- Resend OTP Button -->
        <div class="otp-resend-container">
            <form method="post" action="resend_otp.php">
                <button type="submit" class="btn btn-warning btn-sm otp-resend-btn" id="otp-resendBtn" disabled>
                    Resend OTP
                </button>
            </form>
        </div>

         <?php if (!empty($error)): ?>
                <p id="otp-err" style="color:red;"><?php echo $error; ?></p>
                <script>
                    setTimeout(function () {
                        document.getElementById("otp-err").style.display = "none";
                    }, 3000);
                </script>
            <?php endif; ?>
    </div>
</div>

<script>
function moveNext(current, nextName) {
    if (current.value.length === 1 && nextName) {
        document.getElementsByName(nextName)[0].focus();
    }
}

function handleBack(current, event, prevName) {
    if (event.key === "Backspace") {
        if (current.value === "" && prevName) {
            document.getElementsByName(prevName)[0].focus();
        }
    }
}

// Countdown Timer - 3 minutes
let timeLeft = 180;
let countdownElem = document.getElementById("otp-countdown");
let resendBtn = document.getElementById("otp-resendBtn");

let timer = setInterval(function () {
    let minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;
    countdownElem.textContent =
        (minutes < 10 ? "0" : "") + minutes + ":" +
        (seconds < 10 ? "0" : "") + seconds;

    timeLeft--;

    if (timeLeft < 0) {
        clearInterval(timer);
        countdownElem.textContent = "Expired";
        document.getElementById("otp-confirm-btn").disabled = true;
        resendBtn.disabled = false;
    }
}, 1000);
</script>

    
</body>
</html>