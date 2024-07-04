<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/inventory.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Add Items</title>

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
    <h1 class="font dashboard">IN Items</h1>
    <hr class="dashhr">
    <h2 class="font edit">Add Item</h2>
    <div class="form-container">
        <form method="post" action="add_item.php">
            <div class="input-container">
                <label for="productname">Item Name:</label>
                <input class="input" type="text" id="productname" name="productname" required">
                <br>
                <label for="category">Category:</label>
                <select class="input4" id="category" name="category" required>
                    <option value="">Select</option>
                    <option value="Cleaning Materials">Cleaning Materials</option>
                    <option value="Bedding">Bedding</option>
                    <option value="Catering Materials">Catering Materials</option>
                    <option value="Kitchen Materials">Kitchen Materials</option>
                    <option value="Spare Parts of Water System">Spare Parts of Water System</option>
                    <option value="Others">Others</option>
                </select>
                <br>
                <label for="price">Price:</label>
                <input class="input" type="text" id="price" name="price" required">
                <br>
                <label for="unit">Unit:</label>
                <input class="input" type="text" id="unit" name="unit" required">
                <br>
                <label for="quantity">Quantity:</label>
                <input class="input" type="text" id="quantity" name="quantity" required">
                <br>
                <div class="input">
                    <h4 class="condition-title">Condition</h4>
                    <div class="center">
                        <span>New: <input class="condition-container" type="text" id="conditionnew" name="conditionnew" value="0" required"></span>
                        <span>Good: <input class="condition-container" type="text" id="conditiongood" name="conditiongood" value="0" required"></span>
                        <span>Bad: </span><input class="condition-container" type="text" id="conditionbad" name="conditionbad" value="0" required"></span>
                    </div>
                    <br>
                    <h4 class="condition-title1">Brand:</h4>
                    <input class="input5" type="text" id="brand" name="brand" required">
                    <h4 class="condition-title1">Color:</h4>
                    <input class="input5" type="text" id="color" name="color" required">
                    <h4 class="condition-title1">Size:</h4>
                    <input class="input5" type="text" id="size" name="size" required">
                    <h4 class="condition-title1">Shape:</h4>
                    <input class="input5" type="text" id="shape" name="shape" required">
                    <h4 class="condition-title1">Estimated Life Expentancy:</h4>
                    <input class="input7" type="text" id="life" name="life" required">
                    <h4 class="condition-title1">Acquisition Date:</h4>
                    <input class="input7" type="date" id="date" name="date" required">
                    <h4 class="condition-title1">Building:</h4>
                    <select class="input6" id="building" name="building" onchange="updateFloorOptions();">
                        <option value="">-</option>
                        <option value="1">Office Building</option>
                        <option value="2">CRC Main Building</option>
                    </select>
                    <h4 class="condition-title1">Floor:</h4>
                    <select class="input6" id="floor" name="floor" onchange="updateRoomOptions();">
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <h4 class="condition-title1">Room:</h4>
                    <select class="input6" id="room" name="room">
                        <option value="">-</option>
                    </select>
                    <label for="remarks">Additional Information:</label>
                    <textarea class="inputremarks" id="remarks" name="remarks"></textarea>
                </div>
                <div class="submit-container">
                    <input class="submit" type="submit" value="Add Item">
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
            <option value="1">Display Area</option>
            <option value="2">Program / Finance Room</option>
            <option value="3">Management / Library Room</option>
            <option value="4">Business Room</option>
            <option value="5">Stock Room</option>
            <option value="6">Day Care Center</option>
            <option value="7">Water Refilling Station</option>
        `;
            } else if (buildingValue === "1" && floorValue === "2") {
                // Add room options for Office Building, Floor 2
                roomSelect.innerHTML = `
            <option value="8">World Vision Room/Counseling Room</option>
            <option value="9">Mt. Zion</option>
            <option value="10">Stock Room</option>
            <option value="11">Finance Room</option>
            <option value="12">Rest Room 1</option>
            <option value="13">Rest Room 2</option>
        `;
                // Customize as needed
            } else if (buildingValue === "1" && floorValue === "3") {
                // Add room options for Office Building, Floor 3
                roomSelect.innerHTML = `
            <option value="14">Conference Room</option>
            <option value="15">Rest Room</option>
        `;
                // Customize as needed
            } else if (buildingValue === "2" && floorValue === "1") {
                // Add room options for CRC Main Building, Floor 1
                roomSelect.innerHTML = `
            <option value="16">Isaiah</option>
            <option value="17">Linen</option>
            <option value="18">King Solomon</option>
            <option value="19">Kitchen</option>
            <option value="20">Dining Room</option>
            <option value="21">Rest Room 1</option>
            <option value="22">Rest Room 2</option>
        `;
                // Customize as needed
            } else if (buildingValue === "2" && floorValue === "2") {
                // Add room options for CRC Main Building, Floor 2
                roomSelect.innerHTML = `
            <option value="23">Mt. Olive</option>
            <option value="24">Mt. Carmel</option>
            <option value="25">Judea</option>
            <option value="26">Galilee</option>
            <option value="27">Gethsemane</option>
            <option value="28">Jericho</option>
            <option value="29">Rest Room 1</option>
            <option value="30">Rest Room 2</option>
        `;
                // Customize as needed
            } else if (buildingValue === "2" && floorValue === "3") {
                // Add room options for CRC Main Building, Floor 3
                roomSelect.innerHTML = `
            <option value="31">Esther</option>
            <option value="32">Ruth</option>
            <option value="33">Ezekiel</option>
            <option value="34">Jonnah</option>
            <option value="35">Micah</option>
            <option value="36">Samuel</option>
            <option value="37">Rest Room 1</option>
            <option value="38">Rest Room 2</option>
        `;
                // Customize as needed
            }
        }
    </script>

</body>

</html>