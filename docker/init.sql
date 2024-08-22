-- Drop the database if it exists
DROP DATABASE IF EXISTS car_catalog_db;

-- Create a new database
CREATE DATABASE car_catalog_db;

-- Switch to the newly created database
USE car_catalog_db;

-- Create tables
CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    mileage INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    engine_type ENUM('Petrol', 'Diesel', 'Electric', 'Hybrid', 'Hydrogen') NOT NULL,
    transmission ENUM('Manual', 'Automatic', 'CVT', 'Dual-Clutch') NOT NULL,
    drive_type ENUM('FWD', 'RWD', 'AWD', '4WD') NOT NULL,
    body_type ENUM('Sedan', 'Hatchback', 'SUV', 'Crossover', 'Coupe', 'Convertible', 'Wagon', 'Pickup Truck', 'Van/Minivan', 'Sports Car', 'Luxury Car', 'Electric Vehicle (EV)') NOT NULL,
    purpose ENUM('Commercial', 'Family', 'Off-Road', 'Performance', 'Luxury', 'Utility') NOT NULL,
    seating_capacity ENUM('2-seater', '4-seater', '5-seater', '7-seater', '8+ seater') NOT NULL,
    fuel_type ENUM('Budget', 'Mid-range', 'Premium', 'Luxury') NOT NULL,
    age ENUM('New', 'Used', 'Certified Pre-Owned') NOT NULL,
    description TEXT
);

-- Insert cars into the verhicles table
INSERT INTO vehicles (
    make, model, year, price, mileage, color, engine_type, transmission, drive_type, body_type, purpose, seating_capacity, fuel_type, age, description
) VALUES 
('Haval', 'H1', 2022, 15000.00, 10000, 'Red', 'Petrol', 'Manual', 'FWD', 'SUV', 'Family', '5-seater', 'Budget', 'New', 'Compact SUV perfect for city driving.'),
('Kia', 'Sportage', 2021, 25000.00, 15000, 'White', 'Diesel', 'Automatic', 'AWD', 'SUV', 'Family', '5-seater', 'Mid-range', 'Used', 'Reliable and versatile SUV with advanced features.'),
('Toyota', 'Urban Cruiser', 2023, 22000.00, 5000, 'Grey', 'Petrol', 'Automatic', 'FWD', 'SUV', 'Family', '5-seater', 'Mid-range', 'New', 'Stylish and fuel-efficient urban SUV.'),
('Renault', 'Triber', 2022, 18000.00, 12000, 'Orange', 'Petrol', 'Manual', 'FWD', 'Crossover', 'Family', '7-seater', 'Budget', 'Used', 'Compact crossover with flexible seating options.'),
('Volkswagen', 'Polo', 2023, 20000.00, 8000, 'White', 'Petrol', 'Manual', 'FWD', 'Hatchback', 'Family', '5-seater', 'Mid-range', 'New', 'Popular and reliable hatchback with modern features.');

-- create vehicle_images
CREATE TABLE vehicle_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_id INT,
    image_url VARCHAR(255) NOT NULL
);

-- Insert verhicle image urls
-- Haval H1 Images
INSERT INTO vehicle_images (vehicle_id, image_url) VALUES
(1, 'public/media/uploads/havalh11.jpeg'),
(1, 'public/media/uploads/havalh12.jpeg'),
(1, 'public/media/uploads/havalh13.jpeg'),
(1, 'public/media/uploads/havalh14.jpeg'),
(1, 'public/media/uploads/havalh15.jpeg'),
(1, 'public/media/uploads/havalh16.jpeg'),
(1, 'public/media/uploads/havalh17.jpeg'),
(1, 'public/media/uploads/havalh18.jpeg'),
(1, 'public/media/uploads/havalh19.jpeg'),
(1, 'public/media/uploads/havalh110.jpeg');

-- Kia Sportage Images
INSERT INTO vehicle_images (vehicle_id, image_url) VALUES
(2, 'public/media/uploads/kiasportage1.jpeg'),
(2, 'public/media/uploads/kiasportage2.jpeg'),
(2, 'public/media/uploads/kiasportage3.jpeg'),
(2, 'public/media/uploads/kiasportage4.jpeg'),
(2, 'public/media/uploads/kiasportage5.jpeg'),
(2, 'public/media/uploads/kiasportage6.jpeg'),
(2, 'public/media/uploads/kiasportage7.jpeg'),
(2, 'public/media/uploads/kiasportage8.jpeg'),
(2, 'public/media/uploads/kiasportage9.jpeg'),
(2, 'public/media/uploads/kiasportage10.jpeg');

-- Toyota Urban Cruiser Images
INSERT INTO vehicle_images (vehicle_id, image_url) VALUES
(3, 'public/media/uploads/toyotaurbancruiser1.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser2.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser3.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser4.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser5.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser6.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser7.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser8.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser9.jpeg'),
(3, 'public/media/uploads/toyotaurbancruiser10.jpeg');

-- Renault Triber Images
INSERT INTO vehicle_images (vehicle_id, image_url) VALUES
(4, 'public/media/uploads/renaulttriber1.jpeg'),
(4, 'public/media/uploads/renaulttriber2.jpeg'),
(4, 'public/media/uploads/renaulttriber3.jpeg'),
(4, 'public/media/uploads/renaulttriber4.jpeg'),
(4, 'public/media/uploads/renaulttriber5.jpeg'),
(4, 'public/media/uploads/renaulttriber6.jpeg'),
(4, 'public/media/uploads/renaulttriber7.jpeg'),
(4, 'public/media/uploads/renaulttriber8.jpeg'),
(4, 'public/media/uploads/renaulttriber9.jpeg'),
(4, 'public/media/uploads/renaulttriber10.jpeg');

-- Volkswagen Polo Images
INSERT INTO vehicle_images (vehicle_id, image_url) VALUES
(5, 'public/media/uploads/volkswagenpolo1.jpeg'),
(5, 'public/media/uploads/volkswagenpolo2.jpeg'),
(5, 'public/media/uploads/volkswagenpolo3.jpeg'),
(5, 'public/media/uploads/volkswagenpolo4.jpeg'),
(5, 'public/media/uploads/volkswagenpolo5.jpeg'),
(5, 'public/media/uploads/volkswagenpolo6.jpeg'),
(5, 'public/media/uploads/volkswagenpolo7.jpeg'),
(5, 'public/media/uploads/volkswagenpolo8.jpeg'),
(5, 'public/media/uploads/volkswagenpolo9.jpeg'),
(5, 'public/media/uploads/volkswagenpolo10.jpeg');

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);
