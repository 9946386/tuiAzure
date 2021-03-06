<!-- PHP errors -->
<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

<!-- Including the header at the top of the page -->
<?php include '../header.php' ?>
<?php include '../local-db-connection.php' ?>

<!-- Page Title -->
<div class="container-sm text-dark px-3 p-4 truckList">
    <div class="row m-auto align-items-center">
        <!-- Form that uses the insertJob.php file to take form input and insert it into the openjobs table -->
        <form action="../includes/insertJob.php" method="POST" class="form-group">
        <select class="form-select form-select-lg col-2 w-50 m-auto" name="selectedDriver" id="driver">
            <option selected>Select driver</option>
            <!-- Calling the dropDown function to supply driver names in drop down -->
            <?php include '../includes/functions.php'; dropDown();?>
        </select>
    </div>
</div>
<div class="container-fluid bg-secondary darkContainer">
    <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard">
        <div class="card w-75 m-auto">
            <div class="card-body">
                    <div class="row gy-5 form-group">
                        <!-- Job name -->
                        <div class="col-2">
                            <label for="addJobName" class="form-label p-1">Job Name:</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control p-1" name="JobName" id="jobName" >
                        </div>
                    </div>
                    <!-- Job date -->
                    <div class="row gy-5 form-group">
                        <div class="col-2">
                            <label for="addJobDate" class="form-label p-1">Date:</label>
                        </div>
                        <div class="col-6">
                            <input type="date" class="form-control p-1" name="JobDate" id="jobDate">
                        </div>
                    </div>
                    <!-- Job destination -->
                    <div class="row form-group">
                        <div class="col-2">
                            <label for="addJobDate" class="form-label p-1">Destination:</label>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control p-1" name="Destination" id="destination">
                        </div>
                    </div>
                    <div class="row form-group">
                        <!-- Job type -->
                        <div class="col-2">
                            <label for="addJobDate" class="form-label p-1">Type:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control p-1" name="JobType" id="jobType">
                        </div>
                        <!-- Order Number -->
                        <div class="col-2">
                            <label for="addJobDate" class="form-label p-1">Order #:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control p-1" name="OrderNumber" id="orderNumber">
                        </div>
                    </div>
                    <div class="row form-group">
                        <!-- Reference Number -->
                        <div class="col-2">
                            <label for="addJobDate" class="form-label p-1">Reference:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control p-1" name="JobReference" id="referenceNumber">
                        </div>
                        <!-- Number of pallets -->
                        <div class="col-2">
                            <label for="addJobDate" class="form-label p-1">Pallets:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control p-1" name="Pallets" id="pallets">
                        </div>
                    </div>
                    <div class="row form-group">
                        <!-- Job Weight -->
                        <div class="col-2">
                            <label for="addJobDate" class="form-label p-1">Weight:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control p-1" name="JobWeight" id="jobWeight">
                        </div>
                        <!-- Job status -->
                        <div class="col-2">
                            <label for="addJobDate" class="form-label p-1">Status:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control p-1" name="JobStatus" id="jobStatus">
                        </div>
                    </div>
                    <div class="row justify-content-end me-3">
                        <!-- Submit button -->
                        <div class="col-1 form-group">
                            <input type="submit" class="btn btn-primary text-light" name="submit" value="Submit">
                        </div>
                    </div>
                    <?php 
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<br><p>Please fill in all fields and try again</p>";
                            }
                            else if($_GET["error"] == "invalidEntry"){
                                echo "<br><p>Only numbers can be entered in the Job Weight and Pallets input. Please try again</p>";
                            }
                            else if ($_GET["error"] == "none") {
                                echo "<br><p>Job has been added successfully.</p>";
                            }
                        } ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="../JS/app.js"></script>
<script src="../JS/ui.js"></script>    

<!-- Include footer at bottom of the page -->
<?php include '../footer.php' ?>