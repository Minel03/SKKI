<?php
include 'connect.php';
$sql = "SELECT
    COUNT(DISTINCT id) AS 'Total Number of ID',
    SUM(quantity) AS 'Sum of Quantity',
    FORMAT(SUM(total), 2) AS 'Sum of Total'
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Statistics</title>

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
    <h1 class="font dashboard">Statistics</h1>
    <hr class="dashhr">
    <h2 class="font edit">Inventory Summary</h2>
    <div class="statisticspos edit centered-container">
        <div class="statisticspos" style="margin-left: 50px">
            <div class="statistics1" style="display:inline-block; margin-right:20px;">
                <h2 class="font2"><?php echo $totalitem; ?></h2>
                <h4 class="font3">Items</h4>
            </div>

            <div class="statistics1" style="display:inline-block; margin-right:20px;">
                <h2 class="font2"><?php echo $sumquantity; ?></h2>
                <h4 class="font3">Total Quantity</h4>
            </div>

            <div class="statistics1" style="display:inline-block; margin-right:20px; padding-right:30px;  padding-left:30px;">
                <h2 class="font2" style="margin-left:-10px;"><?php echo $sumtotal; ?></h2>
                <h5 class="font5">PESOS</h5>
                <h4 class="font6">Total Value</h4>
            </div>
        </div>
    </div>
    <div class="edit">
        <button id="btn-print-this" class="button" style="margin-top: 40px; margin-bottom: -40px">Print Statistics</button>
    </div>
    <h2 class="font edit">Category Summary</h2><br><br>
    <div class="statisticspos edit">
        <div class="statisticspos">
            <a style="text-decoration:none" href="statistics_category.php?category=Cleaning Materials">
                <div class="statistics2" style="display:inline-block; margin-right:20px;">
                    <span class="font4">Cleaning Materials</span>
                </div>
            </a>
            <a style="text-decoration:none" href="statistics_category.php?category=Bedding">
                <div class="statistics2" style="display:inline-block; margin-right:20px;">
                    <span class="font4">Bedding<br><br></span>
                </div>
            </a>
            <a style="text-decoration:none" href="statistics_category.php?category=Catering Materials">
                <div class="statistics2" style="display:inline-block; margin-right:20px;">
                    <span class="font4">Catering Materials</span>
                </div>
            </a>
            <a style="text-decoration:none" href="statistics_category.php?category=Kitchen Materials">
                <div class="statistics2" style="display:inline-block; margin-right:20px;">
                    <span class="font4">Kitchen Materials<br><br></span>
                </div>
            </a>
            <a style="text-decoration:none" href="statistics_category.php?category=Spare Parts of Water System">
                <div class="statistics2" style="display:inline-block; margin-right:20px;">
                    <span class="font4">Spare Parts of Water System</span>
                </div>
            </a>
            <a style="text-decoration:none" href="statistics_category.php?category=Others">
                <div class="statistics2" style="display:inline-block; margin-right:20px; margin-top:20px; margin-bottom:20px;">
                    <span class="font4">Others<br><br></span>
                </div>
            </a>
        </div>
    </div>
    <div class="backpos">
        <footer>
            <a style="text-decoration:none" href="inventory.php" class="back">Back</a>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/printThis.js"></script>

    <script>
        $(document).ready(function() {
            $("#btn-print-this").on("click", function() {
                // Use $.get to fetch the content synchronously
                $.get('print_statistics.php', function(data) {
                    // Create a new div to hold the content of print_statistics.php
                    var printContent = $('<div>').html(data);

                    // Use printThis library to print the loaded content
                    printContent.printThis({
                        complete: function() {
                            // Remove the temporary container after printing
                            printContent.remove();
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>