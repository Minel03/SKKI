<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Display a confirmation pop-up using JavaScript
    echo '<script>
        var confirmation = confirm("Are you sure you want to delete this user?");
        if (confirmation) {
            window.location.href = "deleteuser.php?id=' . $id . '";
        } else {
            window.location.href = "settings.php";
        }
    </script>';
}
