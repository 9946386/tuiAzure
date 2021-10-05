<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

<?php include '../header.php' ?>

<!-- Page Title -->
    <div class="container-sm text-dark px-3 p-4 truckList">
        <div class="row m-auto align-items-center">
            <?php include '../includes/functions.php'; driverMenu();?>
        </div>
    </div>

    <?php 
        global $conn;
        $query = mysqli_query($conn, "SELECT *
                                        FROM openjobs
                                        INNER JOIN driver ON openjobs.driverName_fk = driver.driverName
                                        WHERE weekday(jobDate) = 0");

        $tuesday = mysqli_query($conn, "SELECT *
                                            FROM openjobs
                                            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                            WHERE weekday(jobDate) = 1");

        $wednesday = mysqli_query($conn, "SELECT *
                                            FROM openjobs
                                            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                            WHERE weekday(jobDate) = 2");

        $thursday = mysqli_query($conn, "SELECT *
                                            FROM openjobs
                                            INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                            WHERE weekday(jobDate) = 3");

        $friday = mysqli_query($conn, "SELECT *
                                        FROM openjobs
                                        INNER JOIN driver ON openjobs.driver_fk = driver.DriverID
                                        WHERE weekday(jobDate) = 4");
    ?>

    <!-- Truck's Weekly Job List -->
    <div class="container-fluid bg-secondary darkContainer">
        <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard">
            <div class="row gy-2"> 
                <div class="col-12">               

                    <!-- Monday -->
                    <div class="card mondayJobCard my-1">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-11">
                                    <h5 class="card-title">Monday ...</h5>
                                </div>
                                <div class="col-1">                            
                                    <a href="/pages/webAddJob.html" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr class="table-light">
                                                <th scope="col" class="col-2">Job</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col" class="col-2">Order #</th>
                                                <th scope="col" class="col-2">Reference</th>
                                                <th scope="col">Pallets</th>
                                                <th scope="col">Weight (kg)</th>
                                                <th scope="col" class="col-2">Status</th>
                                            </tr>
                                        </thead>

                                        <?php 
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
                                        ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                    <!-- Tuesday -->
                    <div class="card tuesdayJobCard my-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-11">
                                    <h5 class="card-title">Tuesday ...</h5>
                                </div>
                                <div class="col-1">                            
                                    <a href="/pages/webAddJob.html" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr class="table-light">
                                                <th scope="col" class="col-2">Job</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col" class="col-2">Order #</th>
                                                <th scope="col" class="col-2">Reference</th>
                                                <th scope="col">Pallets</th>
                                                <th scope="col">Weight (kg)</th>
                                                <th scope="col" class="col-2">Status</th>
                                            </tr>
                                        </thead>

                                        <?php
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
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wednesday -->
                    <div class="card wednesdayJobCard my-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-11">
                                    <h5 class="card-title">Wednesday ...</h5>
                                </div>
                                <div class="col-1">                            
                                    <a href="/pages/webAddJob.html" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
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
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thursday -->
                    <div class="card thursdayJobCard my-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-11">
                                    <h5 class="card-title">Thursday ...</h5>
                                </div>
                                <div class="col-1">                            
                                    <a href="/pages/webAddJob.html" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                    <table class="table table-bordered table-responsive">
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
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Friday -->
                    <div class="card fridayJobCard my-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-11">
                                    <h5 class="card-title">Friday ...</h5>
                                </div>
                                <div class="col-1">                            
                                    <a href="/pages/webAddJob.html" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                    <table class="table table-bordered table-responsive">
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>

    <?php include '../footer.php' ?>