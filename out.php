<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Out Items</title>

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
    <h1 class="font dashboard">OUT Items</h1>
    <hr class="dashhr">
    <h2 class="font edit">Released Items</h2>
    <div class="form-container">
        <div class="input-container">
            <?php include 'out_items.php'; ?>
            <h4 class="input2">Item Name - User Account - Date Released</h4>
        </div>
    </div>
</body>
<div class="backpos">
    <footer>
        <a style="text-decoration:none" href="inventory.php" class="back">Back</a>
    </footer>
</div>

</html>