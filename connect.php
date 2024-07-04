<?php

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skki";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
return $conn;
