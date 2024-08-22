<!-- src/auth/logout.php -->
<?php
session_start();
require_once '../classes/Auth.php';

Auth::logout();
?>
