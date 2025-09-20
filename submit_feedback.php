<?php
// submit_feedback.php
session_start();
include("dbconnect.php");

// helper to flash and redirect
function back($type, $msg) {
    $_SESSION['flash'] = ['type'=>$type, 'msg'=>$msg];
    header("Location: feedback.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') back('danger','Invalid request.');

// CSRF check
if (empty($_POST['csrf_token']) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    back('danger','Security token mismatch.');
}

// Honeypot
if (!empty($_POST['website'])) back('danger','Spam detected.');

// Simple rate-limit: 1 feedback / 60s per user or IP
$whoKey = isset($_SESSION['user_id']) ? ('u'.(int)$_SESSION['user_id']) : ('ip'.$_SERVER['REMOTE_ADDR']);
$now = time();
if (!isset($_SESSION['fb_last'])) $_SESSION['fb_last'] = [];
if (isset($_SESSION['fb_last'][$whoKey]) && ($now - $_SESSION['fb_last'][$whoKey]) < 60) {
    back('warning','Please wait a minute before sending another feedback.');
}
$_SESSION['fb_last'][$whoKey] = $now;

$isLoggedIn = isset($_SESSION['user_id']);
$username = '';
$email = '';

if ($isLoggedIn) {
    // Never trust client; fetch again from DB
    $uid = (int)$_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT username, email FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $stmt->bind_result($username, $email);
    $stmt->fetch();
    $stmt->close();
    if (!$username || !$email) back('danger','User not found.');
} else {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    if ($username === '' || $email === '') back('danger','Name and email are required.');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) back('danger','Invalid email.');
    if (mb_strlen($username) > 30) back('danger','Name too long.');
}

$message = trim($_POST['message'] ?? '');
if ($message === '') back('danger','Please write your feedback.');
if (mb_strlen($message) > 400) $message = mb_substr($message, 0, 400);

// Save
$stmt = $conn->prepare("INSERT INTO feedback (username, email, message, created_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sss", $username, $email, $message);
$ok = $stmt->execute();
$stmt->close();

if ($ok) back('success','Thank you! Your feedback has been recorded.');
else back('danger','Something went wrong while saving feedback.');