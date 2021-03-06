<?php

include '../local-db-connection.php';

// Taking code added to "Add Job" and inserts it into the openjob database
// If the submit button is set
if (isset($_POST['submit'])) 
{
    // Takes the input names from Add Job and assigns them to a variable
    $jobName = $_POST['JobName'];
    $jobDriver = (int)$_POST['selectedDriver'];

    $sql = "SELECT * FROM users WHERE usersID = $jobDriver";
    $result = mysqli_query($conn, $sql);
    $driverDetails = mysqli_fetch_assoc($result);
    //print_r($driverDetails);

    $driversID = (int)$driverDetails['usersID'];
    $driversName = $driverDetails['userName'];
    $driversUserName = $driverDetails['userUid'];

    //$jobDriverName = $_POST['JobDriverName'];
    $jobDate = $_POST['JobDate'];
    $destination = $_POST['Destination'];
    $jobType = $_POST['JobType'];
    $jobReference = $_POST['JobReference'];
    $jobWeight = $_POST['JobWeight'];
    $orderNumber = $_POST['OrderNumber'];
    $pallets = $_POST['Pallets'];
    $jobStatus = $_POST['JobStatus'];

    require '../includes/functions.php';

    if (emptyInput($driversID, $jobName, $jobDate, $destination, $jobType,
    $jobReference, $jobWeight, $orderNumber, $pallets, $jobStatus) !== false) {
        header("location: ../pages/webAddJob.php?error=emptyinput");
        exit();
    }

    if (invalidEntryAddJob($jobWeight, $pallets) !== false) {
        header("location: ../pages/webAddJob.php?error=invalidEntry");
        exit();
    }

    // SQL query to insert the above variables into the openjobs table.
    $sql = "INSERT INTO openjobs(jobName, driver_fk, driverName_fk, jobDate, destination, 
                        jobType, orderNumber, referenceNumber, pallets, jobWeight, jobStatus, 
                        driverUserName_fk) 
    VALUES ('$jobName', '$driversID', '$driversName', '$jobDate', '$destination', '$jobType', 
            '$orderNumber', '$jobReference', '$pallets', '$jobWeight', '$jobStatus', '$driversUserName');";

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