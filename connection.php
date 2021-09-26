<?php

$host = 'tui-project-server.mysql.database.azure.com';
$username = 'impishorange4';
$password = 'tuiProjectPassword123';
$db_name = 'tui-project-server';

//Initializes MySQLi
// $conn = mysqli_init();

// mysqli_ssl_set($conn, NULL, NULL, "DigiCertGlobalRootG2.crt.pem", NULL, NULL);

// Establish the connection
// mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL);

//If connection failed, show the error
// if (mysqli_connect_errno()) 
// {
//     echo '<script>console.log("Failed!")</script>';
//     die('Failed to connect to MySQL: ' . mysqli_connect_error());
// }


$conn = mysqli_connect('tui-project-server.mysql.database.azure.com', 'impishorange4', 'tuiProjectPassword123', 'tui-project-server', 3306);

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}