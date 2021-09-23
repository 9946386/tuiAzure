<?php

$dbServerName = "tuiprojectserver.database.windows.net";
$dbUserName = "tuiprojectadmin";
$dbPassword = "TuiProjectPassword123";
$dbName = "tui-project-db";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
