<?php

ini_set('display_errors', 1);
include 'dbh.php';

// Check if form has been filled out by checking POST value
if (isset($_POST['submit'])) {

    // Save all $_POST values from form into seperate variables
    $JobName = $_POST['JobName'];
    $JobDate = $_POST['JobDate'];
    $Destination = $_POST['Destination'];
    $JobType = $_POST['JobType'];
    $OrderNumber = $_POST['OrderNumber'];
    $ReferenceNumber = $_POST['ReferenceNumber'];
    $Pallets = $_POST['Pallets'];
    $JobWeight = $_POST['JobWeight'];
    $JobStatus = $_POST['JobStatus'];

    $mysqli->query("INSERT INTO OpenJobs (JobName, JobDate, Destination, JobType, OrderNumber, ReferenceNumber, Pallets, JobWeight, JobStatus)
    VALUES ('$JobName', '$JobDate', '$Destination', '$JobType', '$OrderNumber', '$ReferenceNumber', '$Pallets', '$JobWeight', '$JobStatus')") or die($mysqli->error);

    // Create insert command
    // $sql = "insert into OpenJobs(JobName, JobDate, Destination, JobType, OrderNumber, ReferenceNumber, Pallets, JobWeight, JobStatus)
    // values ('$JobName', '$JobDate', '$Destination', '$JobType', '$OrderNumber', '$ReferenceNumber', '$Pallets', '$JobWeight', '$JobStatus')";

    if ($connection->query($mysql) === TRUE) {
        //include 'template/insert_header.php';
        echo '<script>console.log("Connected to data!")</script>';
        //include 'template/footer.php';
    } else {
        //include 'template/insert_header.php';
        echo '<script>console.log("Failed Bro!")</script>';
        //include 'template/footer.php';
    }
}
