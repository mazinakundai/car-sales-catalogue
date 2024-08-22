<?php
header("Content-Type: application/json; charset=UTF-8");

require_once '../classes/Database.php';
require_once '../classes/Vehicle.php';
require_once '../classes/VehicleImage.php';

$database = new Database();
$db = $database->getConnection();

$vehicle = new Vehicle($db);
$vehicleImage = new VehicleImage($db);

$vehicleId = $_GET['id'] ?? null;

if ($vehicleId) {
    $vehicle->id = $vehicleId;
    $stmt = $vehicle->getById();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $vehicle_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $images = $vehicleImage->getImagesByVehicleId($vehicleId);

        $response = array(
            "id" => $vehicle_data['id'],
            "make" => $vehicle_data['make'],
            "model" => $vehicle_data['model'],
            "year" => $vehicle_data['year'],
            "price" => $vehicle_data['price'],
            "mileage" => $vehicle_data['mileage'],
            "color" => $vehicle_data['color'],
            "engine_type" => $vehicle_data['engine_type'],
            "transmission" => $vehicle_data['transmission'],
            "drive_type" => $vehicle_data['drive_type'],
            "body_type" => $vehicle_data['body_type'],
            "purpose" => $vehicle_data['purpose'],
            "seating_capacity" => $vehicle_data['seating_capacity'],
            "fuel_type" => $vehicle_data['fuel_type'],
            "age" => $vehicle_data['age'],
            "description" => $vehicle_data['description'],
            "images" => $images
        );

        echo json_encode($response);
    } else {
        echo json_encode(array("message" => "Vehicle not found."));
    }
} else {
    echo json_encode(array("message" => "Vehicle ID is required."));
}
