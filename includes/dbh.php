<?php

// $dbServerName = "tuiprojectserver.database.windows.net";
// $dbUserName = "tuiprojectadmin";
// $dbPassword = "TuiProjectPassword123";
// $dbName = "tui-project-db";

// $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

// if (!$conn) {
//     echo '<script>console.log("Failed Bro!")</script>';
// } else {
//     echo '<script>console.log("Yes Bro!")</script>';
// }

ini_set('display_errors', 1);

try {
    $conn = new PDO("sqlsrv:server = tcp:tuiprojectserver.database.windows.net,1433; Database = tui-project-db", "tuiprojectadmin", "TuiProjectPassword123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
// $connectionInfo = array("UID" => "tuiprojectadmin", "pwd" => "{your_password_here}", "Database" => "tui-project-db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
// $serverName = "tcp:tuiprojectserver.database.windows.net,1433";
// $conn = sqlsrv_connect($serverName, $connectionInfo);
