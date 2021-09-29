    <?php include '../header.php' ?>
    
    <!-- Page Title -->
    <div class="container-sm text-dark px-3 p-4 truckList">
        <div class="row m-auto align-items-center">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Truck 1
                </button>
                <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                    <?php 
                    $result = $conn->query("SELECT driverName FROM drivers");
                    $run = mysqli_query($conn, $result) or die(mysqli_error($conn));
                    foreach($result as $menu_item): ?>

                    <a class="dropdown-item" href="webAddJob.php?driver='<?php echo $menu_item['driverName']; ?>'"><?php echo $menu_item['driverName']; ?></a>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-secondary darkContainer">
        <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard">
            <div class="card w-75 m-auto">
                <div class="card-body">
                    <form action="../includes/insert.php" method="POST" class="form-group">
                        <div class="row gy-5 form-group">
                            <div class="col-2">
                                <label for="addJobName" class="form-label p-1">Name:</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control p-1" name="JobName" id="jobName">
                            </div>
                        </div>
                        <div class="row gy-5 form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Date:</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control p-1" name="JobDate" id="jobDate">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Destination:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control p-1" name="Destination" id="destination">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Type:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="JobType" id="jobType">
                            </div>
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Order #:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="OrderNumber" id="orderNumber">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Reference:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="JobReference" id="referenceNumber">
                            </div>
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Pallets:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="Pallets" id="pallets">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Weight:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="JobWeight" id="jobWeight">
                            </div>
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Status:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="JobStatus" id="jobStatus">
                            </div>
                        </div>
                        <div class="row justify-content-end me-3">
                            <div class="col-1 form-group">
                                <input type="submit" class="btn btn-primary text-light" name="submit" value="Submit">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <?php include '../footer.php' ?>