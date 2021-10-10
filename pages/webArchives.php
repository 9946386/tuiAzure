<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

<?php include '../header.php' ?>

<form action="" method="POST">
<div class="container-sm text-dark px-3 p-4 searchInputs w-50">
        <div class="row m-auto align-items-center">
            <div class="col gy-3">
                <div class="row gx-3">
                    <h6 class="p-2">Con Note:</h6>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-pill" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="col gy-3">
                <div class="row gx-3">
                    <h6 class="p-2">Date:</h6>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-pill" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-secondary darkContainer">
        <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard ">
            <!-- <div class="row gy-2"> 
                <div class="col-12"> -->
                    <div class="card my-1">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col">
                                    <h3>Results</h1>
                                </div>
                                <div class="col d-flex flex-row-reverse">
                                    <button type="submit" name="submit" class="btn btn-primary text-light ">Export</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Results</p> 
                                    <?php                                    
                                    if (isset($_POST['submit'])) {

                                        global $conn;

                                        $searchValue = $_POST['search'];

                                        $sql = "SELECT * FROM completedJobs 
                                                WHERE completedReferenceNumber OR completedOrderNumber 
                                                LIKE '%$searchValue%'";

                                        $run = mysqli_query($conn, $sql);
                                        $foundNum = mysqli_num_rows($run);
                                    
                                        //$result = $conn->query($sql);
                                    
                                        if( $foundNum == 0){
                                            echo "Unable to find a job that matched. Please try a different value";
                                        }
                                        else{

                                            $sql = "SELECT * FROM completedJobs 
                                                WHERE completedJobReferenceNumber OR completedJobOrderNumber 
                                                LIKE '%$searchValue%'";

                                                $getQuery = mysqli_query($conn, $sql);

                                            while ($runrows = mysqli_fetch_array($getQuery)) {
                                                
                                                echo $row['completedJobName'] . "<br>";
                                                echo $row['completedJobDate'] . "<br>";
                                                echo $row['completedJobDestination'] . "<br>";
                                                echo $row['completedJobType'] . "<br>";
                                                echo $row['completedOrdernumber'] . "<br>";
                                                echo $row['completedReferenceNumber'] . "<br>";
                                                echo $row['completedJobPallets'] . "<br>";
                                                echo $row['completedJobWeight'] . "<br>";
                                                echo $row['completedJobStatus'] . "<br>";
                                                echo $row['completedJobDriverName_fk'] . "<br>";
                                            };
                                        };
                                        
                                    };                               
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <!-- </div>
            </div> -->
        </div>
    </div>
</form>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>
    
    <!-- Show footer at bottom of page -->
    <?php include '../footer.php' ?>