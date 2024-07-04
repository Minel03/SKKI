<?php

include 'connect.php';
session_start();
$name = $_SESSION['handler'];
$position = $_SESSION['position'];
// Get the current date in the format 'Month day, Year'
$date = date('F j, Y');

$sql = "SELECT product_name, quantity,  
    COUNT(DISTINCT id) AS 'Total Number of ID',
    SUM(quantity) AS 'Sum of Quantity',
    FORMAT(SUM(total), 2) AS 'Sum of Total'
FROM
    inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $totalitem = isset($row["Total Number of ID"]) ? $row["Total Number of ID"] : 0;
        $sumquantity = isset($row["Sum of Quantity"]) ? $row["Sum of Quantity"] : 0;
        $sumtotal = isset($row["Sum of Total"]) ? $row["Sum of Total"] : 0;
        $quantity = isset($row["quantity"]) ? $row["quantity"] : 0;
    }
}
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/inventory.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="icon" type="image/x-icon" href="images/logo1.ico">
<style>
    table {
        margin-top: 20px;
        margin-right: auto;
        margin-bottom: 20px;
        text-align: center;
        width: 100%;
        font-family: "Arial";
        border-collapse: collapse;
        border: #050404 1px solid;
    }

    td,
    th {
        border: #050404 1px solid;
    }

    th {
        padding: 10px;
        font-weight: normal;
    }
</style>
<div id="content">
    <div style="display: inline-block;">
        <h3 style="font-family: Arial; font-weight: normal;">Shoreline Kabalikat sa Kaunlaran Incorporated </h3>
    </div>
    <div style="display: inline-block;">
        <h3 style="font-family: Arial; font-weight: normal; margin-left: 90px;"> Date:<?php echo '<span style="text-decoration: underline;">' . $date . '</span>'; ?></h3>
    </div>
    <hr class="dashhr">
    <h3 style="font-family: Arial; font-weight: normal; margin-bottom: -20px;">Name: <?php echo $name; ?></h3>
    <h3 style="font-family: Arial; font-weight: normal;">Position: <?php echo $position; ?></h3>
    <hr class="dashhr">
    <h3 style="font-family: Arial; font-weight: normal; margin-bottom: -20px;">Category: All</h3>
    <h3 style="font-family: Arial; font-weight: normal; margin-bottom: -20px;">Items: <?php echo $totalitem; ?></h3>

    <h3 style="font-family: Arial; font-weight: normal; margin-bottom: -20px;">Total Quantity: <?php echo $sumquantity; ?> items</h3>

    <h3 style="font-family: Arial; font-weight: normal;">Total Value: <?php echo $sumtotal; ?> Pesos</h3>
    <table>
        <h3 style="font-family: Arial; font-weight: normal;;">List of Item:</h3>
        <tr style="font-family: Arial; font-weight: normal;">
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Building</th>
            <th>Floor</th>
            <th>Room</th>
        </tr>
        <tr style="text-align: center; font-family: Arial; font-weight: normal;">
            <?php
            $sql2 = "SELECT * FROM inventory;
";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows === 0) {
                echo "<tr><td colspan='5'>0 items</td></tr>";
            } else {
                // Loop through the results and display the table rows
                while ($row2 = $result2->fetch_assoc()) {
                    $productname = $row2["product_name"];
                    $quantity = $row2["quantity"];
                    $building = $row2["building"];
                    $floor = $row2["floor"];
                    $room = $row2["room"];

                    if ($building == 0) {
                        $buildingname = '-';
                    } else if ($building == 1) {
                        $buildingname = 'Office Building';
                    } else if ($building == 2) {
                        $buildingname = 'CRC Main Building';
                    }

                    if ($floor == 0) {
                        $floor = '-';
                    }

                    switch ($room) {
                        case 0:
                            $roomname = '-';
                            break;
                        case 1:
                            $roomname = 'Display Area';
                            break;
                        case 2:
                            $roomname = 'Program / Finance Room';
                            break;
                        case 3:
                            $roomname = 'Management / Library Room';
                            break;
                        case 4:
                            $roomname = 'Business Room';
                            break;
                        case 5:
                            $roomname = 'Stock Room';
                            break;
                        case 6:
                            $roomname = 'Day Care Center';
                            break;
                        case 7:
                            $roomname = 'Water Refilling Station';
                            break;
                        case 8:
                            $roomname = 'World Vision Room/Counseling Room';
                            break;
                        case 9:
                            $roomname = 'Mt. Zion';
                            break;
                        case 10:
                            $roomname = 'Stock Room';
                            break;
                        case 11:
                            $roomname = 'Finance Room';
                            break;
                        case 12:
                            $roomname = 'Rest Room 1';
                            break;
                        case 13:
                            $roomname = 'Rest Room 2';
                            break;
                        case 14:
                            $roomname = 'Conference Room';
                            break;
                        case 15:
                            $roomname = 'Rest Room';
                            break;
                        case 16:
                            $roomname = 'Isaiah';
                            break;
                        case 17:
                            $roomname = 'Linen';
                            break;
                        case 18:
                            $roomname = 'King Solomon';
                            break;
                        case 19:
                            $roomname = 'Kitchen';
                            break;
                        case 20:
                            $roomname = 'Dining';
                            break;
                        case 21:
                            $roomname = 'Rest Room 1';
                            break;
                        case 22:
                            $roomname = 'Rest Room 2';
                            break;
                        case 23:
                            $roomname = 'Mt. Olive';
                            break;
                        case 24:
                            $roomname = 'Mt. Carmel';
                            break;
                        case 25:
                            $roomname = 'Judea';
                            break;
                        case 26:
                            $roomname = 'Galilee';
                            break;
                        case 27:
                            $roomname = 'Gethsemane';
                            break;
                        case 28:
                            $roomname = 'Jericho';
                            break;
                        case 29:
                            $roomname = 'Rest Room 1';
                            break;
                        case 30:
                            $roomname = 'Rest Room 2';
                            break;
                        case 31:
                            $roomname = 'Esther';
                            break;
                        case 32:
                            $roomname = 'Ruth';
                            break;
                        case 33:
                            $roomname = 'Ezekiel';
                            break;
                        case 34:
                            $roomname = 'Jonnah';
                            break;
                        case 35:
                            $roomname = 'Micah';
                            break;
                        case 36:
                            $roomname = 'Samuel';
                            break;
                        case 37:
                            $roomname = 'Rest Room 1';
                            break;
                        case 38:
                            $roomname = 'Rest Room 2';
                            break;
                    }
                    echo "<tr>";
                    echo "<td>" . $productname . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>" . $buildingname . "</td>";
                    echo "<td>" . $floor . "</td>";
                    echo "<td>" . $roomname . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tr>
    </table>
    <h3 style="font-family: Arial; font-weight: normal; margin-bottom: -20px;">Damage Report:</h3>
    <?php
    $sql1 = "SELECT SUM(price) AS price, COUNT(*) AS item_count FROM inventory WHERE condition_bad <> 0";

    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        // Output data of each row
        while ($row1 = $result1->fetch_assoc()) {

            // Output information for each row inside the loop
            echo '<h3 style="font-family: Arial; font-weight: normal; margin-bottom: -20px;">Damaged Item: ' . $row1['item_count'] . '</h3>';
            echo '<h3 style="font-family: Arial; font-weight: normal; margin-bottom: -20px;">Total Price: ' . $row1['price'] . ' ' . 'Pesos' . '</h3><br>';

            echo '<h3 style="font-family: Arial; font-weight: normal;">List of Items:</h3>';
            echo '<table style="font-family: Arial; font-weight: normal;">';
            echo '<tr>';
            echo '<th>Item Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Building</th>';
            echo '<th>Floor</th>';
            echo '<th>Room</th>';
            echo '</tr>';
        }
    }
    $sql3 = "SELECT * FROM inventory WHERE condition_bad <> 0";

    $result3 = $conn->query($sql3);
    if ($result3->num_rows === 0) {
        echo "<tr><td colspan='5'>0 items</td></tr>";
    } else {
        while ($row3 = $result3->fetch_assoc()) {
            $productname1 = $row3["product_name"];
            $conditionbad = $row3["condition_bad"];
            $building1 = $row3["building"];
            $floor1 = $row3["floor"];
            $room1 = $row3["room"];

            if ($building1 == 0) {
                $buildingname1 = '-';
            } else if ($building1 == 1) {
                $buildingname1 = 'Office Building';
            } else if ($building1 == 2) {
                $buildingname1 = 'CRC Main Building';
            }

            if ($floor1 == 0) {
                $floor1 = '-';
            }

            switch ($room1) {
                case 0:
                    $roomname1 = '-';
                    break;
                case 1:
                    $roomname1 = 'Display Area';
                    break;
                case 2:
                    $roomname1 = 'Program / Finance Room';
                    break;
                case 3:
                    $roomname1 = 'Management / Library Room';
                    break;
                case 4:
                    $roomname1 = 'Business Room';
                    break;
                case 5:
                    $roomname1 = 'Stock Room';
                    break;
                case 6:
                    $roomname1 = 'Day Care Center';
                    break;
                case 7:
                    $roomname1 = 'Water Refilling Station';
                    break;
                case 8:
                    $roomname1 = 'World Vision Room/Counseling Room';
                    break;
                case 9:
                    $roomname1 = 'Mt. Zion';
                    break;
                case 10:
                    $roomname1 = 'Stock Room';
                    break;
                case 11:
                    $roomname1 = 'Finance Room';
                    break;
                case 12:
                    $roomname1 = 'Rest Room 1';
                    break;
                case 13:
                    $roomname1 = 'Rest Room 2';
                    break;
                case 14:
                    $roomname1 = 'Conference Room';
                    break;
                case 15:
                    $roomname1 = 'Rest Room';
                    break;
                case 16:
                    $roomname1 = 'Isaiah';
                    break;
                case 17:
                    $roomname1 = 'Linen';
                    break;
                case 18:
                    $roomname1 = 'King Solomon';
                    break;
                case 19:
                    $roomname1 = 'Kitchen';
                    break;
                case 20:
                    $roomname1 = 'Dining';
                    break;
                case 21:
                    $roomname1 = 'Rest Room 1';
                    break;
                case 22:
                    $roomname1 = 'Rest Room 2';
                    break;
                case 23:
                    $roomname1 = 'Mt. Olive';
                    break;
                case 24:
                    $roomname1 = 'Mt. Carmel';
                    break;
                case 25:
                    $roomname1 = 'Judea';
                    break;
                case 26:
                    $roomname1 = 'Galilee';
                    break;
                case 27:
                    $roomname1 = 'Gethsemane';
                    break;
                case 28:
                    $roomname1 = 'Jericho';
                    break;
                case 29:
                    $roomname1 = 'Rest Room 1';
                    break;
                case 30:
                    $roomname1 = 'Rest Room 2';
                    break;
                case 31:
                    $roomname1 = 'Esther';
                    break;
                case 32:
                    $roomname1 = 'Ruth';
                    break;
                case 33:
                    $roomname1 = 'Ezekiel';
                    break;
                case 34:
                    $roomname1 = 'Jonnah';
                    break;
                case 35:
                    $roomname1 = 'Micah';
                    break;
                case 36:
                    $roomname1 = 'Samuel';
                    break;
                case 37:
                    $roomname1 = 'Rest Room 1';
                    break;
                case 38:
                    $roomname1 = 'Rest Room 2';
                    break;
            }
            echo '<tr>';
            echo '<td>' . $productname1 . '</td>';
            echo '<td>' . $conditionbad . '</td>';
            echo '<td>' . $buildingname1 . '</td>';
            echo '<td>' . $floor1 . '</td>';
            echo '<td>' . $roomname1 . '</td>';
            echo '</tr>';
        }
    }
    ?>
</div>