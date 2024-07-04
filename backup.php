<?php
// Database configuration
include 'connect.php';

$conn->set_charset("utf8");

$tables = array();
$sql = "SHOW TABLES";
$results = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($results)) {
    $tables[] = $row[0];
}

$sqlScript = "";
foreach ($tables as $table) {

    $query = "SHOW CREATE TABLE $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $sqlScript .= "\n\n" . $row[1] . ";\n\n";

    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);

    $columnCount = mysqli_num_fields($result);

    for ($i = 0; $i < $columnCount; $i++) {
        while ($row = mysqli_fetch_row($result)) {
            $sqlScript .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $columnCount; $j++) {
                $row[$j] = $row[$j];

                if (isset($row[$j])) {
                    $sqlScript .= '"' . $row[$j] . '"';
                } else {
                    $sqlScript .= '""';
                }
                if ($j < ($columnCount - 1)) {
                    $sqlScript .= ',';
                }
            }
            $sqlScript .= ");\n";
        }
    }
    $sqlScript .= "\n";
}

if (!empty($sqlScript)) {
    // Specify the folder path
    $backup_folder = 'C:\xampp\htdocs\skki\sql';

    // Save the SQL script to a file in the specified folder
    $backup_file_name = $backup_folder . '/' . $dbname . '_backup_' . time() . '.sql';
    $fileHandler = fopen($backup_file_name, 'w+');
    $number_of_lines = fwrite($fileHandler, $sqlScript);
    fclose($fileHandler);

    // Display alert and redirect back to settings.php using JavaScript with a delay
    echo '<script>';
    echo 'alert("Backup successful.");';
    echo 'setTimeout(function(){ window.location.href = "settings.php"; }, 100);'; // 1000 milliseconds (1 second) delay
    echo '</script>';
    exit;  // Ensure that no further code is executed after the JavaScript
}
