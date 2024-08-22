<?php
// Define API URL
$api_url = 'http://localhost/api/vehicles.php'; // Replace with your actual URL or path

// Initialize cURL session
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
    curl_close($ch);
    exit;
}

// Close cURL session
curl_close($ch);

// Decode the JSON response
$vehicles_arr = json_decode($response, true);

?>

<div class="vehicle-container">
    <?php if (isset($vehicles_arr["records"]) && count($vehicles_arr["records"]) > 0): ?>
        <?php foreach ($vehicles_arr["records"] as $row): ?>
            <?php
            $vehicleImageUrls = $row['images'];
            $firstImageUrl = !empty($vehicleImageUrls) ? $vehicleImageUrls[0] : '/path/to/default-image.jpg';
            ?>
            <div class="vehicle-card">
                <a href="vehicle_details.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                    <img src="<?php echo htmlspecialchars($firstImageUrl); ?>" alt="<?php echo htmlspecialchars($row['make'] . ' ' . $row['model']); ?>" class="vehicle-image">
                    <div class="vehicle-info">
                        <h2><?php echo htmlspecialchars($row['make']) . ' ' . htmlspecialchars($row['model']); ?></h2>
                        <p><strong>Year:</strong> <?php echo htmlspecialchars($row['year']); ?></p>
                        <p><strong>Price:</strong> $<?php echo htmlspecialchars(number_format($row['price'], 2)); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No vehicles found.</p>
    <?php endif; ?>
</div>
