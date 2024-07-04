<?php
include 'connect.php';

// Set the number of records to display per page
$recordsPerPage = 10;

// Get the current page from the URL parameter, default to 1 if not set
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset based on the current page
$offset = ($page - 1) * $recordsPerPage;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT id, product_name, user, DATE_FORMAT(date, '%m/%d/%Y') AS formatted_date
        FROM out_items
        WHERE product_name LIKE '%$search%' OR user LIKE '%$search%' OR date LIKE '%$search%'
        ORDER BY id DESC
        LIMIT $recordsPerPage OFFSET $offset";

// Count the total number of records without LIMIT and OFFSET
$countQuery = "SELECT COUNT(*) AS total FROM out_items";

// Execute the count query
$countResult = $conn->query($countQuery);

// Fetch the total count
$totalRecords = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);
$result = $conn->query($sql);

echo '<div class="search-form1">';
echo '<form method="GET" action="" id="searchForm">';
echo '<input type="text" name="search" id="search1" placeholder="Search an Item\'s Name or Name of the Releaser" value="' . $search . '">';
echo '</form>';
echo '</div>';
echo '<br>';
echo '<div class="input-container">';
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<a style="text-decoration:none; margin-left:-10px;" class="input2" href="out_item_release.php?id=' . $row['id'] . '">' . $row["product_name"] . ' - ' . $row["user"] . ' - ' . $row["formatted_date"] . '</a>';
    }

    // Add Previous link if it's not the first page
    $prevPage = $page - 1;
    if ($prevPage > 0) {
        echo '<a style="text-decoration:none; margin-right:20px;" class="button2" href="?page=' . $prevPage . '">Previous</a>';
    }

    // Add Next link if there are more records
    $nextPage = $page + 1;
    $hasMoreRecords = $nextPage <= $totalPages;

    if ($hasMoreRecords) {
        echo '<a style="text-decoration:none" class="button2" href="?page=' . $nextPage . '">Next</a>';
    }
}
echo '</div>';

// Close the database connection
$conn->close();
