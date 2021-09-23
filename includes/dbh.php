<?php

// Database Variables 
$dbServerName = "tuiprojectserver.database.windows.net";
$dbUserName = "tuiprojectadmin";
$dbPassword = "TuiProjectPassword123";
$dbName = "tui-project-db";

$conn = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName) or die(mysqli_error($conn));

$jobResult = $conn->query("select * from OpenJobs") or die($conn->error);

if (isset($_POST['submit'])) {
    $JobName = $_POST['JobName'];
    $JobDate = $_POST['JobDate'];
    $Destination = $_POST['Destination'];
    $JobType = $_POST['JobType'];
    $OrderNumber = $_POST['OrderNumber'];
    $ReferenceNumber = $_POST['ReferenceNumber'];
    $Pallets = $_POST['Pallets'];
    $JobWeight = $_POST['JobWeight'];
    $JobStatus = $_POST['JobStatus'];

    $insert = mysqli_query($conn, "INSERT INTO `OpenJobs`(`JobName`, `JobDate`, `Destination`, `JobType`, `OrderNumber`, `ReferenceNumber`, `Pallets`, `JobWeight`, `JobStatus`) VALUES('$JobName', '$JobDate', '$Destination', '$JobType', '$OrderNumber', '$ReferenceNumber', '$Pallets', '$JobWeight', '$JobStatus')");

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Success</h1>
                <p><a href='index.html' class='btn btn-primary'>Back home</a></p>";
    } else {
        echo "<h1>Fail {$conn->error}</h1>";
    }
}
