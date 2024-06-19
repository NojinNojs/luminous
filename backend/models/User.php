<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        return $stmt->execute([$username, $email, $hash]);
    }

    public function verifyEmail($token) {
        $stmt = $this->pdo->prepare('UPDATE users SET verified = 1 WHERE token = ?');
        return $stmt->execute([$token]);
    }

    public function checkEmailExists($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>

