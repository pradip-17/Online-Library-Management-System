<?php
// feedback.php
session_start();
include("dbconnect.php");

// ----- CSRF token -----
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$isLoggedIn = isset($_SESSION['user_id']);
$displayName = "";
$displayEmail = "";

if ($isLoggedIn) {
    $uid = (int) $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT username, email FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $stmt->bind_result($displayName, $displayEmail);
    $stmt->fetch();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Send Feedback</title>
    <style>
        body {
            background: #eef2f7;
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .1);
        }

        h3 {
            margin-bottom: 25px;
            color: #0e568d;
            font-size: 28px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 15px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: border .3s;
        }

        input:focus,
        textarea:focus {
            border-color: #0e568d;
            outline: none;
        }

        textarea {
            resize: none;
            height: 150px;
        }

        .note {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            background: #0e568d;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background .3s;
        }

        .btn:hover {
            background: #094067;
        }

        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .link {
            background: #fff;
            border: none;
            display: inline-block;
            margin-top: 20px;
            font-size: 20px;
            color: #0e568d;
            text-decoration: none;
            text-align: center;
            width: 100%;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <?php include "header.php" ?>

    <div class="container">
        <div class="card">


            <h3> Share Your Feedback</h3>

            <?php if (!empty($_SESSION['flash'])) { ?>
                <div class="alert alert-<?= $_SESSION['flash']['type'] ?>"><?= $_SESSION['flash']['msg'] ?></div>
                <?php unset($_SESSION['flash']);
            } ?>

            <form method="post" action="submit_feedback.php" id="fbForm" novalidate>
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="username" name="username" maxlength="30"
                        value="<?= htmlspecialchars($displayName) ?>" <?= $isLoggedIn ? 'readonly' : 'required' ?>>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" maxlength="60"
                        value="<?= htmlspecialchars($displayEmail) ?>" <?= $isLoggedIn ? 'readonly' : 'required' ?>>
                </div>

                <!-- Honeypot (bots fill this) -->
                <input type="text" name="website" style="display:none">

                <div class="form-group">
                    <label for="message">Your Feedback</label>
                    <textarea id="message" name="message" maxlength="2000" required></textarea>
                    <div class="note"><span id="left"></span> Minimum 200 characters required.</div>
                    <div id="error" style="color:red; font-size:14px; display:none;">

                    </div>
                </div>

                <button class="btn" type="submit">Submit Feedback</button>
            </form>



        </div>
    </div>

    <script>
        const msg = document.getElementById('message');
        const left = document.getElementById('left');
        const error = document.getElementById('error');
        const form = document.getElementById('fbForm');

        msg.addEventListener('input', () => {
            let count = 200 - msg.value.length;
            left.textContent = count;

            if (msg.value.length < 200) {
                error.style.display = "block";
            } else {
                error.style.display = "none";
            }
        });

        form.addEventListener('submit', (e) => {
            if (msg.value.length < 200) {
                e.preventDefault();
                error.style.display = "block";
                msg.focus();
            }
        });
    </script>
</body>

</html>