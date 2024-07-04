<?php
date_default_timezone_set('Asia/Manila');
include 'connect.php';
session_start();
$handler = $_SESSION['handler'];
$productName = ""; // Define $productName outside the block
$Quantity = 0; // Initialize $Quantity
$conditionNew = 0; // Initialize $conditionNew
$conditionGood = 0; // Initialize $conditionGood
$conditionBad = 0; // Initialize $conditionBad

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_select_user = "SELECT *, DATE_FORMAT(date, '%m/%d/%Y') AS formatted_date 
FROM out_items WHERE id = $id";

    $result = $conn->query($sql_select_user);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $iD = $row["id"];
        $productName = $row["product_name"];
        $Quantity = $row["quantity"];
        $conditionNew = $row["condition_new"];
        $conditionGood = $row["condition_good"];
        $conditionBad = $row["condition_bad"];
        $remarks = $row["remarks"];
        $user = $row["user"];
        $Date = $row["formatted_date"];
        $building = $row["building"];
        $floor = $row["floor"];
        $room = $row["room"];
        $product_id = $row["product_id"];
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $productname = $_POST['productname'];
    $quantity = $_POST['quantity'];
    $conditionnew = $_POST['conditionnew'];
    $conditiongood = $_POST['conditiongood'];
    $conditionbad = $_POST['conditionbad'];
    $remarks = $_POST['remarks'];
    $user = $_POST['user'];
    $product_id = $_POST['product_id'];
    $handler = $_SESSION['handler'];

    // Update the inventory table
    $sql_update_inventory = "UPDATE inventory SET
        quantity = quantity + $quantity,
        condition_new = condition_new + $conditionnew,
        condition_good = condition_good + $conditiongood,
        condition_bad = condition_bad + $conditionbad,
        date = CURRENT_DATE()
        WHERE id = $product_id";

    if ($conn->query($sql_update_inventory) === TRUE) {
        // Fetch the updated values from the inventory table
        $sql_fetch_inventory = "SELECT quantity, price, category FROM inventory WHERE product_name = '$productname' ";
        $result_fetch = $conn->query($sql_fetch_inventory);

        if ($result_fetch->num_rows > 0) {
            $row_fetch = $result_fetch->fetch_assoc();
            $currentQuantity = $row_fetch["quantity"];
            $price = $row_fetch["price"];
            $category = $row_fetch["category"];

            // Assuming $price is defined somewhere in your code
            $total = $currentQuantity * $price;

            $sql_set_timezone = "SET time_zone = '+08:00'";
            $conn->query($sql_set_timezone);

            // Update the total column in the inventory table
            $sql_update_total = "UPDATE inventory SET
                total = $total
                WHERE product_name = '$productname'";

            if ($conn->query($sql_update_total) === TRUE) {
                // Insert the data into the history table
                $sql_insert_history = "INSERT INTO history (user, activity, product_name, type, category, datetime) VALUES ('$handler', 'restocked', '$productname', 'item', '$category', NOW())";

                if ($conn->query($sql_insert_history) === TRUE) {
                    // Delete the data from the out_items table
                    $sql_insert_restocked_items = "INSERT INTO restocked_items (product_name, quantity, condition_new, condition_good, condition_bad, remarks, user, date, building, floor, room) 
                    SELECT product_name, quantity, condition_new, condition_good, condition_bad, remarks, user, date, building, floor, room 
                    FROM out_items WHERE id = $id";

                    if ($conn->query($sql_insert_restocked_items) === TRUE) {
                        $sql_delete_out_items = "DELETE FROM out_items WHERE id = $id";

                        if ($conn->query($sql_delete_out_items) === TRUE) {

                            echo '<script>alert("Item restocked successfully");</script>';
                            echo '<script>window.location.href = "inventory.php";</script>';
                        } else {
                            echo '<script>alert("Failed deleting from out_items: ' . $conn->error . '");</script>';
                        }
                    } else {
                        echo '<script>alert("Failed inserting into history: ' . $conn->error . '");</script>';
                    }
                }
            } else {
                echo '<script>alert("Failed updating total: ' . $conn->error . '");</script>';
            }
        } else {
            echo '<script>alert("Failed fetching updated values: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Failed updating item: ' . $conn->error . '");</script>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/inventory.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Out Items</title>

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
    <h1 class="font dashboard">OUT Items</h1>
    <hr class="dashhr">
    <h2 class="font edit">Released Item</h2>
    <div class="form-container">
        <form method="post" action="out_item_release.php?id=<?php echo urlencode($id); ?>">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input type="hidden" name="id" value="<?php echo $iD; ?>">
            <div class="input-container">
                <label for="productname">Item Name:</label>
                <input class="input" type="text" id="productname" name="productname" value="<?php echo $productName; ?>" readonly>
                <br>
                <label for="quantity">Quantity:</label>
                <input class="input" type="text" id="quantity" name="quantity" value="<?php echo $Quantity; ?>">
                <br>
                <div class="input">
                    <h5 class="condition-title">Condition</h5>
                    <div class="center">
                        <span>New: <input class="condition-container" type="text" id="conditionnew" name="conditionnew" value="<?php echo $conditionNew; ?>">
                            <span>Good: <input class="condition-container" type="text" id="conditiongood" name="conditiongood" value="<?php echo $conditionGood; ?>">
                                <span>Bad: </span><input class="condition-container" type="text" id="conditionbad" name="conditionbad" value="<?php echo $conditionBad; ?>">
                    </div>
                    <br>
                    <h4 class="condition-title1">Building:</h4>
                    <input class="input9" type="hidden" name="building" id="building" value="<?php echo $building; ?>" readonly>
                    <input class="input9" id="buildingname" value="<?php echo $buildingname; ?>" readonly>
                    <h4 class="condition-title1">Floor:</h4>
                    <input class="input9" id="floor" name="floor" value="<?php echo $floor; ?>" readonly>
                    <h4 class="condition-title1">Room:</h4>
                    <input class="input9" type="hidden" name="room" id="room" value="<?php echo $room; ?>" readonly>
                    <input class="input9" id="roomname" value="<?php echo $roomname; ?>" readonly>
                </div>
                <br>
                <label for="category">Remarks:</label>
                <textarea class="inputremarks1" id="remarks" name="remarks" readonly><?php echo $remarks; ?></textarea>
                <br>
                <label for=" price">Released By:</label>
                <input class="input" type="text" id="user" name="user" value="<?php echo $user; ?>" readonly>
                <br>
                <label for="unit">Date of Release:</label>
                <input class="input" type="text" id="date" name="date" value="<?php echo $Date; ?>" readonly>
                <br>

                <div class="submit-container">
                    <input class="submit" type="submit" value="Restock Item">
                </div>
        </form>
        <div class="backpos">
            <footer>
                <a style="text-decoration:none" href="out.php" class="back">Back</a>
            </footer>
        </div>
    </div>
</body>

</html>