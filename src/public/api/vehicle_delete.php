<?php 
    // src/api/vehicle_delete.php

    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header("Location: /login.php");
        exit;
    }

    require_once '../classes/Database.php';
    require_once '../classes/Vehicle.php';

    $database = new Database();
    $db = $database->getConnection();

    $vehicle = new Vehicle($db);
    $vehicle->id = $_GET['id'] ?? null;

    if ($vehicle->id) {
        $vehicle->delete();
    }

    header("Location: /vehicle_list.php");
    exit;

?>