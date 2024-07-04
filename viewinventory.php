<?php
include 'connect.php';
session_start();
$handler = $_SESSION['handler'];
$username = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_select_user = "SELECT * FROM inventory WHERE id = $id";
    $result = $conn->query($sql_select_user);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $productname = $row["product_name"];
        $category = $row["category"];
        $price = $row["price"];
        $unit = $row["unit"];
        $quantity = $row["quantity"];
        $conditionnew = $row["condition_new"];
        $conditiongood = $row["condition_good"];
        $conditionbad = $row["condition_bad"];
        $brand = $row["brand"];
        $color = $row["color"];
        $size = $row["size"];
        $shape = $row["shape"];
        $life = $row['life'];
        $date = $row['date'];
        $building = $row['building'];
        $floor = $row['floor'];
        $room = $row['room'];
        $remarks = $row['remarks'];
    } else {
        echo "Item not found.";
        $conn->close();
        exit;
    }

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
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>View Item</title>

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
    } ?>
</head>

<body>
    <h1 class="font dashboard">Inventory</h1>
    <hr class="dashhr">
    <h2 class="font edit">View Item</h2>
    <div class="form-container">
        <form method="post" action="editinventory.php?id=<?php echo urlencode($id); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-container">
                <label for="productname">Item Name:</label>
                <input class="input" type="text" id="productname" name="productname" value="<?php echo $productname; ?>" readonly>
                <br>
                <label for="category">Category:</label>
                <input class="input" type="text" id="category" name="category" value="<?php echo $category; ?>" readonly>
                <br>
                <label for="price">Price:</label>
                <input class="input" type="text" id="price" name="price" value="<?php echo $price; ?>" readonly>
                <br>
                <label for="unit">Unit:</label>
                <input class="input" type="text" id="unit" name="unit" value="<?php echo $unit; ?>" readonly>
                <br>
                <label for="quantity">Quantity:</label>
                <input class="input" type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>" readonly>
                <br>
                <div class="input">
                    <h5 class="condition-title">Condition</h5>
                    <div class="center">
                        <span>New: <input class="condition-container" type="text" id="conditionnew" name="conditionnew" value="<?php echo $conditionnew; ?>" readonly>
                            <span>Good: <input class="condition-container" type="text" id="conditiongood" name="conditiongood" value="<?php echo $conditiongood; ?>" readonly>
                                <span>Bad: </span><input class="condition-container" type="text" id="conditionbad" name="conditionbad" value="<?php echo $conditionbad; ?>" readonly>
                    </div>
                    <br>
                    <h4 class="condition-title1">Brand:</h4>
                    <input class="input5" type="text" id="brand" name="brand" value="<?php echo $brand; ?>" readonly>
                    <h4 class="condition-title1">Color:</h4>
                    <input class="input5" type="text" id="color" name="color" value="<?php echo $color; ?>" readonly>
                    <h4 class="condition-title1">Size:</h4>
                    <input class="input5" type="text" id="size" name="size" value="<?php echo $size; ?>" readonly>
                    <h4 class="condition-title1">Shape:</h4>
                    <input class="input5" type="text" id="shape" name="shape" value="<?php echo $shape; ?>" readonly>
                    <h4 class="condition-title1">Estimated Life Expentancy:</h4>
                    <input class="input7" type="text" id="life" name="life" value="<?php echo $life; ?>" readonly>
                    <h4 class="condition-title1">Acquisition Date:</h4>
                    <input class="input7" type="date" id="date" name="date" value="<?php echo $date; ?>" readonly>
                    <h4 class="condition-title1">Building:</h4>
                    <input class="input7" type="building" id="building" name="building" value="<?php echo $buildingname; ?>" readonly>
                    <h4 class="condition-title1">Floor:</h4>
                    <input class="input7" type="floor" id="floor" name="floor" value="<?php echo $floor; ?>" readonly>
                    <h4 class="condition-title1">Room:</h4>
                    <input class="input7" type="room" id="room" name="room" value="<?php echo $roomname; ?>" readonly>
                    <label for="remarks">Additional Information:</label>
                    <textarea class="inputremarks" id="remarks" name="remarks" readonly><?php echo $remarks; ?></textarea>
                </div>
            </div>
        </form>
        <div class="backpos">
            <footer>
                <a style="text-decoration:none" href="inventory.php" class="back">Back</a>
            </footer>
        </div>
    </div>
</body>

</html>