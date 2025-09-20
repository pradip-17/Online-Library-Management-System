<?php

include("../dbconnect.php");

// Total books
$sql = "SELECT COUNT(*) AS total_books FROM books";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_books_all = $row['total_books'] ?? 0;

// Books updated
$sql = "SELECT COUNT(*) AS total_upload FROM book_history WHERE action_type = 'updated'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_upload = $row['total_upload'] ?? 0;

// Books deleted
$sql = "SELECT COUNT(*) AS total_delete FROM book_history WHERE action_type = 'deleted'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_delete = $row['total_delete'] ?? 0;

// Recently uploaded
$recent_uploaded = [];
$sql = "SELECT title, created_at FROM books WHERE action_type = 'upload' ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
while ($r = mysqli_fetch_assoc($result)) {
    $recent_uploaded[] = $r;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/library logo.png">
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f9f9f9;
        }

        .dashboard-main {
            margin-left: 220px;
            padding: 20px;
        }

        .dashboard-card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid #333;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .dashboard-stats {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .dashboard-stat-box {
            flex: 1;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            min-width: 200px;
        }

        .dashboard-stat-box h2 {
            font-size: 40px;
            margin: 0;
        }

        .dashboard-stat-box p {
            margin: 5px 0 0;
            font-size: 18px;
        }

        .dashboard-upload {
            background: linear-gradient(135deg, #2196F3, #1976D2);
        }

        .dashboard-update {
            background: linear-gradient(135deg, #FFC107, #FF9800);
        }

        .dashboard-delete {
            background: linear-gradient(135deg, #F44336, #D32F2F);
        }

        .dashboard-total {
            background: linear-gradient(135deg, #9C27B0, #7B1FA2);
        }

        ul.dashboard-recent-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul.dashboard-recent-list li {
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <?php include("sidebar.php"); ?>
    <?php include("navbar.php"); ?>

    <div class="dashboard-main">
    

        <div class="dashboard-stats">
            <div class="dashboard-stat-box dashboard-total">
                <h2><?php echo $total_books_all; ?></h2>
                <p>All Books</p>
            </div>
            <div class="dashboard-stat-box dashboard-upload">
                <h2><?php echo $total_upload; ?></h2>
                <p>Books Updated</p>
            </div>
            <div class="dashboard-stat-box dashboard-delete">
                <h2><?php echo $total_delete; ?></h2>
                <p>Books Deleted</p>
            </div>
        </div>

        <div class="dashboard-card">
            <h2> Recently Uploaded Books</h2>
            <?php if (count($recent_uploaded) > 0) { ?>
                <ul class="dashboard-recent-list">
                    <?php foreach ($recent_uploaded as $book) { ?>
                        <li>
                            <strong><?php echo htmlspecialchars($book['title']); ?></strong>
                            <small style="color:gray;"> - <?php echo $book['created_at']; ?></small>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p>No recent uploads.</p>
            <?php } ?>
        </div>

        <div class="dashboard-card">
            <h2> Manage Books</h2>
            <p>View books, insert, update and delete available books.</p>
        </div>
        <div class="dashboard-card">
            <h2> Manage Users</h2>
            <p>View registered users.</p>
        </div>
    </div>
</body>

</html>