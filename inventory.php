<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/inventory.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Inventory</title>

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
    } ?>
</head>

<body>
    <h1 class="font dashboard">Inventory</h1>
    <hr class="dashhr">

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Total</th>
            <th>Brand</th>
            <th>Color</th>
            <th>Size</th>
            <th>Shape</th>
            <th></th>
        </tr>
        <?php include 'display_items.php'; ?>
    </table>
    <?php
    // Add Previous link if it's not the first page
    $prevPage = $page - 1;
    if ($prevPage > 0) {
        echo '<a style="text-decoration:none; margin-right:-30px; margin-left:50px" class="button2" href="?page1=' . $prevPage . '&page=' . $page . '">Previous</a>';
    }

    // Add Next link if there are more records
    $nextPage = $page + 1;
    $hasMoreRecords = $nextPage <= $totalPages; // Assuming $totalPages is the total number of pages

    if ($hasMoreRecords) {
        echo '<a style="text-decoration:none; margin-left:50px" class="button2" href="?page1=' . $nextPage . '&page=' . $page . '">Next</a>';
    }
    ?>
    <h1 class="font dashboard">Buildings</h1>
    <table border="1" class="table2">
        <tr>
            <th>Name</th>
            <th>Floors</th>
            <th>Rooms</th>
        </tr>
        <?php include 'display_building.php'; ?>
    </table>
    <div class="backpos">
        <footer>
            <a style="text-decoration:none" href="dashboard.php" class="back">Back</a>
        </footer>
    </div>
</body>

</html>