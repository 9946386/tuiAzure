<?php

include "dbh.php";

$sql = "INSERT INTO OpenJobs (JobName, JobType, OrderNumber, ReferenceNumber, Pallets, JobWeight, JobStatus, JobDate, Destination)
VALUES ('Pallets ex Booths', 'Pick Up', '12', '154674', '540', '13500', 'Planned', 'Thursday, 23 Sep', 'Kapiti')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
