<?php

$host = 'tui-project-server.mysql.database.azure.com';
$username = 'impishorange4@tui-project-server';
$password = 'tuiProjectPassword123';
$db_name = 'tui-project-server';

//Initializes MySQLi
$conn = mysqli_init();

mysqli_ssl_set($conn, NULL, NULL, "DigiCertGlobalRootG2.crt.pem", NULL, NULL);

// Establish the connection
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

//If connection failed, show the error
if (mysqli_connect_errno()) 
{
    echo '<script>console.log("Failed!")</script>';
// die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
