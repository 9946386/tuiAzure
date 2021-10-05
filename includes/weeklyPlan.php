<?php

include '../local-db-connection.php';

function monday()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT *
                                    FROM openjobs
                                    INNER JOIN driver ON openjobs.driverName_fk = driver.driverName
                                    WHERE weekday(jobDate) = 0");

    echo "<div class='container-fluid bg-secondary darkContainer'>
    <div class='container py-5 px-4 p-3 webWeeklyPlanTruckCard'>
        <div class='row gy-2'> 
            <div class='col-12'>
    <div class='card mondayJobCard my-1'>
    <div class='card-body'>
        <div class='row justify-content-between'>
            <div class='col-11'>
                <h5 class='card-title'>Monday ...</h5>
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
                        <th scope='col'>Name</th>
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
        $driverName_fk = $row['driverName_fk'];
        $jobName = $row['jobName'];
        $jobType = $row['jobType'];
        $orderNumber = $row['orderNumber'];
        $referenceNumber = $row['referenceNumber'];
        $pallets = $row['pallets'];
        $jobWeight = $row['jobWeight'];
        $jobStatus = $row['jobStatus'];

        echo "<tbody>
                <tr>
                    <th>{$jobName}</th>
                    <th>{$driverName_fk}</td>
                    <td>{$jobType}</td>
                    <td>{$orderNumber}</td>
                    <td>{$referenceNumber}</td>
                    <td>{$pallets}</td>
                    <td>{$jobWeight}</td>
                    <td>{$jobStatus}</td>
                </tr> 
            </tbody>";

    }
    echo "</table>
            </div>
            </div>
            </div>
            </div>";

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
                            <th scope='col'>Name</th>
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

        echo "<tbody>
                <tr>
                    <th>{$jobName}</th>
                    <th>{$driverName_fk}</td>
                    <td>{$jobType}</td>
                    <td>{$orderNumber}</td>
                    <td>{$referenceNumber}</td>
                    <td>{$pallets}</td>
                    <td>{$jobWeight}</td>
                    <td>{$jobStatus}</td>
                </tr> 
            </tbody>";

    }
    echo "</table>
            </div>
            </div>
            </div>
            </div>";

    $wednesday = mysqli_query($conn, "SELECT *
            FROM openjobs
            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
            WHERE weekday(jobDate) = 2");


    echo "<div class='card tuesdayJobCard my-2>
            <div class='card-body'>
            <div class='row justify-content-between'>
            <div class='col-11'>
            <h5 class='card-title'>Wednesday ...</h5>
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
                            <th scope='col'>Name</th>
                            <th scope='col'>Type</th>
                            <th scope='col' class='col-2'>Order #</th>
                            <th scope='col' class='col-2'>Reference</th>
                            <th scope='col'>Pallets</th>
                            <th scope='col'>Weight (kg)</th>
                            <th scope='col' class='col-2'>Status</th>
                        </tr>
                    </thead>";

    while ($row = mysqli_fetch_assoc($wednesday)) {
        //$id = $row['DriverID'];
        $driverName_fk = $row['driverName_fk'];
        $jobName = $row['jobName'];
        $jobType = $row['jobType'];
        $orderNumber = $row['orderNumber'];
        $referenceNumber = $row['referenceNumber'];
        $pallets = $row['pallets'];
        $jobWeight = $row['jobWeight'];
        $jobStatus = $row['jobStatus'];

        echo "
            <tbody>
                <tr>
                    <th>{$jobName}</th>
                    <th>{$driverName_fk}</td>
                    <td>{$jobType}</td>
                    <td>{$orderNumber}</td>
                    <td>{$referenceNumber}</td>
                    <td>{$pallets}</td>
                    <td>{$jobWeight}</td>
                    <td>{$jobStatus}</td>
                </tr> 
            </tbody>";

    }
    echo "</table>
            </div>
            </div>
            </div>
            </div>";

    $thursday = mysqli_query($conn, "SELECT *
            FROM openjobs
            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
            WHERE weekday(jobDate) = 3");


    echo "<div class='card tuesdayJobCard my-2>
            <div class='card-body'>
            <div class='row justify-content-between'>
            <div class='col-11'>
            <h5 class='card-title'>Thursday ...</h5>
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
                            <th scope='col'>Name</th>
                            <th scope='col'>Type</th>
                            <th scope='col' class='col-2'>Order #</th>
                            <th scope='col' class='col-2'>Reference</th>
                            <th scope='col'>Pallets</th>
                            <th scope='col'>Weight (kg)</th>
                            <th scope='col' class='col-2'>Status</th>
                        </tr>
                    </thead>";

    while ($row = mysqli_fetch_assoc($thursday)) {
        //$id = $row['DriverID'];
        $driverName_fk = $row['driverName_fk'];
        $jobName = $row['jobName'];
        $jobType = $row['jobType'];
        $orderNumber = $row['orderNumber'];
        $referenceNumber = $row['referenceNumber'];
        $pallets = $row['pallets'];
        $jobWeight = $row['jobWeight'];
        $jobStatus = $row['jobStatus'];

        echo "<tbody>
                <tr>
                    <th>{$jobName}</th>
                    <th>{$driverName_fk}</td>
                    <td>{$jobType}</td>
                    <td>{$orderNumber}</td>
                    <td>{$referenceNumber}</td>
                    <td>{$pallets}</td>
                    <td>{$jobWeight}</td>
                    <td>{$jobStatus}</td>
                </tr>
            </tbody>";

    }
    echo "</table>
            </div>
            </div>
            </div>
            </div>";

    $friday = mysqli_query($conn, "SELECT *
            FROM openjobs
            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
            WHERE weekday(jobDate) = 4");


    echo "<div class='card fridayJobCard my-2>
            <div class='card-body'>
            <div class='row justify-content-between'>
            <div class='col-11'>
            <h5 class='card-title'>Friday ...</h5>
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
                            <th scope='col'>Name</th>
                            <th scope='col'>Type</th>
                            <th scope='col' class='col-2'>Order #</th>
                            <th scope='col' class='col-2'>Reference</th>
                            <th scope='col'>Pallets</th>
                            <th scope='col'>Weight (kg)</th>
                            <th scope='col' class='col-2'>Status</th>
                        </tr>
                    </thead>";

    while ($row = mysqli_fetch_assoc($friday)) {
        //$id = $row['DriverID'];
        $driverName_fk = $row['driverName_fk'];
        $jobName = $row['jobName'];
        $jobType = $row['jobType'];
        $orderNumber = $row['orderNumber'];
        $referenceNumber = $row['referenceNumber'];
        $pallets = $row['pallets'];
        $jobWeight = $row['jobWeight'];
        $jobStatus = $row['jobStatus'];

        echo "
            <tbody>
                <tr>
                    <th>{$jobName}</th>
                    <th>{$driverName_fk}</td>
                    <td>{$jobType}</td>
                    <td>{$orderNumber}</td>
                    <td>{$referenceNumber}</td>
                    <td>{$pallets}</td>
                    <td>{$jobWeight}</td>
                    <td>{$jobStatus}</td>
                </tr>
            </tbody>";

    }
    echo "</table>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </div>";

    mysqli_close($conn);
}
