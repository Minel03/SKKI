<?php
include 'connect.php';

// Get search term from the form or URL
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Determine the sorting order
$order = isset($_GET['order']) ? $_GET['order'] : 'ID';

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
$whereClause = implode(" AND ", $searchConditions);

// Determine the sorting order
$order = isset($_GET['order']) ? $_GET['order'] : 'ID';

// Set the number of records to display per page
$recordsPerPage = 25;

// Get the current page from the URL parameter, default to 1 if not set
$page = isset($_GET['page1']) ? $_GET['page1'] : 1;

// Calculate the offset based on the current page
$offset = ($page - 1) * $recordsPerPage;

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
        echo '<td>' . $row['id'] . '</td>';
        echo '<td style="white-space: nowrap;">' . $row['product_name'] . '</td>';
        echo '<td style="padding: 10px;">' . $row['category'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '<td style="padding: 5px;">' . $row['quantity'] . '</td>';
        echo '<td>' . $row['unit'] . '</td>';
        echo '<td style="padding: 10px;">' . $row['total'] . '</td>';
        echo '<td style="padding: 10px; white-space: nowrap;">' . $row['brand'] . '</td>';
        echo '<td style="padding: 10px;">' . $row['color'] . '</td>';
        echo '<td style="padding: 10px; white-space: nowrap;">' . $row['size'] . '</td>';
        echo '<td>' . $row['shape'] . '</td>';
        echo '<td style="white-space: nowrap;"><a style="text-decoration:none" class="button" href="viewinventory.php?id=' . $row['id'] . '">VIEW</a>
                    <a style="text-decoration:none" class="button" href="editinventory.php?id=' . $row['id'] . '">EDIT</a> 
                    <a style="text-decoration:none" class="button1" href="deleteinventoryconfirmation.php?id=' . $row['id'] . '">DELETE</a>
                    ';
        echo '</tr>';
    }
} else {
    // Handle case when no results are found
    echo '<tr><td colspan="11">No results found.</td></tr>';
}
// Add a simple form for the search bar
echo '<div class="search-form">';
echo '<form method="GET" action="" id="searchForm">';
echo '<input type="text" name="search" id="search" placeholder="Search an Item\'s Name or Category or Attributes" value="' . $search . '">';
echo '<a style="text-decoration:none" href="?filter=true&order=' . ($order == 'ID' ? 'ASC' : ($order == 'ASC' ? 'DESC' : 'ID')) . '">
        <div class="statistics3" style="display:inline-block; margin-right:20px;">
            <span class="font10">' . (($order === 'ID') ? 'A-Z' : ($order == 'ASC' ? 'Z-A' : 'ID')) . '</span>
        </div>
      </a>';
echo '</form>';
echo '</div>';
