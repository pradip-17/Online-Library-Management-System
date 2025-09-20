<?php


include("../dbconnect.php");

// SQL query to join user_activity, user, and books
$sql = "
SELECT 
    ua.useractivity_id,
    u.username,
    b.book_id,
    b.title AS book_name,
    ua.action_type,
    ua.action_time
FROM user_activity ua
JOIN user u ON ua.user_id = u.user_id
JOIN books b ON ua.book_id = b.book_id
ORDER BY ua.action_time ASC
";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Activity - Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/library logo.png">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        body.book-activity-body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #eef1f5;
            overflow-x: hidden;
        }

        /* Main Content Area */
        .book-activity-content {
            margin-left: 220px;
            padding: 25px;
        }

        /* Card */
        .book-activity-card {
            border: 0;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        /* Table Styling */
        .book-activity-table {
            font-size: 15px;
        }

        .book-activity-table thead {
            background: #34495e;
            color: white;
            font-size: 16px;
        }

        .book-activity-table tbody tr:hover {
            background: rgba(241, 196, 15, 0.1);
        }

        .book-activity-table td,
        .book-activity-table th {
            padding: 12px 15px;
        }

        /* Badges */
        .badge-read {
            background-color: #28a745;
            padding: 0.45em 0.8em;
            font-size: 0.9em;
        }

        .badge-download {
            background-color: #17a2b8;
            padding: 0.45em 0.8em;
            font-size: 0.9em;
        }

        .badge-other {
            background-color: #6c757d;
            padding: 0.45em 0.8em;
            font-size: 0.9em;
        }
    </style>
</head>

<body class="book-activity-body">

    <!-- Sidebar -->
    <?php include "sidebar.php"; ?>
    <?php include "navbar.php"; ?>

    <!-- Main Content -->
    <div class="book-activity-content">
        <div class="card book-activity-card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle book-activity-table">
                        <thead>
                            <tr>
                                <th>Activity ID</th>
                                <th>Username</th>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Action Type</th>
                                <th>Action Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= $row['useractivity_id']; ?></td>

                                    <td><?= htmlspecialchars($row['username']); ?></td>
                                    <td><?= $row['book_id']; ?></td>
                                    <td><?= htmlspecialchars($row['book_name']); ?></td>
                                    <td>
                                        <?php
                                        if ($row['action_type'] == 'read') {
                                            echo '<span class="badge badge-read"> Read</span>';
                                        } elseif ($row['action_type'] == 'download') {
                                            echo '<span class="badge badge-download">⬇ Download</span>';
                                        } else {
                                            echo '<span class="badge badge-other">' . ucfirst($row['action_type']) . '</span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?= date("d M Y, h:i A", strtotime($row['action_time'])); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>