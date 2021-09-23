<?php

$JobDate = $_POST['JobDate'];
$Destination = $_POST['Destination'];
$JobType = $_POST['JobType'];
$OrderNumber = $_POST['OrderNumber'];
$ReferenceNumber = $_POST['ReferenceNumber'];
$Pallets = $_POST['Pallets'];
$JobWeight = $_POST['JobWeight'];
$JobStatus = $_POST['JobStatus'];

$dbServerName = "tuiprojectserver.database.windows.net";
$dbUserName = "tuiprojectadmin";
$dbPassword = "TuiProjectPassword123";
$dbName = "tui-project-db";

$conn = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into Jobs(JobDate, Destination, JobType, OrderNumber, ReferenceNumber, Pallets, JobWeight, JobStatus)
    values(?, ?, ?, ?, ?, ?, ?, ?");
    $stmt->bind_param("sssssids", $JobDate, $Destination, $JobType, $OrderNumber, $ReferenceNumber, $Pallets, $JobWeight, $JobStatus);
    $stmt->execute();
    echo "Success!";
    $stmt->close();
    $conn->close();
}

//Database connection
