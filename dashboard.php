<?php
include 'connect.php';
session_start();
$username = $_SESSION['username'];
$sql = "SELECT
    COUNT(DISTINCT id) AS 'Total Number of ID',
    SUM(quantity) AS 'Sum of Quantity',
    CONCAT(ROUND(SUM(total) / 1000), 'k') AS 'Sum of Total'
FROM
    inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $totalitem = $row["Total Number of ID"];
        $sumquantity = $row["Sum of Quantity"];
        $sumtotal = $row["Sum of Total"];
    }
}

$sql = "SELECT user, activity, product_name, DATE_FORMAT(datetime, '%l:%i %p, %m/%d/%Y') AS formatted_date 
        FROM history 
        ORDER BY datetime DESC
        LIMIT 3";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Dashboard</title>

    <?php
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
    <h1 class="font dashboard">DashBoard</h1>
    <hr class="dashhr">
    <h2 class="font edit">Inventory Summary</h2>
    <div class="statisticspos edit centered-container">
        <div class="statisticspos">
            <div class="statistics1" style="display:inline-block; margin-right:20px;">
                <h2 class="font2"><?php echo $totalitem; ?></h2>
                <h4 class="font3">Items</h4>
            </div>
            <div class="statistics1" style="display:inline-block; margin-right:20px;">
                <h2 class="font2"><?php echo $sumquantity; ?></h2>
                <h4 class="font3">Total Quantity</h4>
            </div>
            <div class="statistics1" style="display:inline-block; margin-right:20px;">
                <h2 class="font7">estimated</h2>
                <h2 class="font8"><?php echo $sumtotal; ?></h2>
                <h4 class="font9">Total Value</h4>
            </div>
        </div>
    </div>
    <h2 class="font edit" style="margin-top: 50px;">Recent Activity</h2>
    <div class="form-container" style="margin-right: 70px;">
        <div class="input-container">
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    echo '<h4 class="input3">' . $row["user"] . ' ' . $row["activity"] . ' item ' . $row["product_name"] . '<span style="float: right;">' . $row["formatted_date"] . '</span></h4>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    <h1 class="font edit">Introduction</h1>
    <h2 class="font edit">SKKInventory is a customized inventory management system created for <br>
        the Shoreline Kabalikat sa Kaunlaran Incorporated by Mynel Iesu Santos <br>
        and Rian Leigh Buhay. This is a project in Software Engineering 2 in <br>
        Cavite State University in the year of 2023-2024.</h2>
</body>

</html>