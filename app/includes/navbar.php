<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex justify-content-between">
    <a class="navbar-brand mx-3" href="#"><i class="fas fa-store"></i> LUMINOUS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav mx-3">
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') : ?>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'homepage.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="homepage"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'product.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="product"><i class="fas fa-box"></i> Products</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'cart.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="cart"><i class="fas fa-shopping-cart"></i> Cart</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'profile.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="profile"><i class="fas fa-user"></i> Profile</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'admin_dashboard.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="admin_dashboard"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            <?php elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'user') : ?>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'homepage.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="homepage"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'product.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="product"><i class="fas fa-box"></i> Products</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'cart.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="cart"><i class="fas fa-shopping-cart"></i> Cart</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'profile.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="profile"><i class="fas fa-user"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            <?php else : ?>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'product.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="product"><i class="fas fa-box"></i> Products</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'forgot_password.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="login"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'register.php' || basename($_SERVER['PHP_SELF']) == 'check_email.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="register"><i class="fas fa-user-plus"></i> Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
