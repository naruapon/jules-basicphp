<?php
// Database connection settings
$servername = "localhost"; // Or your database server IP
$username = "root";      // Your database username
$password = "";          // Your database password
$dbname = "mobileshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4
$conn->set_charset("utf8mb4");
?>
