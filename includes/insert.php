<?php

include '../local-db-connection.php';

if (isset($_POST['submit'])) 
{
    $jobName = $_POST['JobName'];
    $jobDate = $_POST['JobDate'];
    $destination = $_POST['Destination'];
    $jobType = $_POST['JobType'];
    $jobReference = $_POST['JobReference'];
    $jobWeight = $_POST['JobWeight'];
    $orderNumber = $_POST['OrderNumber'];
    $pallets = $_POST['Pallets'];
    $jobStatus = $_POST['JobStatus'];

    $sql = "INSERT INTO openjobs(jobName, jobDate, destination, jobType, orderNumber, referenceNumber, pallets, jobWeight, jobStatus) 
    VALUES ('$jobName', '$jobDate', '$destination', '$jobType', '$orderNumber', '$jobReference', '$pallets', '$jobWeight', '$jobStatus');";

    $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (!$run) {
        echo '<script>console.log("Couldnt create entry")';
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    else {
        echo '<script>console.log("Success Bro!")</script>';
    }
}

header("Location: ../index.php?jobadded=success");
?>