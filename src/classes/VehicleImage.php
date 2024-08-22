<?php
// src/classes/VehicleImage.php

class VehicleImage {
    private $conn;
    private $table_name = "vehicle_images";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getImagesByVehicleId($vehicle_id) {
        $query = "SELECT image_url FROM " . $this->table_name . " WHERE vehicle_id = :vehicle_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":vehicle_id", $vehicle_id);
        $stmt->execute();

        $images = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $images[] = $row['image_url'];
        }
        return $images;
    }
}
