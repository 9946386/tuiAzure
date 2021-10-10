<?php

include 'local-db-connection.php';

function openJobsList()
{
    global $conn;
    $query = "SELECT usersID, userName
                FROM users";

    $result = mysqli_query($conn, $query);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($users as $user) {
        $id = $user['usersID'];
        $driverName_fk = $user['userName'];

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

        $openjobq = mysqli_query($conn, "SELECT openjobs.jobName, openjobs.jobType, openjobs.orderNumber, openjobs.referenceNumber, openjobs.pallets, openjobs.jobWeight, openjobs.jobStatus, users.usersID, users.userName
                                            FROM openjobs
                                            INNER JOIN users ON openjobs.driver_fk = users.usersID
                                            WHERE users.usersID = $id");

        foreach ($openjobq as $openjob) {
            $jobName = $openjob['jobName'];
            $jobType = $openjob['jobType'];
            $orderNumber = $openjob['orderNumber'];
            $referenceNumber = $openjob['referenceNumber'];
            $pallets = $openjob['pallets'];
            $jobWeight = $openjob['jobWeight'];
            $jobStatus = $openjob['jobStatus'];

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
    ;

}