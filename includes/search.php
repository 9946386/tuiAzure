<?php

include '../local-db-connection.php';

if (isset($_POST['submit'])) {

    $search = mysqli_real_escape_string($conn, $_POST['search']);

    // Select all from completed jobs where the reference or order number is what was entered in the search input
    $sql = "SELECT * FROM completedJobs WHERE completedReferenceNumber LIKE '%$search%' OR completedOrderNumber LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    // Checking if anything matched the search value
    $queryResult = mysqli_num_rows($result);

    // Checking if theres more than 0 results
    if ($queryResult > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
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
    else {
        // If there are no matches
        echo "No matching results. Please try again";
    }



// $searchValue = $_POST['search'];
// $sql = "SELECT * FROM completedJobs WHERE completedJobReferenceNumber OR completedJobOrderNumber LIKE '%$searchValue%'";

// $result = $conn->query($sql);

// while ($row = $result->fetch_assoc()) {
//     echo $row['completedJobName'] . "<br>";
//     echo $row['completedJobDate'] . "<br>";
//     echo $row['completedJobDestination'] . "<br>";
//     echo $row['completedJobType'] . "<br>";
//     echo $row['completedJobOrdernumber'] . "<br>";
//     echo $row['completedJobReferenceNumber'] . "<br>";
//     echo $row['completedJobPallets'] . "<br>";
//     echo $row['completedJobWeight'] . "<br>";
//     echo $row['completedJobStatus'] . "<br>";
//     echo $row['completedJobDriverName_fk'] . "<br>";
// }
}

?>
