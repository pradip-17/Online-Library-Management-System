<?php
// Start Session & DB Connection
session_start();
$conn = mysqli_connect("localhost", "root", "", "online_library");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get ALL saved books
$sql = "
    SELECT sb.id, u.username, b.title AS book_name,  sb.saved_at
    FROM saved_book sb
    JOIN user u ON sb.user_id = u.user_id
    JOIN books b ON sb.book_id = b.book_id
    ORDER BY sb.saved_at ASC
";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/png" href="../img/library logo.png">

<head>
    <meta charset="UTF-8">
    <title> All Saved Books</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f7fa;
        }

        .container {
            margin-left: 220px;
            padding: 20px;
            width: calc(95% - 220px);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
            color: #333;
        }

        table {
            width: 95%;
            border-collapse: collapse;
            /* Merge table borders */
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background: #343a40;
            color: white;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        table tbody tr:nth-child(even) {
            background: #f9f9f9;
        }

        table img {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <?php include("sidebar.php"); ?>
    <?php include("navbar.php"); ?>

    <div class="container">
        <h2> All Saved Books</h2>
        <table>
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>User Name</th>
                    <th>Book Name</th>>
                    <th>Saved At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['book_name']}</td>
                            <td>{$row['saved_at']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'> No books saved yet</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>