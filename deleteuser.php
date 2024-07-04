<?php
date_default_timezone_set('Asia/Manila');
include 'connect.php';
session_start();
$handler = $_SESSION['handler'];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlaccount = "SELECT username FROM user WHERE id=$id";
    $result = $conn->query($sqlaccount);
    $row = $result->fetch_assoc();
    $user = $row['username'];

    $sql_set_timezone = "SET time_zone = '+08:00'";
    $conn->query($sql_set_timezone);
    // Delete query to remove the user
    $sql_delete = "DELETE FROM user WHERE id=$id";

    if ($conn->query($sql_delete) === TRUE) {
        $sql_insert_history = "INSERT INTO history (user, activity, product_name, type, datetime) VALUES ('$handler', 'deleted', '$user', 'account', NOW())";
        if ($conn->query($sql_insert_history) === TRUE) {
            echo '<script>alert("User removed successfully");</script>';
            echo '<script>window.location.href = "settings.php";</script>';
        } else {
            echo '<script>alert("Failed to remove user");</script>';
            echo '<script>window.location.href = "settings.php";</script>';
        }
    } else {
        echo '<script>alert("Failed to remove user");</script>';
        echo '<script>window.location.href = "settings.php";</script>';
    }
} else {
    echo "Error deleting user: " . $conn->error;
}

$conn->close();
