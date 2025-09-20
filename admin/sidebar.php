<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #333;
            position: fixed;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #575757;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div
            style="text-align: center; padding: 10px; display: flex; align-items: center; justify-content: center; gap: 8px;">
            <img src="../img/library logo.png" alt="Logo" style="width:28px; height:28px;">
            <h3 style="margin: 0; font-size: 20px;">My library</h3>
        </div>
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_books.php">Manage Books</a>
        <a href="view_feedback.php">View Feedback</a>
        <a href="book_activity.php">book activity</a>
        <a href="view_savedbook.php">saved book</a>
        <a href="logout.php">Logout</a>
    </div>

</body>

</html>