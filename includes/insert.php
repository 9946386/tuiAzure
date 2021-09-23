<?php

include_once "dbh.php";

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

    $sql = "INSERT INTO OpenJobs (JobName, JobDate, Destination, JobType, OrderNumber, ReferenceNumber, Pallets, JobWeight, JobStatus)
    VALUES ($JobName', '$JobDate', '$Destination', '$JobType', '$OrderNumber', '$ReferenceNumber', '$Pallets', '$JobWeight', '$JobStatus')";

    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }

    // header("Location: ../index.php?");
}







// Select Data to Display
// $sql = "SELECT JobName, JobType, OrderNumber, ReferenceNumber, Pallets, JobWeight, JobStatus FROM OpenJobs";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     echo "<table><tr><th>JobType</th><th>OrderNumber</th></tr><tr><th>Reference</th><th>Pallets</th></tr><tr><th>Weight</th><th>Status</th></tr>";
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr><td>" . $row["JobName"] . "</td><td>" . $row["OrderNumber"] . "</td><td>" . $row["ReferenceNumber"] . "</td><td>" . $row["Pallets"] . "</td><td>" . $row["JobWeight"] . "</td><td>" . $row["JobStatus"] . "</td></tr>";
//     }
//     echo "</table>";
// } else {
//     echo "0 results";
// }
