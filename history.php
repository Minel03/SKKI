<?php
include 'connect.php';

$sql = "SELECT user, activity, product_name, type, DATE_FORMAT(datetime, '%l:%i %p, %m/%d/%Y') AS formatted_date 
        FROM history 
        ORDER BY datetime DESC
        LIMIT 3";

$result = mysqli_query($conn, $sql);

// Set the number of records to display per page
$recordsPerPage = 10;

// Get the current page from the URL parameter, default to 1 if not set
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$skipRecords = 3;

// Calculate the offset based on the current page
$offset = (($page - 1) * $recordsPerPage) + $skipRecords;

// SQL query with LIMIT and OFFSET
$sql1 = "SELECT user, activity, product_name, type, DATE_FORMAT(datetime, '%l:%i %p, %m/%d/%Y') AS formatted_date 
        FROM history 
        ORDER BY datetime DESC
        LIMIT $recordsPerPage OFFSET $offset";
// Count the total number of records without LIMIT and OFFSET
$countQuery = "SELECT COUNT(*) AS total FROM history";

// Execute the count query
$countResult = $conn->query($countQuery);

// Fetch the total count
$totalRecords = $countResult->fetch_assoc()['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);
$result1 = mysqli_query($conn, $sql1);

// Set the number of records to display per page
$recordsPerPage1 = 10;

// Get the current page from the URL parameter, default to 1 if not set
$page1 = isset($_GET['page1']) ? $_GET['page1'] : 1;

// Calculate the offset based on the current page
$offset1 = ($page1 - 1) * $recordsPerPage1;

// SQL query with LIMIT and OFFSET
$sql2 = "SELECT user, activity, product_name, type, DATE_FORMAT(datetime, '%l:%i %p, %m/%d/%Y') AS formatted_date 
        FROM history 
        WHERE activity = 'restocked'
        ORDER BY datetime DESC
        LIMIT $recordsPerPage1 OFFSET $offset1";

// Count the total number of records with the same condition as in the main query
$countQuery1 = "SELECT COUNT(*) AS total FROM history WHERE activity = 'restocked'";

// Execute the count query
$countResult1 = $conn->query($countQuery1);

// Fetch the total count
$totalRecords1 = $countResult1->fetch_assoc()['total'];

// Calculate the total number of pages
$totalPages1 = ceil($totalRecords1 / $recordsPerPage1);

$result2 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>History</title>

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
    <h1 class="font dashboard">History</h1>
    <hr class="dashhr">
    <h2 class="font edit">Restocked Activity</h2>
    <div class="font edit">
        <label for="monthYearDropdown">Select Month and Year:</label>
        <select class="input8" id="monthYearDropdown"></select>
        <br>
        <button class="button" id="printButton">Print Record</button>
    </div>
    <br>
    <div class="form-container">
        <div class="input-container">
            <?php
            if ($result2->num_rows > 0) {
                // output data of each row
                while ($row2 = $result2->fetch_assoc()) {
                    echo '<a style="text-decoration:none" href="display_restock.php?product=' . $row2["product_name"] . '"><h4 class="input3">' . $row2["user"] . ' ' . $row2["activity"] . ' ' . $row2["type"] . ' ' . $row2["product_name"] . '<span style="float: right;">' . $row2["formatted_date"] . '</span></h4></a>';
                }

                // Add Previous link if it's not the first page
                $prevPage1 = $page1 - 1;
                if ($prevPage1 > 0) {
                    echo '<a style="text-decoration:none; margin-right:20px;" class="button2" href="?page1=' . $prevPage1 . '&page=' . $page . '">Previous</a>';
                }

                // Add Next link if there are more records
                $nextPage1 = $page1 + 1;
                $hasMoreRecords1 = $nextPage1 <= $totalPages1; // Assuming $totalPages is the total number of pages

                if ($hasMoreRecords1) {
                    echo '<a style="text-decoration:none" class="button2" href="?page1=' . $nextPage1 . '&page=' . $page . '">Next</a>';
                }
            }
            ?>
        </div>
    </div>
    <h2 class="font edit">Recent Activity</h2>
    <div class="form-container">
        <div class="input-container">
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<h4 class="input3">' . $row["user"] . ' ' . $row["activity"] . ' ' . $row["type"] . ' ' . $row["product_name"] . '<span style="float: right;">' . $row["formatted_date"] . '</span></h4>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    <h2 class="font edit">Past Activity</h2>
    <div class="form-container">
        <div class="input-container">
            <?php
            if ($result1->num_rows > 0) {
                // Output data of each row
                while ($row1 = $result1->fetch_assoc()) {
                    echo '<h4 class="input3">' . $row1["user"] . ' ' . $row1["activity"] . ' ' . $row1["type"] . ' '  . $row1["product_name"] . '<span style="float: right;">' . $row1["formatted_date"] . '</span></h4>';
                }

                // Add Previous link if it's not the first page
                $prevPage = $page - 1;
                if ($prevPage > 0) {
                    echo '<a style="text-decoration:none; margin-right:20px;" class="button2" href="?page=' . $prevPage . '&page1=' . $page1 . '">Previous</a>';
                }

                // Add Next link if there are more records
                $nextPage = $page + 1;
                $hasMoreRecords = $nextPage <= $totalPages; // Assuming $totalPages is the total number of pages

                if ($hasMoreRecords) {
                    echo '<a style="text-decoration:none" class="button2" href="?page=' . $nextPage . '&page1=' . $page1 . '">Next</a>';
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/printThis.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdown = document.getElementById("monthYearDropdown");
            const printButton = document.getElementById("printButton");

            // Set current date
            const currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth() + 1; // Months are zero-indexed

            // Populate dropdown with months and years
            for (let year = currentYear; year <= currentYear + 1; year++) {
                for (let month = 1; month <= 12; month++) {
                    const option = document.createElement("option");
                    option.value = `${year}-${month.toString().padStart(2, '0')}`;
                    option.text = `${year} - ${new Date(year, month - 1, 1).toLocaleString('default', { month: 'long' })}`;
                    dropdown.add(option);
                }
            }

            // Set initial selected value
            dropdown.value = `${currentYear}-${currentMonth < 10 ? '0' : ''}${currentMonth}`;

            // Listen for changes in the dropdown
            dropdown.addEventListener("change", function() {
                const selectedValue = this.value;
                console.log(selectedValue);
            });

            // Listen for click event on the "Print Record" button
            printButton.addEventListener("click", function() {
                const selectedValue = dropdown.value;
                console.log(selectedValue);

                // Use $.get to fetch the content synchronously
                $.get('print_restocked.php', {
                    monthYear: selectedValue
                }, function(data) {
                    // Create a new div to hold the content of print_restocked.php
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
    <div class="backpos">
        <footer>
            <a style="text-decoration:none" href="inventory.php" class="back">Back</a>
        </footer>
    </div>
</body>

</html>