<?php
// check_email.php
session_start();
require 'dbconnect.php'; // $conn = new mysqli(...)

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: index.php'); exit;
}

$email = trim($_POST['email'] ?? '');
if ($email === '') { header('Location: index.php'); exit; }

// Check if email exists
$stmt = $conn->prepare("SELECT user_id FROM user WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Found → send to login with email prefilled
    // You can also store in session if you prefer: $_SESSION['prefill_email'] = $email;
    header("Location: login.php?email=" . urlencode($email));
    exit;
} else {
    // Not found → back to home with toast message
    header("Location: index.php?msg=email_not_found");
    exit;
}