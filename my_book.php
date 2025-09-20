<?php
session_start();
include("dbconnect.php");

if (!isset($_SESSION['user_id'])) {
  echo "Not logged in";
  exit();
}

$userId = $_SESSION['user_id'];

$userSql = "SELECT username, email, created_at FROM user WHERE user_id = ?";
$userStmt = mysqli_prepare($conn, $userSql);
mysqli_stmt_bind_param($userStmt, "i", $userId);
mysqli_stmt_execute($userStmt);
$userResult = mysqli_stmt_get_result($userStmt);
$userData = mysqli_fetch_assoc($userResult);

if (isset($_POST['remove_all'])) {
  $delSql = "DELETE FROM user_activity WHERE user_id = ?";
  $delStmt = mysqli_prepare($conn, $delSql);
  mysqli_stmt_bind_param($delStmt, "i", $userId);
  mysqli_stmt_execute($delStmt);
  header("Location: myBook.php");
  exit();
}

// Activity Details
$sql = "SELECT b.title, b.author_name, b.category, b.book_type, ua.action_type, ua.action_time
        FROM user_activity ua
        INNER JOIN books b ON ua.book_id = b.book_id
        WHERE ua.user_id = ?
        ORDER BY ua.action_time ASC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Book</title>
  <link rel="icon" type="image/png" href="img/library logo.png">

  <style>
    body.mybook-body {
      background: #012d38ff;
      font-family: Arial, sans-serif;
      min-height: 100vh;
      margin: 0;

    }

    .mybook-container {
      background: #fff;
      padding: 30px;
      margin-top: 50px;
      border-radius: 15px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
      max-width: 950px;
      margin: auto;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .mybook-header {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    .mybook-userinfo {
      background: #fafafa;
      padding: 15px 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
    }

    .mybook-userinfo p {
      margin: 6px 0;
    }

    .mybook-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      overflow: hidden;
      border-radius: 10px;
    }

    .mybook-table thead {
      background-color: #2c3e50;
      color: white;
    }

    .mybook-table th,
    .mybook-table td {
      padding: 12px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    .mybook-table tbody tr {
      transition: transform 0.2s ease, background 0.2s ease;
    }

    .mybook-table tbody tr:hover {
      background: #f1f7ff;
      transform: scale(1.01);
    }

    .mybook-badge {
      display: inline-block;
      padding: 5px 12px;
      font-size: 12px;
      border-radius: 5px;
      color: #fff;
      animation: fadeBadge 1s ease-in-out;
    }

    .mybook-badge-primary {
      background-color: #007bff;
    }

    @keyframes fadeBadge {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .mybook-btn-danger {
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
      margin-top: 15px;
      background: #dc3545;
      color: white;
      transition: all 0.3s ease;
      width: auto;
    }

    .mybook-btn-danger:hover {
      background: #c82333;
      transform: scale(1.05);
    }

    .mybook-text-center {
      text-align: center;
    }
  </style>
</head>

<body class="mybook-body">

  <?php include "header.php" ?>
  <div class="mybook-container">

    <div class="mybook-header"> My Book Activity</div>

    <div class="mybook-userinfo">
      <p><strong>Username:</strong> <?php echo htmlspecialchars($userData['username']); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
      <p><strong>Registered On:</strong> <?php echo date("d-m-Y", strtotime($userData['created_at'])); ?></p>
    </div>

    <table class="mybook-table">
      <thead>
        <tr>
          <th>Book Name</th>
          <th>Author</th>
          <th>Category</th>
          <th>Book Type</th>
          <th>Action</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
          mysqli_data_seek($result, 0);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['author_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
            echo "<td>" . htmlspecialchars($row['book_type']) . "</td>";
            echo "<td><span class='mybook-badge mybook-badge-primary'>" . htmlspecialchars($row['action_type']) . "</span></td>";
            echo "<td>" . date("d-m-Y H:i", strtotime($row['action_time'])) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6' class='mybook-text-center'>No activity found.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <div class="mybook-text-center">
      <?php if (mysqli_num_rows($result) > 0): ?>
        <form method="post" style="display: inline;">
          <button type="submit" name="remove_all" class="mybook-btn-danger"
            onclick="return confirm('Are you sure to remove all your activity?')">
            Remove All Activity
          </button>
        </form>
      <?php endif; ?>
    </div>
  </div>

</body>

</html>