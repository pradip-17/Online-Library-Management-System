<?php
session_start();
include("dbconnect.php");

//  Login check
if (!isset($_SESSION['user_id'])) {
    echo " Please login to save books.";
    exit;
}

$userId = $_SESSION['user_id'];
$bookId = intval($_POST['book_id'] ?? 0);

if (!$bookId) {
    echo " Invalid book ID.";
    exit;
}

// Check if book is already saved
$checkQuery = $conn->prepare("SELECT * FROM saved_book WHERE user_id = ? AND book_id = ?");
$checkQuery->bind_param("ii", $userId, $bookId);
$checkQuery->execute();
$result = $checkQuery->get_result();

if ($result->num_rows > 0) {
    echo "ℹ Book already saved!";
} else {
    $stmt = $conn->prepare("INSERT INTO saved_book (user_id, book_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $bookId);
    if ($stmt->execute()) {
        echo " Book saved successfully!";
    } else {
        echo " Error saving book.";
    }
}
?>