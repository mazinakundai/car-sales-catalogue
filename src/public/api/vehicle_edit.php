<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /login.php");
    exit;
}

require_once '../classes/Database.php';
require_once '../classes/Vehicle.php';
require_once '../classes/Auth.php'; // Assuming Auth class is where verifyCsrfToken method is defined

$database = new Database();
$db = $database->getConnection();

$vehicle = new Vehicle($db);

$vehicle->id = $_POST['id'] ?? null;
$vehicle->make = $_POST['make'];
$vehicle->model = $_POST['model'];
$vehicle->year = $_POST['year'];
$vehicle->price = $_POST['price'];
$vehicle->mileage = $_POST['mileage'];
$vehicle->color = $_POST['color'];
$vehicle->engine_type = $_POST['engine_type'];
$vehicle->transmission = $_POST['transmission'];
$vehicle->drive_type = $_POST['drive_type'];
$vehicle->body_type = $_POST['body_type'];
$vehicle->purpose = $_POST['purpose'];
$vehicle->seating_capacity = $_POST['seating_capacity'];
$vehicle->fuel_type = $_POST['fuel_type'];
$vehicle->age = $_POST['age'];
$vehicle->description = $_POST['description'];

// Verify CSRF token
if (!Auth::verifyCsrfToken($_POST['csrf_token'])) {
    die("Invalid CSRF token");
}

// Update vehicle
if ($vehicle->id) {
    $vehicle->update();
} else {
    die("Vehicle ID is required for updating");
}

// Handle image URLs (if any) and associate with vehicle
if (isset($_POST['image_urls']) && is_array($_POST['image_urls'])) {
    $image_urls = $_POST['image_urls'];
    foreach ($image_urls as $image_url) {
        $query = "INSERT INTO vehicle_images (vehicle_id, image_url) VALUES (:vehicle_id, :image_url)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':vehicle_id', $vehicle->id);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->execute();
    }
}

header("Location: /vehicle_list.php");
exit;
