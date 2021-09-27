<?php


$server = "localhost:52072";
$username = "azure";
$password = "6#vWHD_$";
$db = "localdb";

$mysqli = new mysqli($server, $user, $password, $db);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if ($result = $mysqli->query("SELECT FName FROM testTable")) {
    echo "Returned rows are: " . $result->num_rows;
    $result->free_result();
}

$mysqli->close();