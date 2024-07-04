<?php
date_default_timezone_set('Asia/Manila');
include 'connect.php';
session_start();
$handler1 = $_SESSION['handler'];

$sql_set_timezone = "SET time_zone = '+08:00'";
$conn->query($sql_set_timezone);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $handler = $_POST['handler'];
    $position = $_POST['position'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Fetch the maximum ID from the 'user' table
    $sql_max_id = "SELECT MAX(id) as max_id FROM user";
    $result = $conn->query($sql_max_id);

    if ($result && $row = $result->fetch_assoc()) {
        $new_id = $row['max_id'] + 1; // Increment the maximum ID to generate the next ID
    } else {
        // Set a default value if no records are found (e.g., starting from 1)
        $new_id = 1;
    }

    // Insert query to add a new user with the manually incremented ID
    $sql_insert = "INSERT INTO user (id, username, hashedpassword, password, handler, position) VALUES ('$new_id', '$username', '$hashedPassword' ,'$password', '$handler', '$position')";

    if ($conn->query($sql_insert) === TRUE) {
        $sql_insert_history = "INSERT INTO history (user, activity, product_name, type, datetime) VALUES ('$handler1', 'added','$username', 'account', NOW())";

        if ($conn->query($sql_insert_history) === TRUE) {
            echo '<script>alert("New user created successfully");</script>';
            echo '<script>window.location.href = "settings.php";</script>';
        } else {
            echo "Error: " . $sql_insert_history . "<br>" . $conn->error;
        }
        echo '<script>alert("New user created successfully");</script>';
        echo '<script>window.location.href = "settings.php";</script>';
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/edituser.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Add User</title>

    <?php include 'header_admin.php'; ?>
</head>

<body>
    <h1 class="font dashboard">Accounts</h1>
    <hr class="dashhr">
    <h2 class="font edit">Add Account</h2>
    <div class="form-container2">
        <form method="post" action="adduser.php">
            <div class="input-container">
                <label for="username">Username:</label>
                <input class="input" type="text" id="username" name="username">
                <label for="password">Password:</label>
                <input class="input" type="password" id="password" name="password">
                <label for="handler">Handler:</label>
                <input class="input" type="handler" id="handler" name="handler">
                <label for="position">Position:</label>
                <input class="input" type="position" id="position" name="position">
                <div class="submit-container2">
                    <input class="submit" type="submit" value="Add User">
                </div>
            </div>
        </form>
    </div>
</body>
<div class="backpos">
    <footer>
        <a style="text-decoration:none" href="settings.php" class="back">Back</a>
    </footer>
</div>

</html>