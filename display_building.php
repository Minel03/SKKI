<?php
include 'connect.php';

$selectbuilding = "SELECT
    b.name AS building_name, b.id AS building_id,
    COUNT(DISTINCT r.floor) AS number_of_floors,
    COUNT(r.id) AS number_of_rooms
FROM
    building b
LEFT JOIN
    room r ON b.id = r.id_building
GROUP BY
    b.id, b.name;
";
$result = $conn->query($selectbuilding);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td><a style="text-decoration:none; color: #305430;" href="room.php?building_id=' . $row['building_id'] . '">' . $row['building_name'] . '</a></td>';
        echo '<td>' . $row['number_of_floors'] . '</td>';
        echo '<td>' . $row['number_of_rooms'] . '</td>';
        echo '</tr>';
    }
}
