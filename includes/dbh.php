<?php

$dbServerName = "tuiprojectserver.database.windows.net";
$dbUserName = "tuiprojectadmin";
$dbPassword = "TuiProjectPassword123";
$dbName = "tui-project-db";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    echo "Ya connected bro!!";
}

$sql = "INSERT INTO OpenJobs (JobName, JobType, OrderNumber, ReferenceNumber, Pallets, JobWeight, JobStatus, JobDate, Destination)
VALUES ('Pallets ex Booths', 'Pick Up', '12', '154674', '540', '13500', 'Planned', 'Thursday, 23 Sep', 'Kapiti')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Didn't Work";
}
