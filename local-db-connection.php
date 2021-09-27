<?php


// $server = "127.0.0.1:52072";
// $username = "azure";
// $password = "6#vWHD_$";
// $db = "localdb";

// $mysqli = new mysqli($server, $user, $password, $db);

// if ($mysqli->connect_errno) {
//     echo "Failed to connect to MySQL: " . $mysqli->connect_error;
//     exit();
// }

// if ($result = $mysqli->query("SELECT FName FROM testTable")) {
//     echo "Returned rows are: " . $result->num_rows;
//     $result->free_result();
// }

// $mysqli->close();

$connectstr_dbhost = 'localhost';
$connectstr_dbname = 'localdb';
$connectstr_dbusername = 'azure';
$connectstr_dbpassword = '6#vWHD_$';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }

    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

$link = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword, $connectstr_dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);