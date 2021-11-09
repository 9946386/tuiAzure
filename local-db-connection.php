<?php

// Loading app connection info to variables to be used in connection string
// This information linked to the app can be found in Azure Kudo - CMD - data - mysql - MYSQLCONNSTR_localdb.txt
$connectstr_dbhost = 'localhost';
$connectstr_dbname = 'localdb';
$connectstr_dbusername = 'azure';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }

    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

// Adding variable to connection string
$conn = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword, $connectstr_dbname);

// If the connection didn't work:
if (!$conn) {
    // Show message on screen
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
// If the connection did work:
else {
    // Show message in the console
    echo "<script>console.log('Success: A proper connection to MySQL was made! The my_db database is great.')</script>";
//echo '<script>console.log("Host information: " . mysqli_get_host_info($link) . PHP_EOL;")</script>';
}
