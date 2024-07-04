<?php
include 'connect.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Split the search terms
$searchTerms = explode(' ', $search);

// Initialize an array to store individual conditions
$searchConditions = array();

// Set the number of records to display per page
$recordsPerPage = 25;

// Get the current page from the URL parameter, default to 1 if not set
$page = isset($_GET['page1']) ? $_GET['page1'] : 1;

// Calculate the offset based on the current page
$offset = ($page - 1) * $recordsPerPage;

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
$whereClause = implode(" AND ", $searchConditions);
// You can customize the SQL query based on your search requirements
$sql = "SELECT *
        FROM inventory
        WHERE $whereClause
        LIMIT $recordsPerPage OFFSET $offset";

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
        $id = $row['id'];
        $productname = $row['product_name'];
        $category = $row['category'];
        $quantity = $row['quantity'];
        $conditionnew = $row['condition_new'];
        $conditiongood = $row['condition_good'];
        $conditionbad = $row['condition_bad'];
        $brand = $row['brand'];
        $color = $row['color'];
        $size = $row['size'];
        $shape = $row['shape'];
        $room = $row['room'];


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

        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td style="white-space: nowrap;">' . $productname . '</td>';
        echo '<td>' . $quantity . '</td>';
        echo '<td>' . $conditionnew . '</td>';
        echo '<td>' . $conditiongood . '</td>';
        echo '<td>' . $conditionbad . '</td>';
        echo '<td style="padding: 10px;">' . $brand . '</td>';
        echo '<td style=" white-space: nowrap;">' . $color . '</td>';
        echo '<td style=" white-space: nowrap;">' . $size . '</td>';
        echo '<td style="padding: 10px;">' . $shape . '</td>';
        echo '<td style=" white-space: nowrap;">' . $roomname . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="11">No results found.</td></tr>';
}
?>

<!-- Add a simple form for the search bar -->
<div class="search-form">
    <form method="GET" action="" id="searchForm">
        <input type="text" name="search" id="search" placeholder="Search an Item's Name" value="<?php echo $search; ?>" oninput="searchInventory()">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function searchInventory() {
        var searchValue = $('#search').val();
        $.ajax({
            type: 'GET',
            url: 'your_php_script.php', // Replace with the actual PHP script file
            data: {
                search: searchValue
            },
            success: function(response) {
                $('#resultTable').html(response);
            }
        });
    }
</script>
<br>