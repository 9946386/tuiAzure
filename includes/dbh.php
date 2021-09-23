<?php

// Database Variables 
$dbServerName = "tuiprojectserver.database.windows.net";
$dbUserName = "tuiprojectadmin";
$dbPassword = "TuiProjectPassword123";
$dbName = "tui-project-db";

$conn = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName) or die(mysqli_error($conn));

$jobResult = $conn->query("select * from Jobs") or die($conn->error);

if(isset($_POST['JobName']))
{
    $JobName = $_POST['JobName'];
    $JobDate = $_POST['JobDate'];
    $Destination = $_POST['Destination'];
    $JobType = $_POST['JobType'];
    $OrderNumber = $_POST['OrderNumber'];
    $ReferenceNumber = $_POST['ReferenceNumber'];
    $Pallets = $_POST['Pallets'];
    $JobWeight = $_POST['JobWeight'];
    $JobStatus = $_POST['JobStatus'];

    $sql = "insert into Jobs(JobName, JobDate, Destination, JobType, OrderNumber, ReferenceNumber, Pallets, JobWeight, JobStatus) values('$JobName', '$JobDate', '$Destination', '$JobType', '$OrderNumber', '$ReferenceNumber', '$Pallets', '$JobWeight', '$JobStatus')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "<h1>Success</h1>"
    // }
    // else
    // {
    //     echo "<h1>Fail {$conn->error}</h1>"
    // }
}
