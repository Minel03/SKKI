<?php

include 'connect.php';

// Directory where SQL files are stored
$sqlDirectory = 'C:\xampp\htdocs\skki\sql';

// Get all files in the directory
$allFiles = scandir($sqlDirectory);

// Filter out files with ".sql" extension
$sqlFiles = array_filter($allFiles, function ($file) {
    return pathinfo($file, PATHINFO_EXTENSION) === 'sql';
});

// Sort the files by modification time (latest first)
usort($sqlFiles, function ($a, $b) use ($sqlDirectory) {
    $pathA = $sqlDirectory . DIRECTORY_SEPARATOR . $a;
    $pathB = $sqlDirectory . DIRECTORY_SEPARATOR . $b;
    return filemtime($pathB) - filemtime($pathA);
});

// Get the latest SQL file
$latestSqlFile = reset($sqlFiles);

// Check if a SQL file is found
if (!$latestSqlFile) {
    die("No SQL file found in the specified directory.");
}

// Connect to the database
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Drop all tables in the database
$dropTablesQuery = "SHOW TABLES";
$result = $mysqli->query($dropTablesQuery);

if ($result) {
    while ($row = $result->fetch_row()) {
        $dropTableQuery = "DROP TABLE IF EXISTS " . $row[0];
        $mysqli->query($dropTableQuery);
    }
} else {
    echo "Error dropping tables: " . $mysqli->error;
    $mysqli->close();
    exit;
}

// Read the SQL file
$sql = file_get_contents($sqlDirectory . DIRECTORY_SEPARATOR . $latestSqlFile);

// Execute the SQL commands
if ($mysqli->multi_query($sql)) {
    echo '<script>';
    echo 'alert("Database restored successfully using the latest SQL file.");';
    echo 'setTimeout(function(){ window.location.href = "settings.php"; }, 100);'; // 1000 milliseconds (1 second) delay
    echo '</script>';
} else {
    echo "Error restoring database: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
