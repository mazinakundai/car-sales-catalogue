<!DOCTYPE html>
<?php
    // Include the init.php file
    require_once 'init.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Catalog</title>
    <link rel="stylesheet" href="/path/to/your/css/styles.css"> <!-- Adjust the path to your CSS -->
</head>
<body>
    <nav>
        <a href="/vehicle_list.php">Vehicle Listings</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="/vehicle_form.php">Add Vehicle</a>
            <?php endif; ?>
            <a href="/auth/logout.php">Logout</a>
        <?php else: ?>
            <a href="/login.php">Login</a>
        <?php endif; ?>
    </nav>
    <header>
        <h1>Welcome to the Vehicle Catalog</h1>
        <a href="add_vehicle.php">Add New Vehicle</a> <!-- Link to add new vehicle page -->
    </header>

    <main>
        <?php include 'views/vehicle_list.php'; ?>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.vehicle-carousel').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true
            });
        });
    </script>
</body>
</html>
