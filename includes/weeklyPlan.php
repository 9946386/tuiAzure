<?php

include '../local-db-connection.php';

function monday()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT *
                                    FROM openjobs
                                    INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                    WHERE weekday(jobDate) = 0");
    echo "<div class='row'>
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

    while ($row = mysqli_fetch_assoc($query)) {
        //$id = $row['DriverID'];
        //$driverName_fk = $row['driverName_fk'];
        $jobName = $row['jobName'];
        $jobType = $row['jobType'];
        $orderNumber = $row['orderNumber'];
        $referenceNumber = $row['referenceNumber'];
        $pallets = $row['pallets'];
        $jobWeight = $row['jobWeight'];
        $jobStatus = $row['jobStatus'];

        echo "<tr>
                                <th>{$jobName}</th>
                                <td>{$jobType}</td>
                                <td>{$orderNumber}</td>
                                <td>{$referenceNumber}</td>
                                <td>{$pallets}</td>
                                <td>{$jobWeight}</td>
                                <td>{$jobStatus}</td>
                            </tr> 
                    </table>
                </div>
            </div>
            </div>
            </div>";
    }
}

function tuesday()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT *
                                    FROM openjobs
                                    INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                    WHERE weekday(jobDate) = 2");


    echo "<div class='row'>
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

    while ($row = mysqli_fetch_assoc($query)) {
        //$id = $row['DriverID'];
        //$driverName_fk = $row['driverName_fk'];
        $jobName = $row['jobName'];
        $jobType = $row['jobType'];
        $orderNumber = $row['orderNumber'];
        $referenceNumber = $row['referenceNumber'];
        $pallets = $row['pallets'];
        $jobWeight = $row['jobWeight'];
        $jobStatus = $row['jobStatus'];

        echo "<tr>
                                        <th>{$jobName}</th>
                                        <td>{$jobType}</td>
                                        <td>{$orderNumber}</td>
                                        <td>{$referenceNumber}</td>
                                        <td>{$pallets}</td>
                                        <td>{$jobWeight}</td>
                                        <td>{$jobStatus}</td>
                                    </tr> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>";
    }
}