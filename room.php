<?php
include 'connect.php';

$building_id = $_GET['building_id'];

$sql = "SELECT
            b.name AS building_name,
            GROUP_CONCAT(r.name ORDER BY r.name ASC SEPARATOR ', ') AS room_names
        FROM
            building b
        LEFT JOIN
            room r ON b.id = r.id_building
        WHERE
            b.id = ?
        GROUP BY
            b.id, b.name";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $building_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $building_name = $row['building_name'];
        $room_names = $row['room_names'];
    }
}

// Fetch distinct floor values
$sql1 = "SELECT DISTINCT floor FROM room WHERE id_building=?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param('i', $building_id);
$stmt1->execute();

$result1 = $stmt1->get_result();

$distinct_floors = array();

while ($row1 = $result1->fetch_assoc()) {
    $distinct_floors[] = $row1['floor'];
}

$room_names = array(); // Initialize $room_names here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $floor = $_POST['floor'];
    // Use $floor in your SQL query
    $sql2 = "SELECT id, name FROM room WHERE id_building=? AND floor=?";

    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param('ii', $building_id, $floor);
    $stmt2->execute();

    $result2 = $stmt2->get_result();

    echo '<tr><th>Room Name</th></tr>';
    while ($row2 = $result2->fetch_assoc()) {
        $room_id = $row2['id'];
        $room_name = $row2['name'];

        echo '<tr>';
        echo '<td style="padding: 10px;"><a href="room.php?building_id=' . $building_id . '&floor=' . $floor . '&room=' . $room_id . '" style="text-decoration: none; color: #305430;">' . $room_name . '</a></td>';
        echo '</tr>';
    }
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/inventory.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/logo1.ico">
    <title>Room</title>
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

    <h1 class="font dashboard"><?php echo $building_name; ?></h1>
    <hr class="dashhr">

    <h3 class="font edit">Floors:</h3>
    <div class="edit">
        <a class="back" style="text-decoration:none; margin-right:20px;" data-floor="1">1</a>
        <a class="back" style="text-decoration:none; margin-right:20px;" data-floor="2">2</a>
        <a class="back" style="text-decoration:none; margin-right:20px;" data-floor="3">3</a>
    </div>
    <table class="table2" border="1">
        <tr>
            <th>Room Name</th>
        </tr>
    </table>
    <?php
    $room = isset($_GET['room']) ? $_GET['room'] : 0;

    $sql6 = "SELECT name FROM room WHERE id = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql6);
    $stmt->bind_param("i", $room);
    $stmt->execute();
    $result6 = $stmt->get_result();

    if ($result6->num_rows > 0) {
        while ($row6 = $result6->fetch_assoc()) {
            $roomname = $row6['name'];
        }
        echo '<h3 class="font edit">Room: ' . htmlspecialchars($roomname) . '</h3>';
    }

    $stmt->close();
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Condition
                <br>(New)
            </th>
            <th>Condition
                <br>(Good)
            </th>
            <th>Condition
                <br>(Bad)
            </th>
            <th>Total</th>
            <th></th>
        </tr>
        <?php
        // Get building_id from the URL or provide a default value if not set
        $building_id = isset($_GET['building_id']) ? $_GET['building_id'] : 0;
        $floor = isset($_GET['floor']) ? $_GET['floor'] : 0;
        $room = isset($_GET['room']) ? $_GET['room'] : 0;
        // Get search term from the form or URL
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // Determine the sorting order
        $order = isset($_GET['order']) ? $_GET['order'] : 'ID';

        // Set the number of records to display per page
        $recordsPerPage = 25;

        // Get the current page from the URL parameter, default to 1 if not set
        $page = isset($_GET['page1']) ? $_GET['page1'] : 1;

        // Calculate the offset based on the current page
        $offset = ($page - 1) * $recordsPerPage;

        // Split the search terms
        $searchTerms = explode(' ', $search);

        // Initialize an array to store individual conditions
        $searchConditions = array();

        // Loop through each search term and construct conditions
        foreach ($searchTerms as $term) {
            $term = mysqli_real_escape_string($conn, $term); // Prevent SQL injection
            $searchConditions[] = "(inventory.product_name LIKE '%$term%'
                           OR inventory.category LIKE '%$term%'
                           OR inventory.brand LIKE '%$term%'
                           OR inventory.color LIKE '%$term%'
                           OR inventory.size LIKE '%$term%'
                           OR inventory.shape LIKE '%$term%')";
        }

        // Implode the conditions using AND to create a single WHERE clause
        $whereClause = implode(" AND ", $searchConditions) . " AND inventory.building = $building_id AND inventory.room = $room AND inventory.floor = $floor";


        // Determine the sorting order
        $order = isset($_GET['order']) ? $_GET['order'] : 'ID';

        // Customize the SQL query based on search and sorting requirements
        if ($order == 'ID') {
            // Order by id initially
            // Your SQL query
            $sql = "SELECT inventory.*, building.name AS building, room.name AS room,
       FORMAT(total, 2) AS 'Formatted Total',
       FORMAT(price, 2) AS 'Formatted Price',
       DATE_FORMAT(date, '%M %e, %Y') AS 'Formatted Date'
FROM inventory
LEFT JOIN building ON inventory.building = building.id
LEFT JOIN room ON inventory.room = room.id
WHERE $whereClause
ORDER BY inventory.id
LIMIT $recordsPerPage OFFSET $offset";
        } elseif ($order == 'ASC') {
            // Order by product_name with toggling order
            $sql = "SELECT inventory.*, building.name AS building, room.name AS room,
       FORMAT(total, 2) AS 'Formatted Total',
       FORMAT(price, 2) AS 'Formatted Price',
       DATE_FORMAT(date, '%M %e, %Y') AS 'Formatted Date'
FROM inventory
LEFT JOIN building ON inventory.building = building.id
LEFT JOIN room ON inventory.room = room.id
WHERE $whereClause
ORDER BY inventory.product_name ASC
LIMIT $recordsPerPage OFFSET $offset";
        } else {
            // Order by product_name with toggling order
            $sql = "SELECT inventory.*, building.name AS building, room.name AS room,
      FORMAT(total, 2) AS 'Formatted Total',
       FORMAT(price, 2) AS 'Formatted Price',
       DATE_FORMAT(date, '%M %e, %Y') AS 'Formatted Date'
FROM inventory
LEFT JOIN building ON inventory.building = building.id
LEFT JOIN room ON inventory.room = room.id
WHERE $whereClause
ORDER BY inventory.product_name DESC
LIMIT $recordsPerPage OFFSET $offset";
        }

        // Count the total number of records with the same condition as in the main query
        $countQuery = "SELECT COUNT(*) AS total FROM inventory";

        // Execute the count query
        $countResult = $conn->query($countQuery);

        // Fetch the total count
        $totalRecords = $countResult->fetch_assoc()['total'];

        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $recordsPerPage);

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td style="padding: 10px;">' . $row['id'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['product_name'] . '</td>';
                echo '<td style="padding: 10px; white-space: nowrap;">' . $row['category'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['Formatted Price'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['quantity'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['condition_new'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['condition_good'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['condition_bad'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['Formatted Total'] . '</td>';
                echo '</tr>';
            }
        } else {
            // Handle case when no results are found
            echo '<tr><td colspan="11">No results found.</td></tr>';
        }

        // Add a simple form for the search bar
        echo '<div class="search-form">';
        echo '<form method="GET" action="" id="searchForm">';
        echo '<input type="text" name="search" id="search" placeholder="Search an Item\'s Name or Attributes" value="' . $search . '">';
        echo '<input type="hidden" name="building_id" value="' . $building_id . '">';
        echo '<input type="hidden" name="floor" value="' . $floor . '">';
        echo '<input type="hidden" name="room" value="' . $room . '">';
        echo '<a style="text-decoration:none" href="?building_id=' . $building_id . '&floor=' . $floor . '&room=' . $room . '&filter=true&order=' . ($order == 'ID' ? 'ASC' : ($order == 'ASC' ? 'DESC' : 'ID')) . '">
                <div class="statistics3" style="display:inline-block; margin-right:20px;">
                  <span class="font10">' . (($order === 'ID') ? 'A-Z' : ($order == 'ASC' ? 'Z-A' : 'ID')) . '</span>
                </div>
            </a>';
        echo '</form>';
        echo '</div>';
        ?>
    </table>
    <?php
    // Add Previous link if it's not the first page
    $prevPage = $page - 1;
    if ($prevPage > 0) {
        echo '<a style="text-decoration:none; margin-right:-30px; margin-left:50px" class="button2" href="?building_id=' . $building_id . '&floor=' . $floor . '&room=' . $room . '&page1=' . $prevPage . '&page=' . $page . '">Previous</a>';
    }

    // Add Next link if there are more records
    $nextPage = $page + 1;
    $hasMoreRecords = $nextPage <= $totalPages; // Assuming $totalPages is the total number of pages

    if ($hasMoreRecords) {
        echo '<a style="text-decoration:none; margin-left:50px" class="button2" href="?building_id=' . $building_id . '&floor=' . $floor . '&room=' . $room . '&page1=' . $nextPage . '&page=' . $page . '">Next</a>';
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.back').click(function() {
                var floorValue = $(this).data('floor');
                $.ajax({
                    type: 'POST',
                    data: {
                        floor: floorValue
                    },
                    success: function(response) {
                        // Handle the response from the PHP script
                        console.log(response);

                        // Assuming that the response is HTML for the table rows
                        $('.table2 tbody').html(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <div class="backpos">
        <footer>
            <a style="text-decoration:none" href="inventory.php" class="back">Back</a>
        </footer>
</body>

</html>