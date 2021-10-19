<!-- PHP error handling - Can be removed before shipped - Shows any errors with PHP straight on webpage -->
<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

<?php ob_start(); ?>
<!-- Including the header at the top of the page -->
<?php include '../local-db-connection.php';?>
<?php include '../header.php'; ?>

<!-- Form that uses the search.php file to search database for anything that matches user input -->

    <div class="container-sm text-dark px-3 p-4 searchInputs w-50">
    <form action="" method="POST" enctype="mulitpart/form-data">
        <div class="row m-auto align-items-center">            
            <div class="col gy-3">
                <div class="row gx-3">
                    <h6 class="p-2">Con Note:</h6>
                    <div class="input-group">
                        <input name="search" type="text" class="form-control rounded-pill" placeholder="Search">
                    <div class="input-group-btn">
                        <!-- <input class="btn btn-default" type="submit" name="submit" value="Submit"> -->
                        <button class="btn btn-default" type="submit" name="submit">
                            <i class="glyphicon glyphicon-search" style="black"></i>
                        </button>
                    </div>
                    </div>                    
                </div>
            </div>
            <!-- <div class="col gy-3">
                <div class="row gx-3">
                    <h6 class="p-2">Date:</h6>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-pill" placeholder="Search" name="search">
                        <div class="input-group-btn"> -->
                            <!-- <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search" style="color:#58595d"></i>
                            </button> -->
                        <!-- </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Container where the results will be displayed -->
    <div class="container-fluid bg-secondary darkContainer h-75">
        <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard ">
            <div class="card my-1">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col">
                            <h3>Results</h1>
                        </div>
                        
                        </div>
                        <div class="row">
                            <div class="col">                                  
                        <?php if (isset($_POST['submit'])) {

                        //global $conn;
                        $search = mysqli_real_escape_string($conn, $_POST['search']);

                        // Select all from completed jobs where the reference or order number is what was entered in the search input
                        $sql = "SELECT completedjobs.completedJobID, completedjobs.completedJobName, completedjobs.completedJobDate, completedjobs.completedJobDestination, completedjobs.completedJobType, completedjobs.completedOrderNumber, completedjobs.completedReferenceNumber, completedjobs.completedPallets, completedjobs.completedJobWeight, completedjobs.completedJobStatus, completedjobs.completedJobDriverName_fk, customers.customerName, customers.customerSignature
                                FROM completedJobs 
                                INNER JOIN customers ON completedjobs.completedJobID = customers.completedJobID_fk
                                WHERE completedReferenceNumber LIKE '%$search%' OR completedOrderNumber LIKE '%$search%' OR completedJobID LIKE '%$search%' OR completedJobName LIKE '%$search%' OR completedJobDate LIKE '%$search%' OR completedJobDestination LIKE '%$search%' OR completedJobDriverName_fk LIKE '%$search%'";
                        $result = mysqli_query($conn, $sql);

                        // Checking if anything matched the search value
                        $queryResult = mysqli_num_rows($result);

                        // Checking if theres more than 0 results
                        if ($queryResult > 0) {

                            while ($row = mysqli_fetch_array($result)) {
                                echo "Job Name: " . $row['completedJobName'] . "<br>";
                                echo "Date: " . $row['completedJobDate'] . "<br>";
                                echo "Destination: " . $row['completedJobDestination'] . "<br>";
                                echo "Type: " . $row['completedJobType'] . "<br>";
                                echo "Order Number: " . $row['completedOrderNumber'] . "<br>";
                                echo "Reference Number: " . $row['completedReferenceNumber'] . "<br>";
                                echo "Pallets: " . $row['completedPallets'] . "<br>";
                                echo "Weight: " . $row['completedJobWeight'] . "<br>";
                                echo "Status: " . $row['completedJobStatus'] . "<br>";
                                echo "Driver: " . $row['completedJobDriverName_fk'] . "<br>";
                                echo "Customer Name: " . $row['customerName'] . "<br>";
                                echo "Customer Signature: <br>";
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['customerSignature']) .'" /> . <br>';
                            }

                            
                        }
                        else {
                            // If there are no matches
                            echo "No matching results. Please try again";
                        }
                        };

                        //<!-- </div>
                        //<div class="col d-flex flex-row-reverse">
                            //<button type="submit" name="export" class="btn btn-primary text-light ">Export</button>
                        //</div> -->

                            echo "</div>
                                <div class='col d-flex flex-row-reverse'>
                                    <button type='submit' name='export' class='btn btn-primary text-light'>Export</button>
                                </div>";

                        
                            if(isset($_POST['export'])){
                                header('Content-Type: text/csv; charset=utf-8');  
                                header('Content-Disposition: attachment; filename=data.csv');  
                                $output = fopen("php://output", "w");  
                                fputcsv($output, array('completedJobName', 'completedJobDate', 'completedJobDestination', 'completedJobType', 'completedOrderNumber', 'completedReferenceNumber', 'completedPallets', 'completedJobWeight', 'completedJobStatus', 'completedJobDriverName_fk', 'customerName', 'customerSignature'));
                                while($row = mysqli_fetch_assoc($result)){
                                    fputcsv($output, $row);
                                }
                                fclose($output);
                            }?>


                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="../JS/app.js"></script>
<script src="../JS/ui.js"></script>

<!-- Show footer at bottom of page -->
<?php include '../footer.php' ?>