<?php
session_start();
include("dbconnect.php");

if (!isset($_SESSION['user_id'])) {
    echo "error:not_logged_in";
    exit;
}

$userId = $_SESSION['user_id'];
$bookId = intval($_POST['book_id'] ?? 0);

if ($bookId > 0) {
    $stmt = $conn->prepare("DELETE FROM saved_book WHERE user_id = ? AND book_id = ?");
    $stmt->bind_param("ii", $userId, $bookId);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error:db_fail";
    }
    $stmt->close();
} else {
    echo "error:invalid_id";
}
?>