<?php

include '../../local-db-connection.php';

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

    $sql = "INSERT INTO `openjobs` (`ID`, `jobName`, `jobDate`, `destination`, `jobType`, `orderNumber`, `refereneceNumber`, `pallets`, `jobWeight`, `jobStatus`) 
    VALUES (NULL, $jobName, $jobDate, $destination, $jobType, $jobReference, $jobWeight, $orderNumber, $pallets, $jobStatus);";

    if ($conn->query($sql) === TRUE) {
        echo '<script>console.log("Success Bro!")</script>';
        header("Location: index.php");
    }
    else {
        echo '<script>console.log("Couldnt create entry")';
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>