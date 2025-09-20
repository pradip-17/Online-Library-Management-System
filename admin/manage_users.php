<?php

require '../dbconnect.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $user_id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM user WHERE id=$user_id");
    header("Location: manage_users.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Manage</title>
    <link rel="icon" type="image/png" href="../img/library logo.png">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #eef1f5;
        }

        /* Content next to sidebar */
        .usermanage-main {
            margin-left: 220px;
            padding: 20px;
            width: calc(100% - 220px);
        }

        table.usermanage-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table.usermanage-table th,
        table.usermanage-table td {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 15px;
        }

        table.usermanage-table th {
            background-color: #333;
            color: white;
        }

        a.usermanage-btn {
            background: red;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }

        a.usermanage-btn:hover {
            background: darkred;
        }
    </style>
</head>

<body>

    <?php include("sidebar.php"); ?>
    <?php include "navbar.php"; ?>

    <div class="usermanage-main">
        <h2>👥 User Manage</h2>
        <table class="usermanage-table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td style="text-align:center;">
                        <a href="?delete=<?= $row['user_id'] ?>" class="usermanage-btn"
                            onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>