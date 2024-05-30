<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drip"; // Ensure this matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the post records
$customerName = $_POST['customerName'];
$tableNumber = $_POST['tableNumber'];
$cart = $_POST['cart']; // Assuming cart data is being sent as a JSON string

// Insert data into the customers table
$sql = "INSERT INTO customers (customerName, tableNumber) VALUES ('$customerName', '$tableNumber')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted into customers successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Insert data into the orders table
$sql = "INSERT INTO orders (customerName, tableNumber, cart) VALUES ('$customerName', '$tableNumber', '$cart')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted into orders successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// For simplicity, not adding to menu_items and order_items as their structure is not defined

// Close the connection
$conn->close();
