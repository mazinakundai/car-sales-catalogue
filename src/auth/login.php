<!-- src/auth/login.php -->
<?php
session_start();
require_once '../classes/Database.php';
require_once '../classes/User.php';
require_once '../classes/Auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (Auth::login($username, $password)) {
        header("Location: /vehicle_list.php");
        exit;
    } else {
        header("Location: /login.php?error=1");
        exit;
    }
}
?>
