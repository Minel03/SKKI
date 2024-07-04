<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $storedPassword = $user['hashedpassword'];

        if (password_verify($password, $storedPassword)) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['handler'] = $user['handler']; // Store the 'handler' in session
            $_SESSION['position'] = $user['position']; // Store the 'position' in session

            header('Location: dashboard.php');

            exit();
        } else {
            echo '<script>alert("Incorrect Password");</script>';
            echo '<script>window.location.href = "index.php";</script>';
        }
    } else {
        echo '<script>alert("Incorrect Username");</script>';
        echo '<script>window.location.href = "index.php";</script>';
    }

    $result->free();
}
