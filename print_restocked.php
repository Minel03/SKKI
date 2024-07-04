<?php

include 'connect.php';
session_start();
$name = $_SESSION['handler'];
$position = $_SESSION['position'];
$date = date('F j, Y');
// Get the current date in the format 'Month day, Year'
$restockeddate = $_GET['monthYear'];
$dateObj = DateTime::createFromFormat('Y-m', $restockeddate);

// Format the DateTime object as 'F, Y' (Month, Year)
$formattedDate = $dateObj->format('F, Y');
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
    <h3 style="font-family: Arial; font-weight: normal;">Restocked Item for <?php echo $formattedDate ?></h3>
    <table>
        <h3 style="font-family: Arial; font-weight: normal;">List of Item:</h3>
        <tr style="font-family: Arial; font-weight: normal;">
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Building</th>
            <th>Floor</th>
            <th>Room</th>
            <th>Date Restocked</th>
        </tr>
        <tr style="text-align: center; font-family: Arial; font-weight: normal; margin-left: 50px;">
            <?php
            $sql = "SELECT *, DATE_FORMAT(date, '%M %e, %Y') as date FROM restocked_items WHERE DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT('$restockeddate-01', '%Y-%m')
";
            $result = $conn->query($sql);
            if ($result->num_rows === 0) {
                echo "<tr><td colspan='6'>0 results</td></tr>";
            } else {
                // Loop through the results and display the table rows
                while ($row = $result->fetch_assoc()) {
                    $productname = $row["product_name"];
                    $quantity = $row["quantity"];
                    $building = $row["building"];
                    $floor = $row["floor"];
                    $room = $row["room"];

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
                    echo "<td>" . $date . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tr>
    </table>
</div>