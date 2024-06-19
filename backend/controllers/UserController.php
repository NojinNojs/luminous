<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->user->checkEmailExists($email)) {
                echo 'Email already exists';
                return;
            }

            if ($this->user->register($username, $email, $password)) {
                // Send verification email
                $this->sendVerificationEmail($email);
                echo 'Registration successful, please check your email for verification';
            } else {
                echo 'Registration failed';
            }
        }
    }

    private function sendVerificationEmail($email) {
        $token = bin2hex(random_bytes(50));
        $subject = 'Email Verification';
        $message = "Please click the link to verify your email: <a href='http://yourdomain.com/verify.php?token=$token'>Verify Email</a>";
        $headers = 'Content-Type: text/html; charset=UTF-8';

        mail($email, $subject, $message, $headers);
    }
}
?>

