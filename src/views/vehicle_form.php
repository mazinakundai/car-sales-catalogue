<!-- src/views/vehicle_form.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Add/Edit Vehicle</title>
</head>
<body>
    <div class="form-container">
        <h2><?= isset($vehicle) ? 'Edit' : 'Add' ?> Vehicle</h2>
        <form action="/api/vehicle_save.php" method="POST">
            <!-- Add CSRF token to the form -->
            <input type="hidden" name="csrf_token" value="<?= Auth::generateCsrfToken() ?>">
            <input type="hidden" name="id" value="<?= isset($vehicle) ? $vehicle->id : '' ?>">
            <div>
                <label for="make">Make</label>
                <input type="text" name="make" id="make" value="<?= $vehicle->make ?? '' ?>" required>
            </div>
            <div>
                <label for="model">Model</label>
                <input type="text" name="model" id="model" value="<?= $vehicle->model ?? '' ?>" required>
            </div>
            <div>
                <label for="year">Year</label>
                <input type="number" name="year" id="year" value="<?= $vehicle->year ?? '' ?>" required>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" value="<?= $vehicle->price ?? '' ?>" required>
            </div>
            <div>
                <label for="mileage">Mileage</label>
                <input type="number" name="mileage" id="mileage" value="<?= $vehicle->mileage ?? '' ?>" required>
            </div>
            <div>
                <label for="color">Color</label>
                <input type="text" name="color" id="color" value="<?= $vehicle->color ?? '' ?>" required>
            </div>
            <div>
                <label for="engine_type">Engine Type</label>
                <input type="text" name="engine_type" id="engine_type" value="<?= $vehicle->engine_type ?? '' ?>" required>
            </div>
            <div>
                <label for="transmission">Transmission</label>
                <input type="text" name="transmission" id="transmission" value="<?= $vehicle->transmission ?? '' ?>" required>
            </div>
            <div>
                <label for="image_url">Image URL</label>
                <input type="text" name="image_url" id="image_url" value="<?= $vehicle->image_url ?? '' ?>">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description"><?= $vehicle->description ?? '' ?></textarea>
            </div>
            <button type="submit"><?= isset($vehicle) ? 'Update' : 'Add' ?> Vehicle</button>
        </form>
    </div>
</body>
</html>
