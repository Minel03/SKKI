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
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $productname = $_POST['productname'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $quantity = $_POST['quantity'];
    $conditionnew = $_POST['conditionnew'];
    $conditiongood = $_POST['conditiongood'];
    $conditionbad = $_POST['conditionbad'];
    $brand = $_POST['brand'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $shape = $_POST['shape'];
    $life = $_POST['life'];
    $date = $_POST['date'];
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $remarks = $_POST['remarks'];

    if (($conditionnew + $conditiongood + $conditionbad) != $quantity) {
        // Display an error and redirect back\
        echo '<script>alert("Conditions do not add up to quantity");</script>';
        echo '<script>window.location.href = "inventory.php";</script>';
        exit;
    }

    $total = $quantity * $price;

    $sql_update_plain = "UPDATE inventory SET product_name='$productname', category='$category', price='$price', unit='$unit', quantity='$quantity', condition_new='$conditionnew', condition_good='$conditiongood', condition_bad='$conditionbad', brand='$brand', color='$color', size='$size', shape='$shape', life='$life', date='$date', building='$building', floor='$floor', room='$room', remarks='$remarks', total='$total' WHERE id=$id";

    if ($conn->query($sql_update_plain) === TRUE) {
        $sql_insert_history = "INSERT INTO history (user, activity, product_name, type, category, datetime) VALUES ('$handler', 'edited', '$productname', 'item', '$category', NOW())";

        if ($conn->query($sql_insert_history) === TRUE) {
            echo '<script>alert("Item updated successfully");</script>';
            echo '<script>window.location.href = "inventory.php";</script>';
        } else {
            echo '<script>alert("Failed updating item");</script>' . $conn->error;
        }
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
    <title>Edit Item</title>

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
    <h2 class="font edit">Edit Item</h2>
    <div class="form-container">
        <form method="post" action="editinventory.php?id=<?php echo urlencode($id); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-container">
                <label for="productname">Item Name:</label>
                <input class="input" type="text" id="productname" name="productname" value="<?php echo $productname; ?>">
                <br>
                <label for="category">Category:</label>
                <select class="input4" id="category" name="category" required>
                    <option value="">Select</option>
                    <option value="Cleaning Materials" <?php echo ($category == 'Cleaning Materials') ? 'selected' : ''; ?>>Cleaning Materials</option>
                    <option value="Bedding" <?php echo ($category == 'Bedding') ? 'selected' : ''; ?>>Bedding</option>
                    <option value="Catering Materials" <?php echo ($category == 'Catering Materials') ? 'selected' : ''; ?>>Catering Materials</option>
                    <option value="Kitchen Materials" <?php echo ($category == 'Kitchen Materials') ? 'selected' : ''; ?>>Kitchen Materials</option>
                    <option value="Spare Parts of Water System" <?php echo ($category == 'Spare Parts of Water System') ? 'selected' : ''; ?>>Spare Parts of Water System</option>
                    <option value="Others" <?php echo ($category == 'Others') ? 'selected' : ''; ?>>Others</option>
                </select>
                <br>
                <label for="price">Price:</label>
                <input class="input" type="text" id="price" name="price" value="<?php echo $price; ?>">
                <br>
                <label for="unit">Unit:</label>
                <input class="input" type="text" id="unit" name="unit" value="<?php echo $unit; ?>">
                <br>
                <label for="quantity">Quantity:</label>
                <input class="input" type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>">
                <br>
                <div class="input">
                    <h5 class="condition-title">Condition</h5>
                    <div class="center">
                        <span>New: <input class="condition-container" type="text" id="conditionnew" name="conditionnew" value="<?php echo $conditionnew; ?>">
                            <span>Good: <input class="condition-container" type="text" id="conditiongood" name="conditiongood" value="<?php echo $conditiongood; ?>">
                                <span>Bad: </span><input class="condition-container" type="text" id="conditionbad" name="conditionbad" value="<?php echo $conditionbad; ?>">
                    </div>
                    <br>
                    <h4 class="condition-title1">Brand:</h4>
                    <input class="input5" type="text" id="brand" name="brand" value="<?php echo $brand; ?>">
                    <h4 class="condition-title1">Color:</h4>
                    <input class="input5" type="text" id="color" name="color" value="<?php echo $color; ?>">
                    <h4 class="condition-title1">Size:</h4>
                    <input class="input5" type="text" id="size" name="size" value="<?php echo $size; ?>">
                    <h4 class="condition-title1">Shape:</h4>
                    <input class="input5" type="text" id="shape" name="shape" value="<?php echo $shape; ?>">
                    <h4 class="condition-title1">Estimated Life Expentancy:</h4>
                    <input class="input7" type="text" id="life" name="life" value="<?php echo $life; ?>">
                    <h4 class="condition-title1">Acquisition Date:</h4>
                    <input class="input7" type="date" id="date" name="date" value="<?php echo $date; ?>">
                    <h4 class="condition-title1">Building:</h4>
                    <select class="input6" id="building" name="building" onchange="updateFloorOptions();">
                        <option value="">Select</option>
                        <option value="1" <?php echo ($building == 1) ? 'selected' : ''; ?>>Office Building</option>
                        <option value="2" <?php echo ($building == 2) ? 'selected' : ''; ?>>CRC Main Building</option>
                    </select>

                    <h4 class="condition-title1">Floor:</h4>
                    <select class="input6" id="floor" name="floor" onchange="updateRoomOptions();">
                        <option value="">Select</option>
                        <option value="1" <?php echo ($floor == 1) ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo ($floor == 2) ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?php echo ($floor == 3) ? 'selected' : ''; ?>>3</option>
                    </select>
                    <h4 class="condition-title1">Room:</h4>
                    <select class="input6" id="room" name="room">
                        <option value="">Select</option>
                        <?php
                        if ($building === "1" && $floor === "1") {
                            echo '<option value="1" ' . (($room === '1') ? 'selected' : '') . '>Display Area</option>';
                            echo '<option value="2" ' . (($room === '2') ? 'selected' : '') . '>Program / Finance Room</option>';
                            echo '<option value="3" ' . (($room === '3') ? 'selected' : '') . '>Management / Library Room</option>';
                            echo '<option value="4" ' . (($room === '4') ? 'selected' : '') . '>Business Room</option>';
                            echo '<option value="5" ' . (($room === '5') ? 'selected' : '') . '>Stock Room</option>';
                            echo '<option value="6" ' . (($room === '6') ? 'selected' : '') . '>Day Care Center</option>';
                            echo '<option value="7" ' . (($room === '7') ? 'selected' : '') . '>Water Refilling Station</option>';
                        } else if ($building === "1" && $floor === "2") {
                            echo '<option value="1" ' . (($room === '1') ? 'selected' : '') . '>Display Area</option>';
                            echo '<option value="2" ' . (($room === '2') ? 'selected' : '') . '>Program / Finance Room</option>';
                            echo '<option value="3" ' . (($room === '3') ? 'selected' : '') . '>Management / Library Room</option>';
                            echo '<option value="4" ' . (($room === '4') ? 'selected' : '') . '>Business Room</option>';
                            echo '<option value="5" ' . (($room === '5') ? 'selected' : '') . '>Stock Room</option>';
                            echo '<option value="6" ' . (($room === '6') ? 'selected' : '') . '>Day Care Center</option>';
                            echo '<option value="7" ' . (($room === '7') ? 'selected' : '') . '>Water Refilling Station</option>';
                            echo '<option value="8" ' . (($room === '8') ? 'selected' : '') . '>World Vision Room/Counseling Room</option>';
                            echo '<option value="9" ' . (($room === '9') ? 'selected' : '') . '>Mt. Zion</option>';
                            echo '<option value="10" ' . (($room === '10') ? 'selected' : '') . '>Stock Room</option>';
                            echo '<option value="11" ' . (($room === '11') ? 'selected' : '') . '>Finance Room</option>';
                            echo '<option value="12" ' . (($room === '12') ? 'selected' : '') . '>Rest Room 1</option>';
                            echo '<option value="13" ' . (($room === '13') ? 'selected' : '') . '>Rest Room 2</option>';
                        } else if ($building === "1" && $floor === "3") {
                            echo '<option value="14" ' . (($room === '14') ? 'selected' : '') . '>Conference Room</option>';
                            echo '<option value="15" ' . (($room === '15') ? 'selected' : '') . '>Rest Room</option>';
                        } else if ($building === "2" && $floor === "1") {
                            echo '<option value="16" ' . (($room === '16') ? 'selected' : '') . '>Isaiah</option>';
                            echo '<option value="17" ' . (($room === '17') ? 'selected' : '') . '>Linen</option>';
                            echo '<option value="18" ' . (($room === '18') ? 'selected' : '') . '>King Solomon</option>';
                            echo '<option value="19" ' . (($room === '19') ? 'selected' : '') . '>Kitchen</option>';
                            echo '<option value="20" ' . (($room === '20') ? 'selected' : '') . '>Dining</option>';
                            echo '<option value="21" ' . (($room === '21') ? 'selected' : '') . '>Rest Room 1</option>';
                            echo '<option value="22" ' . (($room === '22') ? 'selected' : '') . '>Rest Room 2</option>';
                        } else if ($building === "2" && $floor === "2") {
                            echo '<option value="23" ' . (($room === '23') ? 'selected' : '') . '>Mt. Olive</option>';
                            echo '<option value="24" ' . (($room === '24') ? 'selected' : '') . '>Mt. Carmel</option>';
                            echo '<option value="25" ' . (($room === '25') ? 'selected' : '') . '>Judea</option>';
                            echo '<option value="26" ' . (($room === '26') ? 'selected' : '') . '>Galilee</option>';
                            echo '<option value="27" ' . (($room === '27') ? 'selected' : '') . '>Gethsemane</option>';
                            echo '<option value="28" ' . (($room === '28') ? 'selected' : '') . '>Jericho</option>';
                            echo '<option value="29" ' . (($room === '29') ? 'selected' : '') . '>Rest Room 1</option>';
                            echo '<option value="30" ' . (($room === '30') ? 'selected' : '') . '>Rest Room 2</option>';
                        } else if ($building === "2" && $floor === "3") {
                            echo '<option value="31" ' . (($room === '31') ? 'selected' : '') . '>Esther</option>';
                            echo '<option value="32" ' . (($room === '32') ? 'selected' : '') . '>Ruth</option>';
                            echo '<option value="33" ' . (($room === '33') ? 'selected' : '') . '>Ezekiel</option>';
                            echo '<option value="34" ' . (($room === '34') ? 'selected' : '') . '>Jonnah</option>';
                            echo '<option value="35" ' . (($room === '35') ? 'selected' : '') . '>Micah</option>';
                            echo '<option value="36" ' . (($room === '36') ? 'selected' : '') . '>Samuel</option>';
                            echo '<option value="37" ' . (($room === '37') ? 'selected' : '') . '>Rest Room 1</option>';
                            echo '<option value="38" ' . (($room === '38') ? 'selected' : '') . '>Rest Room 2</option>';
                        }
                        ?>
                    </select>
                    <label for="remarks">Additional Information:</label>
                    <textarea class="inputremarks" id="remarks" name="remarks"><?php echo $remarks; ?></textarea>
                </div>
            </div>
            <div class="submit-container">
                <input class="submit" type="submit" value="Edit Item">
            </div>
        </form>
        <div class="backpos">
            <footer>
                <a style="text-decoration:none" href="inventory.php" class="back">Back</a>
            </footer>
        </div>
    </div>
    <script>
        function updateFloorOptions() {
            var buildingSelect = document.getElementById("building");
            var floorSelect = document.getElementById("floor");

            // Clear existing options
            floorSelect.innerHTML = '<option value="">Select</option>';

            // Add new options based on the selected building
            var buildingValue = buildingSelect.value;
            if (buildingValue === "1") {
                // Add floor options for Office Building
                for (var i = 1; i <= 3; i++) {
                    var option = document.createElement("option");
                    option.value = i;
                    option.text = i;
                    floorSelect.add(option);
                }
            } else if (buildingValue === "2") {
                // Add floor options for CRC Main Building
                for (var i = 1; i <= 3; i++) {
                    var option = document.createElement("option");
                    option.value = i;
                    option.text = i;
                    floorSelect.add(option);
                }
            }
        }

        function updateRoomOptions() {
            var buildingSelect = document.getElementById("building");
            var floorSelect = document.getElementById("floor");
            var roomSelect = document.getElementById("room");

            // Clear existing options
            roomSelect.innerHTML = '<option value="">Select</option>';

            // Add new options based on the selected building and floor
            var buildingValue = buildingSelect.value;
            var floorValue = floorSelect.value;

            if (buildingValue === "1" && floorValue === "1") {
                // Add room options for Office Building, Floor 1
                roomSelect.innerHTML = `
            <option value="1" <?php echo ($room === '1') ? 'selected' : ''; ?>>Display Area</option>
            <option value="2" <?php echo ($room === '2') ? 'selected' : ''; ?>>Program / Finance Room</option>
            <option value="3" <?php echo ($room === '3') ? 'selected' : ''; ?>>Management / Library Room</option>
            <option value="4" <?php echo ($room === '4') ? 'selected' : ''; ?>>Business Room</option>
            <option value="5" <?php echo ($room === '5') ? 'selected' : ''; ?>>Stock Room</option>
            <option value="6" <?php echo ($room === '6') ? 'selected' : ''; ?>>Day Care Center</option>
            <option value="7" <?php echo ($room === '7') ? 'selected' : ''; ?>>Water Refilling Station</option>
        `;
            } else if (buildingValue === "1" && floorValue === "2") {
                // Add room options for Office Building, Floor 2
                roomSelect.innerHTML = `
            <option value="8" <?php echo ($room === '8') ? 'selected' : ''; ?>>World Vision Room/Counseling Room</option>
            <option value="9" <?php echo ($room === '9') ? 'selected' : ''; ?>>Mt. Zion</option>
            <option value="10" <?php echo ($room === '10') ? 'selected' : ''; ?>>Stock Room</option>
            <option value="11" <?php echo ($room === '11') ? 'selected' : ''; ?>>Finance Room</option>
            <option value="12" <?php echo ($room === '12') ? 'selected' : ''; ?>>Rest Room 1</option>
            <option value="13" <?php echo ($room === '13') ? 'selected' : ''; ?>>Rest Room 2</option>
        `;
                // Customize as needed
            } else if (buildingValue === "1" && floorValue === "3") {
                // Add room options for Office Building, Floor 3
                roomSelect.innerHTML = `
            <option value="14" <?php echo ($room === '14') ? 'selected' : ''; ?>>Conference Room</option>
            <option value="15" <?php echo ($room === '15') ? 'selected' : ''; ?>>Rest Room</option>
        `;
                // Customize as needed
            } else if (buildingValue === "2" && floorValue === "1") {
                // Add room options for CRC Main Building, Floor 1
                roomSelect.innerHTML = `
            <option value="16" <?php echo ($room === '16') ? 'selected' : ''; ?>>Isaiah</option>
            <option value="17" <?php echo ($room === '17') ? 'selected' : ''; ?>>Linen</option>
            <option value="18" <?php echo ($room === '18') ? 'selected' : ''; ?>>King Solomon</option>
            <option value="19" <?php echo ($room === '19') ? 'selected' : ''; ?>>Kitchen</option>
            <option value="20" <?php echo ($room === '20') ? 'selected' : ''; ?>>Dining Room</option>
            <option value="21" <?php echo ($room === '21') ? 'selected' : ''; ?>>Rest Room 1</option>
            <option value="22" <?php echo ($room === '22') ? 'selected' : ''; ?>>Rest Room 2</option>
        `;
                // Customize as needed
            } else if (buildingValue === "2" && floorValue === "2") {
                // Add room options for CRC Main Building, Floor 2
                roomSelect.innerHTML = `
            <option value="23" <?php echo ($room === '23') ? 'selected' : ''; ?>>Mt. Olive</option>
            <option value="24" <?php echo ($room === '24') ? 'selected' : ''; ?>>Mt. Carmel</option>
            <option value="25" <?php echo ($room === '25') ? 'selected' : ''; ?>>Judea</option>
            <option value="26" <?php echo ($room === '26') ? 'selected' : ''; ?>>Galilee</option>
            <option value="27" <?php echo ($room === '27') ? 'selected' : ''; ?>>Gethsemane</option>
            <option value="28" <?php echo ($room === '28') ? 'selected' : ''; ?>>Jericho</option>
            <option value="29" <?php echo ($room === '29') ? 'selected' : ''; ?>>Rest Room 1</option>
            <option value="30" <?php echo ($room === '30') ? 'selected' : ''; ?>>Rest Room 2</option>
        `;
                // Customize as needed
            } else if (buildingValue === "2" && floorValue === "3") {
                // Add room options for CRC Main Building, Floor 3
                roomSelect.innerHTML = `
            <option value="31" <?php echo ($room === '31') ? 'selected' : ''; ?>>Esther</option>
            <option value="32" <?php echo ($room === '32') ? 'selected' : ''; ?>>Ruth</option>
            <option value="33" <?php echo ($room === '33') ? 'selected' : ''; ?>>Ezekiel</option>
            <option value="34" <?php echo ($room === '34') ? 'selected' : ''; ?>>Jonnah</option>
            <option value="35" <?php echo ($room === '35') ? 'selected' : ''; ?>>Micah</option>
            <option value="36" <?php echo ($room === '36') ? 'selected' : ''; ?>>Samuel</option>
            <option value="37" <?php echo ($room === '37') ? 'selected' : ''; ?>>Rest Room 1</option>
            <option value="38" <?php echo ($room === '38') ? 'selected' : ''; ?>>Rest Room 2</option>
        `;
                // Customize as needed
            }
        }
    </script>
</body>

</html>