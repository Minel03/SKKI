<?php
date_default_timezone_set('Asia/Manila');
include 'connect.php';
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST["id"];
    $productName = $_POST["productname"];
    $quantity = $_POST["quantity"];
    $conditionNew = $_POST["conditionnew"];
    $conditionGood = $_POST["conditiongood"];
    $conditionBad = $_POST["conditionbad"];
    $building = $_POST["building"];
    $floor = $_POST["floor"];
    $room = $_POST["room"];
    $category = $_POST["category"];
    $remarks = $_POST["remarks"];
    $handler = $_SESSION['handler'];

    // Input validation
    if (!is_numeric($conditionNew) || !is_numeric($conditionGood) || !is_numeric($conditionBad) || !is_numeric($quantity)) {
        // Display an error and redirect back
        echo '<script>alert("Please enter numeric values for conditions and quantity");</script>';
        echo '<script>window.location.href = "request.php";</script>';
        exit;
    }

    // Convert inputs to numbers
    $conditionNew = (int)$conditionNew;
    $conditionGood = (int)$conditionGood;
    $conditionBad = (int)$conditionBad;
    $quantity = (int)$quantity;

    // Retrieve the maximum ID from the inventory table
    $sql_max_id = "SELECT MAX(id) as max_id FROM inventory";
    $result_max_id = $conn->query($sql_max_id);

    if ($result_max_id && $row_max_id = $result_max_id->fetch_assoc()) {
        $new_id = $row_max_id['max_id'] + 1; // Increment the maximum ID to generate the next ID
    } else {
        // Set a default value if no records are found (e.g., starting from 1)
        $new_id = 1;
    }

    // Check if the generated ID already exists in the out_items table
    $id_exists_sql = "SELECT id FROM out_items WHERE id = $new_id";
    $id_exists_result = $conn->query($id_exists_sql);

    if (
        $id_exists_result->num_rows > 0
    ) {
        // If the ID already exists, find the next available ID
        $next_id_sql = "SELECT MAX(id) + 1 as next_id FROM out_items";
        $next_id_result = $conn->query($next_id_sql);

        if ($next_id_result && $row_next_id = $next_id_result->fetch_assoc()) {
            $new_id = $row_next_id['next_id'];
        } else {
            // Set a default value if no records are found (e.g., starting from 1)
            $new_id = 1;
        }
    }

    // Retrieve current values from the inventory table
    $sql = "SELECT * FROM inventory WHERE product_name = '$productName'";
    $result = $conn->query($sql);

    $sql_set_timezone = "SET time_zone = '+08:00'";
    $conn->query($sql_set_timezone);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $category = $row["category"];
        $price = $row["price"];

        // Check if the conditions can be subtracted without going below 0

        // Update inventory table
        $updateInventorySql = "UPDATE inventory SET 
            quantity = quantity - $quantity,
            condition_new = condition_new - $conditionNew,
            condition_good = condition_good - $conditionGood,
            condition_bad = condition_bad - $conditionBad,
            total = total - $quantity * $price
            WHERE product_name = '$productName' AND id = '$product_id'";

        if ($conn->query($updateInventorySql) === TRUE) {
            // Insert data into out_items table
            $insertOutItemsSql = "INSERT INTO out_items (id, product_name, quantity, condition_new, condition_good, condition_bad, user, date, remarks, building, floor, room, product_id)
                VALUES ($new_id, '$productName', $quantity, $conditionNew, $conditionGood, $conditionBad, '$handler', NOW(), '$remarks', '$building', '$floor', '$room', $product_id)";

            if ($conn->query($insertOutItemsSql) === TRUE) {
                $sql_insert_history = "INSERT INTO history (user, activity, product_name, type, category, datetime) VALUES ('$handler', 'requested', '$productName', 'item', '$category', NOW())";
                if ($conn->query($sql_insert_history) === TRUE) {
                    echo '<script>alert("Item released successfully");</script>';
                    echo '<script>window.location.href = "request.php";</script>';
                } else {
                    echo '<script>alert("Error inserting data into out_items table");</script>' . $conn->error;
                }
            } else {
                echo '<script>alert("Error inserting data into out_items table");</script>' . $conn->error;
            }
        } else {
            echo '<script>alert("Error updating inventory table");</script>' . $conn->error;
        }
    }
} else {
    echo '<script>alert("Product not found in the inventory");</script>';
}

// Close the database connection
$conn->close();
