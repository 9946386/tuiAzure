<?php

include '../local-db-connection.php';



// Taking code added to "Add Job" and inserts it into the openjob database
// If the submit button is set
if (isset($_POST['submit'])) 
{
    // Takes the input names from Add Job and assigns them to a variable
    $jobName = $_POST['JobName'];
    $jobDate = $_POST['JobDate'];
    $destination = $_POST['Destination'];
    $jobType = $_POST['JobType'];
    $jobReference = $_POST['JobReference'];
    $jobWeight = $_POST['JobWeight'];
    $orderNumber = $_POST['OrderNumber'];
    $pallets = $_POST['Pallets'];
    $jobStatus = $_POST['JobStatus'];

    // SQL query to insert the above variables into the openjobs table.
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