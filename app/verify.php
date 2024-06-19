<?php
session_start();
require_once __DIR__ . '/../backend/config/database.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = :token AND token_expiry > NOW()");
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $stmt = $pdo->prepare("UPDATE users SET verified = 1, token = NULL, token_expiry = NULL WHERE id = :id");
        $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $stmt->execute();
        $_SESSION['success_message'] = "Your email has been verified!";
    } else {
        $_SESSION['error_message'] = "Invalid or expired token!";
    }
} else {
    $_SESSION['error_message'] = "No token provided!";
}

header("Location: login.php");
exit();
?>
