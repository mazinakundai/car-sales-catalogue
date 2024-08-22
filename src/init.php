<?php   
    ob_start();
    // Start the session
    session_start();

    // Error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Autoload classes (if not using Composer, manually include them)
    require_once __DIR__ . '/classes/Database.php';
    require_once __DIR__ . '/classes/Vehicle.php';
    require_once __DIR__ . '/classes/User.php';
    require_once __DIR__ . '/classes/Auth.php';    
    require_once __DIR__ . '/classes/VehicleImage.php';

    // Initialize the database connection
    $database = new Database();
    $db = $database->getConnection();

    //  to initialize the Auth class for session management
    $auth = new Auth($db);
    ob_end_flush();  // Flush the output buffer and send output
?>