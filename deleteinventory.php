<?php
date_default_timezone_set('Asia/Manila');
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $handler = $_SESSION['handler'];

    $sql_set_timezone = "SET time_zone = '+08:00'";
    $conn->query($sql_set_timezone);

    $sql = "SELECT * FROM inventory WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $productname = $row['product_name'];
    $category = $row['category'];
    // Delete query to remove the user
    $sql_delete = "DELETE FROM inventory WHERE id=$id";

    if ($conn->query($sql_delete) === TRUE) {
        $sql_insert_history = "INSERT INTO history (user, activity, product_name, type, category, datetime) VALUES ('$handler', 'deleted', '$productname', 'item', '$category', NOW())";

        if ($conn->query($sql_insert_history) === TRUE) {
            echo '<script>alert("Item removed successfully");</script>';
            echo '<script>window.location.href = "inventory.php";</script>';
        } else {
            echo "Error inserting history: " . $conn->error;
        }
        echo '<script>alert("Item removed successfully");</script>';
        echo '<script>window.location.href = "inventory.php";</script>';
    } else {
        echo "Error deleting item: " . $conn->error;
    }

    $conn->close();
}
