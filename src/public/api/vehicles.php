<?php
include_once '../classes/Database.php';
include_once '../classes/Vehicle.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$database = new Database();
$db = $database->getConnection();

$vehicle = new Vehicle($db);

$stmt = $vehicle->getAllVehicles();
$num = $stmt->rowCount();

if ($num > 0) {
    $vehicles_arr = array();
    $vehicles_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $vehicle_item = array(
            "id" => $row['id'],
            "make" => $row['make'],
            "model" => $row['model'],
            "year" => $row['year'],
            "price" => $row['price'],
            "mileage" => $row['mileage'],
            "color" => $row['color'],
            "engine_type" => $row['engine_type'],
            "transmission" => $row['transmission'],
            "drive_type" => $row['drive_type'],
            "body_type" => $row['body_type'],
            "purpose" => $row['purpose'],
            "seating_capacity" => $row['seating_capacity'],
            "fuel_type" => $row['fuel_type'],
            "age" => $row['age'],
            "description" => $row['description'],
            "images" => $vehicleImage->getImagesByVehicleId($row['id'])
        );
        array_push($vehicles_arr["records"], $vehicle_item);
    }
    echo json_encode($vehicles_arr);
} else {
    echo json_encode(["message" => "No vehicles found."]);
}
