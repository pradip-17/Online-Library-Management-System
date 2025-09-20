<?php
session_start();
include("dbconnect.php");

if (!isset($_SESSION['user_id'])) {
    echo "blocked: not_logged_in";
    exit;
}

$user_id = $_SESSION['user_id'];
$book_id = $_POST['book_id'] ?? 0;
$action_type = $_POST['action_type'] ?? '';

if (!$book_id || !$action_type) {
    echo "blocked: invalid_request";
    exit;
}

$today = date("Y-m-d");
$now = date("Y-m-d H:i:s");

// check for today
$sql = "SELECT * FROM user_activity 
        WHERE user_id=? AND action_type=? AND DATE(action_time)=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $action_type, $today);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "blocked: already_done_today";
    exit;
}

// record insert
$sql = "INSERT INTO user_activity (user_id, book_id, action_type, action_time) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiss", $user_id, $book_id, $action_type, $now);
$stmt->execute();

echo "success";