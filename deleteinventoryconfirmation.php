<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Display a confirmation pop-up using JavaScript
    echo '<script>
        var confirmation = confirm("Are you sure you want to delete this item?");
        if (confirmation) {
            window.location.href = "deleteinventory.php?id=' . $id . '";
        } else {
            window.location.href = "inventory.php";
        }
    </script>';
}
