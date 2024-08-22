<?php
include_once '../classes/Database.php';
include_once '../classes/VehicleImage.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$database = new Database();
$db = $database->getConnection();

$vehicleImage = new VehicleImage($db);

$vehicle_id = isset($_GET['vehicle_id']) ? intval($_GET['vehicle_id']) : 0;

if ($vehicle_id) {
    $images = $vehicleImage->getImagesByVehicleId($vehicle_id);
    echo json_encode(["images" => $images]);
} else {
    echo json_encode(["message" => "Vehicle ID not provided."]);
}
