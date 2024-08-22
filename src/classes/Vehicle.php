<?php
// src/classes/Vehicle.php

class Vehicle {
    private $conn;
    private $table_name = "vehicles";

    public $id;
    public $make;
    public $model;
    public $year;
    public $price;
    public $mileage;
    public $color;
    public $engine_type;
    public $transmission;
    public $drive_type;
    public $body_type;
    public $purpose;
    public $seating_capacity;
    public $fuel_type;
    public $age;
    public $description;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to create a new vehicle
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (make, model, year, price, mileage, color, engine_type, transmission, drive_type, body_type, purpose, seating_capacity, fuel_type, age, description) 
                  VALUES (:make, :model, :year, :price, :mileage, :color, :engine_type, :transmission, :drive_type, :body_type, :purpose, :seating_capacity, :fuel_type, :age, :description)";

        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(":make", $this->make);
        $stmt->bindParam(":model", $this->model);
        $stmt->bindParam(":year", $this->year);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":mileage", $this->mileage);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":engine_type", $this->engine_type);
        $stmt->bindParam(":transmission", $this->transmission);
        $stmt->bindParam(":drive_type", $this->drive_type);
        $stmt->bindParam(":body_type", $this->body_type);
        $stmt->bindParam(":purpose", $this->purpose);
        $stmt->bindParam(":seating_capacity", $this->seating_capacity);
        $stmt->bindParam(":fuel_type", $this->fuel_type);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":description", $this->description);

        return $stmt->execute();
    }

    // Method to update an existing vehicle
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET make = :make, model = :model, year = :year, price = :price, 
                      mileage = :mileage, color = :color, engine_type = :engine_type, 
                      transmission = :transmission, drive_type = :drive_type, 
                      body_type = :body_type, purpose = :purpose, 
                      seating_capacity = :seating_capacity, fuel_type = :fuel_type, 
                      age = :age, description = :description 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Bind values
        $stmt->bindParam(":make", $this->make);
        $stmt->bindParam(":model", $this->model);
        $stmt->bindParam(":year", $this->year);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":mileage", $this->mileage);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":engine_type", $this->engine_type);
        $stmt->bindParam(":transmission", $this->transmission);
        $stmt->bindParam(":drive_type", $this->drive_type);
        $stmt->bindParam(":body_type", $this->body_type);
        $stmt->bindParam(":purpose", $this->purpose);
        $stmt->bindParam(":seating_capacity", $this->seating_capacity);
        $stmt->bindParam(":fuel_type", $this->fuel_type);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Method to delete a vehicle
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Method to read all vehicles
    public function getAllVehicles() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Method to fetch a vehicle by ID
    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        
        return $stmt;
    }
}
