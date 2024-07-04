<?php
date_default_timezone_set('Asia/Manila');
include 'connect.php';
session_start();
$handler2 = $_SESSION['handler'];

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_select_user = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql_select_user);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $username = $row["username"];
        $password = $row["password"];
        $handler1 = $row["handler"];
        $position1 = $row["position"];
    } else {
        echo "User not found.";
        $conn->close();
        exit();
    }
}

$sql_set_timezone = "SET time_zone = '+08:00'";
$conn->query($sql_set_timezone);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $handler = $_POST['handler'];
    $position = $_POST['position'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert query to add a new user with the manually incremented ID
    $sql_insert = "UPDATE user SET username = '$username', hashedpassword = '$hashedPassword', password = '$password', handler = '$handler', position = '$position' WHERE id = $id";

    if ($conn->query($sql_insert) === TRUE) {
        $sql_insert_history = "INSERT INTO history (user, activity, product_name, type, datetime) VALUES ('$handler2', 'edited','$username', 'account', NOW())";

        if ($conn->query($sql_insert_history) === TRUE) {
            echo '<script>alert("User updated successfully");</script>';
            echo '<script>window.location.href = "settings.php";</script>';
        } else {
            echo "Error: " . $sql_insert_history . "<br>" . $conn->error;
        }
        echo '<script>alert("User updated successfully");</script>';
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
    <title>Edit User</title>

    <?php
    $username = $_SESSION['username'];
    if ($_SESSION['username']) {
        if ($username == 'superadmin1' || $username == 'superadmin2') {
            include 'header_superadmin.php';
        } else if ($username == 'admin') {
            include 'header_admin.php';
        } else {
            include 'header.php';
        }
    } else {
        header("Location: index.php");
    } ?>
</head>

<body>
    <h1 class="font dashboard">Accounts</h1>
    <hr class="dashhr">
    <h2 class="font edit">Edit User</h2>
    <div class="form-container2">
        <form method="post" action="">
            <div class="input-container">
                <label for="username">Username:</label>
                <input class="input" type="text" id="username" name="username" value="<?php echo $username; ?>">
                <label for="password">Password:</label>
                <input class="input" type="text" id="password" name="password" value="<?php echo $password; ?>">
                <label for="handler">Handler:</label>
                <input class="input" type="handler" id="handler" name="handler" value="<?php echo $handler1; ?>">
                <label for="position">Position:</label>
                <input class="input" type="position" id="position" name="position" value="<?php echo $position1; ?>">
                <div class="submit-container2">
                    <input class="submit" type="submit" value="Edit User">
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