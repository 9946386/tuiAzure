<?php

include '../local-db-connection.php';

if (isset($_POST['submit'])) 
{
    $jobName = $_POST['jobName'];
    $jobDate = $_POST['jobDate'];
    $destination = $_POST['destination'];
    $jobType = $_POST['jobType'];
    $jobReference = $_POST['jobReference'];
    $jobWeight = $_POST['jobWeight'];
    $orderNumber = $_POST['orderNumber'];
    $pallets = $_POST['pallets'];
    $jobStatus = $_POST['jobStatus'];

    $insert = mysqli_query($conn, "INSERT INTO openjobs (ID, jobName, jobDate, destination, jobType, orderNumber, refereneceNumber, pallets, jobWeight, jobStatus, driverID) 
    VALUES (NULL, $jobName, $jobDate, $destination, $jobType, $orderNumber, $jobReference, $pallets, $jobWeight, $jobStatus, NULL);");

    // if ($conn->query($insert) === TRUE) {
    //     echo '<script>console.log("Success Bro!")</script>';

    // }
    // else {
    //     echo '<script>console.log("Couldnt create entry")';
    //     echo "Error: " . $sql . "" . mysqli_error($conn);
    // }

    if (!$insert) {
        echo '<script>console.log("Couldnt create entry")';
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    else {
        echo '<script>console.log("Success Bro!")</script>';
    }
}

header("Location: ../index.php");
?>