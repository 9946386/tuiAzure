<?php

$port = '52072';
$server = "localhost:$port";
$username = "anyawebb";
$password = "tuiProjectPassword123";
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