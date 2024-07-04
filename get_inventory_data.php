       <?php
        include 'connect.php';

        $building_id = $_POST['building_id'];
        $floor = $_POST['floor'];
        $room_id = $_POST['room_id'];
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $order = isset($_GET['order']) ? $_GET['order'] : 'ID';

        if ($order == 'ID') {
            $sql = "SELECT *, SUM(quantity) AS total_quantity, FORMAT(SUM(total), 2) AS 'Formatted Total', SUM(condition_new) AS 'Formatted New', SUM(condition_good) AS 'Formatted Good', SUM(condition_bad) AS 'Formatted Bad', FORMAT(price, 2) AS 'Formatted Price', DATE_FORMAT(date, '%M %e, %Y') AS 'Formatted Date'
        FROM inventory
        WHERE product_name LIKE '%$search%' OR category LIKE '%$search%' AND building = $building_id AND floor = $floor AND room = $room_id
        GROUP BY product_name, category, color, size, brand
        ORDER BY id";
        } elseif ($order == 'ASC') {
            $sql = "SELECT *, SUM(quantity) AS total_quantity, FORMAT(SUM(total), 2) AS 'Formatted Total', SUM(condition_new) AS 'Formatted New', SUM(condition_good) AS 'Formatted Good', SUM(condition_bad) AS 'Formatted Bad', FORMAT(price, 2) AS 'Formatted Price', DATE_FORMAT(date, '%M %e, %Y') AS 'Formatted Date'
        FROM inventory
        WHERE product_name LIKE '%$search%' OR category LIKE '%$search%' AND building = $building_id AND floor = $floor AND room = $room_id
        GROUP BY product_name, category, color, size, brand
        ORDER BY product_name ASC";
        } else {
            $sql = "SELECT *, SUM(quantity) AS total_quantity, FORMAT(SUM(total), 2) AS 'Formatted Total', SUM(condition_new) AS 'Formatted New', SUM(condition_good) AS 'Formatted Good', SUM(condition_bad) AS 'Formatted Bad', FORMAT(price, 2) AS 'Formatted Price', DATE_FORMAT(date, '%M %e, %Y') AS 'Formatted Date'
        FROM inventory
        WHERE product_name LIKE '%$search%' OR category LIKE '%$search%' AND building = $building_id AND floor = $floor AND room = $room_id
        GROUP BY product_name, category, color, size, brand
        ORDER BY product_name DESC";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td style="padding: 10px;">' . $row['id'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['product_name'] . '</td>';
                echo '<td style="padding: 10px; white-space: nowrap;">' . $row['category'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['Formatted Price'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['unit'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['total_quantity'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['Formatted New'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['Formatted Good'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['Formatted Bad'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['brand'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['color'] . '</td>';
                echo '<td style="padding: 10px; white-space: nowrap;">' . $row['size'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['life'] . '</td>';
                echo '<td style="padding: 10px; white-space: nowrap;">' . $row['Formatted Date'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['Formatted Total'] . '</td>';
                echo '<td style="padding: 10px;"><a style="text-decoration:none" class="button" href="editinventory.php?id=' . $row['id'] . '">EDIT</a> 
                    <a style="text-decoration:none" class="button1" href="deleteinventoryconfirmation.php?id=' . $row['id'] . '">DELETE</a></td>';
                echo '</tr>';
            }
        } else {
            // Handle case when no results are found
            echo '<tr><td colspan="11">No results found.</td></tr>';
        }

        // Add a simple form for the search bar
        echo '<div class="search-form">';
        echo '<form method="GET" action="" id="searchForm">';
        echo '<input type="text" name="search" id="search" placeholder="Search an Item\'s Name or Category" value="' . $search . '">';
        echo '<a style="text-decoration:none" href="?filter=true&order=' . ($order == 'ID' ? 'ASC' : ($order == 'ASC' ? 'DESC' : 'ID')) . '">
                <div class="statistics3" style="display:inline-block; margin-right:20px;">
                  <span class="font10">' . (($order === 'ID') ? 'A-Z' : ($order == 'ASC' ? 'Z-A' : 'ID')) . '</span>
                </div>
            </a>';
        echo '</form>';
        echo '</div>';
        echo '</tr>';
        ?>