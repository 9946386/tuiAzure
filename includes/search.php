<?php

include '../local-db-connection.php';

if (isset($_POST['submit'])) {

    $searchValue = $_POST['search'];
    $sql = "SELECT * FROM completedJobs WHERE completedJobReferenceNumber OR completedJobOrderNumber LIKE '%$searchValue%'";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo $row['completedJobName'] . "<br>";
        echo $row['completedJobDate'] . "<br>";
        echo $row['completedJobDestination'] . "<br>";
        echo $row['completedJobType'] . "<br>";
        echo $row['completedJobOrdernumber'] . "<br>";
        echo $row['completedJobReferenceNumber'] . "<br>";
        echo $row['completedJobPallets'] . "<br>";
        echo $row['completedJobWeight'] . "<br>";
        echo $row['completedJobStatus'] . "<br>";
        echo $row['completedJobDriverName_fk'] . "<br>";
    }
}

?>
