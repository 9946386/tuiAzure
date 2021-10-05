<?php

include '../local-db-connection.php';

function tuesday()
{
    global $conn;
    $tuesday = mysqli_query($conn, "SELECT *
                                    FROM openjobs
                                    INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                    WHERE weekday(jobDate) = 1");


    echo "<div class='card tuesdayJobCard my-2>
            <div class='card-body'>
                <div class='row justify-content-between'>
                    <div class='col-11'>
                        <h5 class='card-title'>Tuesday ...</h5>
                    </div>
                        <div class='col-1'>                            
                            <a href='/pages/webAddJob.html' class='btn btn-primary btn-sm text-light rounded-pill'>Add Job</a>
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

    while ($row = mysqli_fetch_assoc($tuesday)) {
        //$id = $row['DriverID'];
        $driverName_fk = $row['driverName_fk'];
        $jobName = $row['jobName'];
        $jobType = $row['jobType'];
        $orderNumber = $row['orderNumber'];
        $referenceNumber = $row['referenceNumber'];
        $pallets = $row['pallets'];
        $jobWeight = $row['jobWeight'];
        $jobStatus = $row['jobStatus'];

        echo "<tr>
                                <th>{$jobName}</th>
                                <th>{$driverName_fk}</td>
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