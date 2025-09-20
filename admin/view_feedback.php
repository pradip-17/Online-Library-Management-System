<?php
session_start();
include("../dbconnect.php");

// Fetch Feedback Data
$sql = "SELECT id, username, email, message, created_at FROM feedback ORDER BY id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Feedback List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #eef1f5;
        }

        .container-page {
            margin-left: 220px;
            padding: 20px;
            width: calc(100% - 220px);
        }

        .card {
            background: #ffffff;
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 25px;
        }

        h3 {
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* Prevents scroll */
        }

        thead {
            background: #343a40;
            color: #fff;
            font-size: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            vertical-align: middle;
            text-align: center;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        tbody tr:hover {
            background: rgba(0, 123, 255, 0.1);
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 14px;
            transition: 0.3s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete:hover {
            background-color: #b02a37;
        }

        /* Column width fix */
        th:nth-child(1),
        td:nth-child(1) {
            width: 50px;
        }

        /* ID */
        th:nth-child(2),
        td:nth-child(2) {
            width: 120px;
        }

        /* User */
        th:nth-child(3),
        td:nth-child(3) {
            width: 200px;
        }

        /* Email */
        th:nth-child(4),
        td:nth-child(4) {
            width: 300px;
            text-align: left;
        }

        /* Message */
        th:nth-child(5),
        td:nth-child(5) {
            width: 150px;
        }

        /* Submitted At */
        th:nth-child(6),
        td:nth-child(6) {
            width: 100px;
        }

        /* Action */
    </style>
</head>

<body>

    <?php include("sidebar.php"); ?>
    <?php include("navbar.php"); ?>

    <div class="container-page">
        <div class="card">
            <h3> User Feedback List</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                                <td><?= htmlspecialchars($row['created_at']) ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="6" style="text-align:center; color:#666;">No feedback found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
<?php $conn->close(); ?>