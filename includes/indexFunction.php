<?php

include 'local-db-connection.php';

function openJobsList()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT driver.DriverID, driver.driverName
                                    FROM openjobs
                                    INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                    INNER JOIN driver  ON openjobs.driverName_fk = driver.driverName");

    // INNER JOIN driver ON openJobs.driverName_fk = driver.driverName

    while ($row = mysqli_fetch_assoc($query)) {

        $id = $row['DriverID'];
        $driverName_fk = $row['driverName_fk'];

        echo "<div class='card mainPageJobCard my-2'>
                <div class='card-body'>
                    <div class='row justify-content-between'>
                        <div class='col-11'>
                            <h5 class='card-title'>Driver: {$id} {$driverName_fk}</h5>
                        </div>
                        <div class='col-1'>
                            <a href='../pages/webAddJob.php' class='btn btn-primary btn-sm text-light rounded-pill'>Add Job</a>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col pt-3'>
                            <table class='table table-bordered table-responsive'>
                                <thead>
                                 <tr class='table-light'>
                                        <th scope='col' class='col-2'>Job</th>
                                        <th scope='col'>Type</th>
                                        <th scope='col' class='col-2'>Order #</th>
                                        <th scope='col' class='col-2'>Reference</th>
                                        <th scope='col'>Pallets</th>
                                        <th scope='col'>Weight (kg)</th>
                                        <th scope='col' class='col-2'>Status</th>
                                    </tr>
                                </thead>";

        $openjobq = mysqli_query($conn, "SELECT openjobs.jobName, openjobs.jobType, openjobs.orderNumber, openjobs.referenceNumber, openjobs.pallets, openjobs.jobWeight, openjobs.jobStatus, driver.DriverID, driver.driverName
                                            FROM openjobs
                                            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                            WHERE driver.DriverID = $id");

        while ($row = mysqli_fetch_assoc($openjobq)) {
            $jobName = $row['jobName'];
            $jobType = $row['jobType'];
            $orderNumber = $row['orderNumber'];
            $referenceNumber = $row['referenceNumber'];
            $pallets = $row['pallets'];
            $jobWeight = $row['jobWeight'];
            $jobStatus = $row['jobStatus'];

            echo "              <tr>
                                    <th>{$jobName}</th>
                                    <td>{$jobType}</td>
                                    <td>{$orderNumber}</td>
                                    <td>{$referenceNumber}</td>
                                    <td>{$pallets}</td>
                                    <td>{$jobWeight}</td>
                                    <td>{$jobStatus}</td>
                                </tr> ";
        }

        echo "</table>
                        </div>
                    </div>
                </div>
            </div>";
    }

}