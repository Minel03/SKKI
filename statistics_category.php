<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['category'])) {
    $category = $_GET['category'];

    $sql = "SELECT
    COUNT(DISTINCT id) AS 'Total Number of ID',
    SUM(quantity) AS 'Sum of Quantity',
    FORMAT(SUM(total), 2) AS 'Sum of Total'
FROM
    inventory WHERE category = '$category'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $totalitem = $row["Total Number of ID"];
            $sumquantity = $row["Sum of Quantity"];
            $sumtotal = $row["Sum of Total"];
        }
    }
}

// Set the number of records to display per page
$recordsPerPage = 25;

// Get the current page from the URL parameter, default to 1 if not set
$page = isset($_GET['page1']) ? $_GET['page1'] : 1;

// Calculate the offset based on the current page
$offset = ($page - 1) * $recordsPerPage;

$sql1 = "SELECT id, product_name, FORMAT(price, 2), quantity, total, date FROM inventory WHERE category = '$category' LIMIT $recordsPerPage OFFSET $offset";

$countQuery = "SELECT COUNT(*) AS total FROM inventory WHERE category = '$category'";

// Execute the count query
$countResult = $conn->query($countQuery);

// Fetch the total count
$totalRecords = $countResult->fetch_assoc()['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);

$result1 = mysqli_query($conn, $sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="stylesheet" href="css/statistics.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Statistics Category</title>

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
    <h2 class="font edit"><?php echo $category; ?> Category Summary</h2>
    <div class="statisticspos edit centered-container">
        <div class="statisticspos">
            <div class="statistics1" style="display:inline-block; margin-right:20px;">
                <h2 class="font2"><?php echo $totalitem; ?></h2>
                <h4 class="font3">Items</h4>
            </div>
            <div class="statistics1" style="display:inline-block; margin-right:20px;">
                <h2 class="font2"><?php echo $sumquantity; ?></h2>
                <h4 class="font3">Total Quantity</h4>
            </div>
            <div class="statistics1" style="display:inline-block; margin-right:20px;">
                <h2 class="font2"><?php echo $sumtotal; ?></h2>
                <h5 class="font5">PESOS</h5>
                <h4 class="font6">Total Value</h4>
            </div>
        </div>
    </div>
    <div class="edit">
        <button id="btn-print-this" class="button" style="margin-top: 40px; margin-bottom: -40px;">Print Statistics</button>
    </div>
    <table border=" 1">
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Date Received</th>
            <th></th>
        </tr>
        <?php

        if ($result1->num_rows > 0) {
            // output data of each row
            while ($row1 = $result1->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row1['id'] . '</td>';
                echo '<td>' . $row1['product_name'] . '</td>';
                echo '<td>' . $row1['FORMAT(price, 2)'] . '</td>';
                echo '<td>' . $row1['quantity'] . '</td>';
                echo '<td>' . $row1['date'] . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
    <?php
    // Add Previous link if it's not the first page
    $prevPage = $page - 1;
    if ($prevPage > 0) {
        echo '<a style="text-decoration:none; margin-right:-370px; margin-left:380px" class="button2" href="?category=' . $category . '&page1=' . $prevPage . '&page=' . $page . '">Previous</a>';
    }

    // Add Next link if there are more records
    $nextPage = $page + 1;
    $hasMoreRecords = $nextPage <= $totalPages; // Assuming $totalPages is the total number of pages

    if ($hasMoreRecords) {
        echo '<a style="text-decoration:none; margin-left:380px" class="button2" href="?category=' . $category . '&page1=' . $nextPage . '&page=' . $page . '">Next</a>';
    }
    ?>
    </div>
    <div class="backpos">
        <footer>
            <a style="text-decoration:none" href="statistics.php" class="back">Back</a>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/printThis.js"></script>

    <script>
        $(document).ready(function() {
            $("#btn-print-this").on("click", function() {
                // Use $.get to fetch the content synchronously
                $.get('print_statisticscategory.php', {
                    category: '<?php echo $category; ?>'
                }, function(data) {
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