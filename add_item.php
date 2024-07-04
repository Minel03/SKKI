<?php
date_default_timezone_set('Asia/Manila');
include 'connect.php';
session_start();
$handler = $_SESSION['handler'];
// Fetch the maximum ID from the 'inventory' table
$sql_max_id = "SELECT MAX(id) as max_id FROM inventory";
$result = $conn->query($sql_max_id);

if ($result && $row = $result->fetch_assoc()) {
    $new_id = $row['max_id'] + 1; // Increment the maximum ID to generate the next ID
} else {
    // Set a default value if no records are found (e.g., starting from 1)
    $new_id = 1;
}

$productname = $_POST['productname'];
$category = $_POST['category'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$quantity = $_POST['quantity'];
$conditionnew = $_POST['conditionnew'];
$conditiongood = $_POST['conditiongood'];
$conditionbad = $_POST['conditionbad'];
$brand = $_POST['brand'];
$color = $_POST['color'];
$size = $_POST['size'];
$shape = $_POST['shape'];
$life = $_POST['life'];
$date = $_POST['date'];
$building = $_POST['building'];
$floor = $_POST['floor'];
$room = $_POST['room'];
$remarks = $_POST['remarks'];
$handler = $_SESSION['handler'];

// Validate inputs
if (!is_numeric($conditionnew) || !is_numeric($conditiongood) || !is_numeric($conditionbad) || !is_numeric($quantity)) {
    // Display an error and redirect back
    echo '<script>alert("Please enter numeric values for conditions and quantity");</script>';
    echo '<script>window.location.href = "add.php";</script>';
    exit;
}

// Convert inputs to numbers
$conditionnew = (int)$conditionnew;
$conditiongood = (int)$conditiongood;
$conditionbad = (int)$conditionbad;
$quantity = (int)$quantity;

// Check if the sum of conditions is equal to quantity
if (($conditionnew + $conditiongood + $conditionbad) != $quantity) {
    // Display an error and redirect back
    echo '<script>alert("Conditions do not add up to quantity");</script>';
    echo '<script>window.location.href = "add.php";</script>';
    exit;
}

$total = $quantity * $price;

// Set the MySQL time zone
$sql_set_timezone = "SET time_zone = '+08:00'";
$conn->query($sql_set_timezone);

// Your SQL query
$sql_insert_item = "INSERT INTO inventory (id, product_name, category, price, unit, quantity, condition_new, condition_good, condition_bad, brand, color, size, shape, life, total, user, date, building, floor, room, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare($sql_insert_item);
$stmt->bind_param("issssssssssssssssssss", $new_id, $productname, $category, $price, $unit, $quantity, $conditionnew, $conditiongood, $conditionbad, $brand, $color, $size, $shape, $life, $total, $handler, $date, $building, $floor, $room, $remarks);

if ($stmt->execute()) {
    // If the query is successful, display the alert
    $sql_insert_history = "INSERT INTO history (user, activity, product_name, type, category, datetime) VALUES ('$handler', 'created', '$productname', 'item', '$category', NOW())";

    if ($conn->query($sql_insert_history) === TRUE) {
        echo '<script>alert("Item successfully added");</script>';
        echo '<script>window.location.href = "inventory.php";</script>';
    } else {
        // If the query fails, display the error
        echo '<script>alert("Error adding item");</script>';
    }
}
// Close the statement
$stmt->close();

// Close the connection
$conn->close();
