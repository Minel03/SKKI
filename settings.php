<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Settings</title>

    <?php
    session_start();
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
    }
    ?>

</head>

<body>
    <h1 class="font dashboard">Accounts</h1>
    <hr class="dashhr">
    <?php
    include 'connect.php';

    // Initialize variables
    $error_message = '';

    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Unable to connect to the database");
        }
        $username = $_SESSION['username'];
        if ($_SESSION['username']) {
            if ($username == 'admin') {
                $sql_select = "SELECT id, username, password, handler, position FROM user LIMIT 4 OFFSET 2";
            } else {
                $sql_select = "SELECT id, username, password, handler, position FROM user";
            }
        }

        $result = $conn->query($sql_select);

        // Check if the SELECT query returned results
        if ($result->num_rows > 0) {
            // Output data in a table
            echo '<table border="1" width="100%">';
            echo '<tr><th>ID</th><th>Username</th><th>Password</th><th>Name</th><th>Position</th><th>Actions</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["username"] . '</td>';
                echo '<td>' . $row["password"] . '</td>';
                echo '<td>' . $row["handler"] . '</td>';
                echo '<td>' . $row["position"] . '</td>';
                echo '<td><a style="text-decoration:none; margin-right:5px" class="button1" href="edituser.php?id=' . $row['id'] . '">Edit</a><a style="text-decoration:none" class="button" href="deleteuserconfirmation.php?id=' . $row['id'] . '">Delete</a></td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo "0 results";
        }

        $conn->close();
    } catch (Exception $e) {
    }
    ?>

    <div class="add">
        <a style="text-decoration:none" href="adduser.php" class="back">Add Account</a>
    </div>
    <h1 class="font dashboard">Backup and Restore</h1>
    <div class="add">
        <a style="text-decoration:none; margin-right:20px;" href="backup.php" class="back">Backup Database</a>
        <a style="text-decoration:none" href="recover.php" class="back">Restore Database</a>
    </div>
    <div class="backpos">
        <footer>
            <a style="text-decoration:none" href="settings.php" class="back">Back</a>
        </footer>
</body>

</html>