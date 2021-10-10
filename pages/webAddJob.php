    <?php include '../header.php' ?>
    
    <!-- Page Title -->
    <div class="container-sm text-dark px-3 p-4 truckList">
        <div class="row m-auto align-items-center">
            <select class="form-select form-select-lg col-2 w-50 m-auto" name="selectedDriver" id="driver">
                <option selected>Pick a driver</option>
                <?php include '../includes/functions.php'; dropDown();?>
            </select>
            <!-- <div class="dropdown">
                <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">                    
                </div>
            </div> -->
        </div>
    </div>
    <div class="container-fluid bg-secondary darkContainer">
        <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard">
            <div class="card w-75 m-auto">
                <div class="card-body">
                    <form action="../includes/insertJob.php" method="POST" class="form-group">
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
                                <label for="addDriverID" class="form-label p-1">Driver ID:</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control p-1" name="JobDriver" id="jobDriver">
                            </div>
                        </div>
                        <div class="row gy-5 form-group">
                            <div class="col-2">
                                <label for="addDriverName" class="form-label p-1">Driver Name:</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control p-1" name="JobDriverName" id="jobDriverName">
                            </div>
                        </div>
                        <div class="row gy-5 form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Date:</label>
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control p-1" name="JobDate" id="jobDate">
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>    
    
    <!-- Link to manifest.json for PWA functionality -->
    <?php include '../footer.php' ?>