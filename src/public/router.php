<?php
// Include your API endpoint scripts
require_once '../api/vehicles.php';
require_once '../api/vehicle_images.php';
require_once '../api/vehicle_delete.php';
require_once '../api/vehicle_add.php';
require_once '../api/vehicle_edit.php';
require_once '../api/vehicle_single.php'; // New endpoint

// Parse the request URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Define routes
$routes = [
    '/api/vehicles' => 'vehicles',
    '/api/vehicle_images' => 'vehicle_images',
    '/api/vehicle_delete' => 'vehicle_delete',
    '/api/vehicle_add' => 'vehicle_add',
    '/api/vehicle_edit' => 'vehicle_edit',
    '/api/vehicle_single' => 'vehicle',
];

// Route the request
if (array_key_exists($requestUri, $routes)) {
    switch ($routes[$requestUri]) {
        case 'vehicles':
            if ($requestMethod === 'GET') {
                include '../api/vehicles.php';
            } else {
                header("HTTP/1.1 405 Method Not Allowed");
                echo json_encode(["message" => "Method not allowed"]);
            }
            break;

        case 'vehicle_images':
            if ($requestMethod === 'GET') {
                include '../api/vehicle_images.php';
            } else {
                header("HTTP/1.1 405 Method Not Allowed");
                echo json_encode(["message" => "Method not allowed"]);
            }
            break;

        case 'vehicle_delete':
            if ($requestMethod === 'DELETE') {
                include '../api/vehicle_delete.php';
            } else {
                header("HTTP/1.1 405 Method Not Allowed");
                echo json_encode(["message" => "Method not allowed"]);
            }
            break;

        case 'vehicle_add':
            if ($requestMethod === 'POST') {
                include '../api/vehicle_add.php';
            } else {
                header("HTTP/1.1 405 Method Not Allowed");
                echo json_encode(["message" => "Method not allowed"]);
            }
            break;

        case 'vehicle_edit':
            if ($requestMethod === 'POST') {
                include '../api/vehicle_edit.php';
            } else {
                header("HTTP/1.1 405 Method Not Allowed");
                echo json_encode(["message" => "Method not allowed"]);
            }
            break;

        case 'vehicle':
            if ($requestMethod === 'GET') {
                include '../api/vehicle.php'; // New endpoint logic
            } else {
                header("HTTP/1.1 405 Method Not Allowed");
                echo json_encode(["message" => "Method not allowed"]);
            }
            break;

        default:
            header("HTTP/1.1 404 Not Found");
            echo json_encode(["message" => "Not found"]);
            break;
    }
} else {
    header("HTTP/1.1 404 Not Found");
    echo json_encode(["message" => "Not found"]);
}
