<?php

$dbServerName = "tuiprojectserver.database.windows.net";
$dbUserName = "tuiprojectadmin";
$dbPassword = "TuiProjectPassword123";
$dbName = "tui-project-db";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
    echo '<script>console.log("Failed Bro!")</script>';
} else {
    echo '<script>console.log("Success Bro!")</script>';
}

mysqli_close($conn);
