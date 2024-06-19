<?php
session_start();
require_once __DIR__ . '/../backend/config/database.php';
require_once __DIR__ . '/../backend/includes/send_email.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(50));
    $token_expiry = date('Y-m-d H:i:s', strtotime('+1 day'));

    $stmt = $pdo->prepare("INSERT INTO users (email, password, token, token_expiry) VALUES (:email, :password, :token, :token_expiry)");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->bindParam(':token_expiry', $token_expiry, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $verify_url = "http://your-domain.com/app/verify.php?token=$token";
        $subject = "Verify Your Email Address";
        $message = "Click the link below to verify your email address:<br><a href='$verify_url'>$verify_url</a>";
        
        send_email($email, $subject, $message);

        $_SESSION['success_message'] = "Registration successful! Please check your email to verify your account.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Registration failed! Please try again.";
    }
}
?>


    <title>Register - LUMINOUS</title>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h2>Register</h2>
        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
                ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
