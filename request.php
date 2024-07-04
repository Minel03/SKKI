<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/request.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Request Items</title>

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
    <h1 class="font dashboard">Request Items</h1>
    <hr class="dashhr">
    <div class="table">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Condition New</th>
                <th>Condition Good</th>
                <th>Condition Bad</th>
                <th>Brand</th>
                <th>Color</th>
                <th>Size</th>
                <th>Shape</th>
                <th>Room</th>
                <th></th>
            </tr>
            <?php include 'request_items.php'; ?>
        </table>
        <?php
        // Add Previous link if it's not the first page
        $prevPage = $page - 1;
        if ($prevPage > 0) {
            echo '<a style="text-decoration:none; margin-right:-280px; margin-left:290px" class="button2" href="?page1=' . $prevPage . '&page=' . $page . '">Previous</a>';
        }

        // Add Next link if there are more records
        $nextPage = $page + 1;
        $hasMoreRecords = $nextPage <= $totalPages; // Assuming $totalPages is the total number of pages

        if ($hasMoreRecords) {
            echo '<a style="text-decoration:none; margin-left:290px" class="button2" href="?page1=' . $nextPage . '&page=' . $page . '">Next</a>';
        }
        ?>
    </div>
    <div class="form">
        <h2 class="font">To be released Item</h2>
        <form class="input-container" method="post">
            <label for="id">Select ID:</label>
            <select class="input" name="id" id="id">
                <?php
                $query = "SELECT id FROM inventory";
                $result = mysqli_query($conn, $query);

                // Fetch each row from the result set and populate the dropdown menu
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option  value="' . $row['id'] . '">' . $row['id'] . '</option>';
                }
                ?>
            </select>
            <div class=" submit-container">
                <input class="submit" type="submit" value="Submit">
            </div>
        </form>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if the student number is selected and submitted
        if (isset($_POST['id'])) {
            // Retrieve the selected student number
            $selectedid = $_POST['id'];

            // Query the students table to get the enrollment form details for the selected student
            $sql1 = "SELECT * FROM inventory WHERE id = '$selectedid'";

            $result1 = mysqli_query($conn, $sql1);

            if ($result1->num_rows > 0) {
                $row1 = $result1->fetch_assoc();
                $id = $row1["id"];
                $productname = $row1["product_name"];
                $category = $row1["category"];
                $price = $row1["price"];
                $unit = $row1["unit"];
                $quantity = $row1["quantity"];
                $conditionnew = $row1["condition_new"];
                $conditiongood = $row1["condition_good"];
                $conditionbad = $row1["condition_bad"];
                $brand = $row1["brand"];
                $color = $row1["color"];
                $size = $row1["size"];
                $shape = $row1["shape"];
                $life = $row1['life'];
                $date = $row1['date'];
                $building = $row1['building'];
                $floor = $row1['floor'];
                $room = $row1['room'];
                $remarks = $row1['remarks'];
            } else {
                echo "Item not found.";
                $conn->close();
                exit;
            }

            if (
                $building == 0
            ) {
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

            // Assuming you have an enrollment form table with the respective columns
            echo '<form method="post" action="release_item.php">';
            echo '<div class="input-container">';
            echo '<input type="hidden" name="id" value="' . $row1['id'] . '">';
            echo '<label for="productname">Item Name:</label>';
            echo
            '<input class="input" type="text" id="productname" name="productname" value="' . $productname . '" readonly>';
            echo
            '<input class="input" type="hidden" id="category" name="category" value="' . $category . '" readonly>';
            echo
            '<br>';
            echo
            '<label for="quantity">Quantity to be released:</label>';
            echo
            '<input class="input" type="text" id="quantity" name="quantity" required>';
            echo
            '<br>';
            echo
            '<div class="input">';
            echo
            '<h5 class="condition-title">Condition</h5>';
            echo
            '<div class="center">';
            echo
            '<span>New: <input class="condition-container" type="text" id="conditionnew" name="conditionnew" value="0" required></span>';
            echo
            '<span>Good: <input class="condition-container" type="text" id="conditiongood" name="conditiongood" value="0" required></span>';
            echo
            '<span>Bad: <input class="condition-container" type="text" id="conditionbad" name="conditionbad" value="0" required></span>';
            echo
            '</div>';
            echo
            '<br>';
            echo
            '<h4 class="condition-title1">Building:</h4>';
            echo '<input class="input1" type="hidden" name="building" id="building" value="' . $building . '" readonly>';
            echo '<input class="input1" id="buildingname" value="' . $buildingname . '" readonly>';
            echo
            '<h4 class="condition-title1">Floor:</h4>';
            echo '<input class="input1" id="floor" name="floor" value="' . $floor . '" readonly>';
            echo '<h4 class="condition-title1">Room:</h4>';
            echo '<input class="input1" type="hidden" name="room" id="room" value="' . $room . '" readonly>';
            echo '<input class="input1" id="roomname" value="' . $roomname . '" readonly>';
            echo '</div>';
            echo '<label for="remarks">Remarks:</label>';
            echo
            '<textarea class="inputremarks" id="remarks" name="remarks"></textarea>';
            echo
            '<div class=" submit-container">';
            echo
            '<input class="submit" type="submit" value="Release Item">';
            echo
            '</div>';
            echo
            '</div>';
            echo
            '</form>';
            echo
            '</div>';
        }
    }
    ?>
    <div class="backpos">
        <footer>
            <a style="text-decoration:none" href="request.php" class="back">Back</a>
        </footer>
    </div>

</body>

</html>