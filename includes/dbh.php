<?php

$dbServerName = "tuiprojectserver.database.windows.net";
$dbUserName = "tuiprojectadmin";
$dbPassword = "TuiProjectPassword123";
$dbName = "tui-project-db";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
    echo '<script>console.log("Failed Bro!")</script>';
} else {
    echo '<script>console.log("Success Bro!")</script>';
}

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

    if ($connection->query($sql) === TRUE) {
        //include 'template/insert_header.php';
        echo "<h1>Record created successfully</h1>
              <p><a href='index.php' class='btn btn-primary'>Back to SCP App</a></p>";
        //include 'template/footer.php';
    } else {
        //include 'template/insert_header.php';
        echo "<h1>Error creating record: {$connection->error}</h1>
           <p><a href='insert.php' class='btn btn-warning'>Back to form</a></p>";
        //include 'template/footer.php';
    }
}

// header("Location: ../index.php?");

if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
