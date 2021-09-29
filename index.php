<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

<?php include 'header.php' ?>

    <!-- Page Title -->
    <div class="container-sm text-dark px-3 p-4">
        <div class="row justify-content webDate">
            <h6 class="todaysDate col-6 align-self-center" id="todaysDate"></h6>
        </div>
    </div>

    <!-- Truck Job Table -->
    <div class="container-fluid bg-secondary vh-100 darkContainer">
        <div class="container px-4 p-3 webDailyPlanTruckCard vh-100">
            <div class="row gy-2">
            <div class="card mainPageJobCard">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-11">
                                    <h5 class="card-title">1. Uncle
                                    </h5>
                                </div>
                                <div class="col-1">
                                    <a href="pages/webAddJob.php" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                <table class="table table-bordered table-responsive ">
                                        <thead>
                                            <tr class="table-light">
                                                <th scope="col" class="col-2">Job</th>
                                                <th scope="col">Type</th>
                                                <th scope="col" class="col-2">Order #</th>
                                                <th scope="col" class="col-2">Reference</th>
                                                <th scope="col">Pallets</th>
                                                <th scope="col">Weight (kg)</th>
                                                <th scope="col" class="col-2">Status</th>
                                            </tr>
                                        </thead>
<?php include 'local-db-connection.php';

$openjobsq = mysqli_query($conn, "SELECT openjobs.jobName, openjobs.jobType, openjobs.orderNumber, openjobs.referenceNumber, openjobs.pallets, openjobs.jobWeight, openjobs.jobStatus
                                            FROM openjobs
                                            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                            WHERE driver.DriverID = 4");

while ($data = mysqli_fetch_array($openjobsq)) {
?>
                                                <tr>
                                                <th><?php echo $data['jobName']; ?></th>
                                                <td><?php echo $data['jobType']; ?></td>
                                                <td><?php echo $data['orderNumber']; ?></td>
                                                <td><?php echo $data['referenceNumber']; ?></td>
                                                <td><?php echo $data['pallets']; ?></td>
                                                <td><?php echo $data['jobWeight']; ?></td>
                                                <td><?php echo $data['jobStatus']; ?></td>
                                            </tr>
                                        <?php
};
?>                                    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mainPageJobCard my-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-11">
                                    <h5 class="card-title">1. Cris T
                                    </h5>
                                </div>
                                <div class="col-1">
                                    <a href="pages/webAddJob.php" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                <table class="table table-bordered table-responsive ">
                                        <thead>
                                            <tr class="table-light">
                                                <th scope="col" class="col-2">Job</th>
                                                <th scope="col">Type</th>
                                                <th scope="col" class="col-2">Order #</th>
                                                <th scope="col" class="col-2">Reference</th>
                                                <th scope="col">Pallets</th>
                                                <th scope="col">Weight (kg)</th>
                                                <th scope="col" class="col-2">Status</th>
                                            </tr>
                                        </thead>

                                        <?php
include 'local-db-connection.php';

$openjobsq = mysqli_query($conn, "SELECT openjobs.jobName, openjobs.jobType, openjobs.orderNumber, openjobs.referenceNumber, openjobs.pallets, openjobs.jobWeight, openjobs.jobStatus
                                            FROM openjobs
                                            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                            WHERE driver.DriverID = 5");

while ($data = mysqli_fetch_array($openjobsq)) {
?>
                                                <tr>
                                                <th><?php echo $data['jobName']; ?></th>
                                                <td><?php echo $data['jobType']; ?></td>
                                                <td><?php echo $data['orderNumber']; ?></td>
                                                <td><?php echo $data['referenceNumber']; ?></td>
                                                <td><?php echo $data['pallets']; ?></td>
                                                <td><?php echo $data['jobWeight']; ?></td>
                                                <td><?php echo $data['jobStatus']; ?></td>
                                            </tr>
                                        <?php
}
?>                                    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mainPageJobCard my-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-11">
                                    <h5 class="card-title">3. Crusty
                                    </h5>
                                </div>
                                <div class="col-1">
                                    <a href="pages/webAddJob.php" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                <table class="table table-bordered table-responsive ">
                                        <thead>
                                            <tr class="table-light">
                                                <th scope="col" class="col-2">Job</th>
                                                <th scope="col">Type</th>
                                                <th scope="col" class="col-2">Order #</th>
                                                <th scope="col" class="col-2">Reference</th>
                                                <th scope="col">Pallets</th>
                                                <th scope="col">Weight (kg)</th>
                                                <th scope="col" class="col-2">Status</th>
                                            </tr>
                                        </thead>

                                        <?php
include 'local-db-connection.php';

$openjobsq = mysqli_query($conn, "SELECT openjobs.jobName, openjobs.jobType, openjobs.orderNumber, openjobs.referenceNumber, openjobs.pallets, openjobs.jobWeight, openjobs.jobStatus
                                            FROM openjobs
                                            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                            WHERE driver.DriverID = 6");

while ($data = mysqli_fetch_array($openjobsq)) {
?>
                                                <tr>
                                                <th><?php echo $data['jobName']; ?></th>
                                                <td><?php echo $data['jobType']; ?></td>
                                                <td><?php echo $data['orderNumber']; ?></td>
                                                <td><?php echo $data['referenceNumber']; ?></td>
                                                <td><?php echo $data['pallets']; ?></td>
                                                <td><?php echo $data['jobWeight']; ?></td>
                                                <td><?php echo $data['jobStatus']; ?></td>
                                            </tr>
                                        <?php
}
?>                                    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


            </div> 
        </div>   
    </div>                                   

<?php include 'footer.php' ?>