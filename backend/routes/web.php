<?php
require_once __DIR__ . '/../controllers/UserController.php';

$controller = new UserController($pdo);

if ($_SERVER['REQUEST_URI'] == '/register' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->register();
}
?>

