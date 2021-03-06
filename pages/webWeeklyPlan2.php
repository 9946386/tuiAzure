<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>
<?php include '../header.php' ?>

<!-- Page Title -->
    <div class="container-sm text-dark px-3 p-4 truckList">
        <div class="row m-auto align-items-center">
            <!-- Calling the driver menu function to display all drivers as buttons -->
            <?php 
                include '../includes/functions.php';
                driverMenu();
            ?>
        </div>
    </div>

    <div class="container-fluid bg-secondary darkContainer">
        <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard">
            <div class="row gy-2"> 
                <div class="col-12"> 

    <?php
    
        $sql="SELECT openjobs.openJobID, openjobs.jobName, openjobs.jobDate, openjobs.destination, openjobs.jobType, openjobs.orderNumber, openjobs.referenceNumber, openjobs.pallets, openjobs.jobWeight, openjobs.jobStatus, openjobs.driverName_fk, users.usersID, users.userName, DAYNAME(openjobs.jobDate) AS Day
            FROM openjobs
            INNER JOIN users ON openjobs.driverName_fk = users.userName";
        $results = $conn->query( $sql );

        print_r($results);
        
        // Creating a day array to popluate cards
        $days=array(
            1   =>  'Monday',
            2   =>  'Tuesday',
            3   =>  'Wednesday',
            4   =>  'Thursday',
            5   =>  'Friday'
        );

        // For loop that loops through 5 times added different days to each card
        for( $i=1; $i<=5; $i++ ){
                printf('<div class="card %2$sJobCard my-3">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-11">
                                        <h5 class="card-title">%1$s ...</h5>
                                    </div>
                                    <div class="col-1">                            
                                        <a href="/pages/webAddJob.php" class="btn btn-primary btn-sm text-light rounded-pill">Add Job</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-3">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr class="table-light">
                                                    <th scope="col" class="col-2">Job</th>
                                                    <th scope="col">Driver</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col" class="col-2">Order #</th>
                                                    <th scope="col" class="col-2">Reference</th>
                                                    <th scope="col">Pallets</th>
                                                    <th scope="col">Weight (kg)</th>
                                                    <th scope="col" class="col-2">Status</th>
                                                </tr>
                                            </thead>
                    ',
                    $days[$i],
                    strtolower( $days[$i] )
                );//close printf()               
            

            // While loop to loop through all jobs attached to that day
            while( $row = $results->fetch_object() ) {
                if( date( 'w', strtotime( $row->jobDate ) ) == $i ){
                    printf('<tbody>
                                <tr data-did="%9$s" data-driver="%1$s">
                                    <th>%2$s</th>
                                    <th>%1$s</td>
                                    <td>%3$s</td>
                                    <td>%4$s</td>
                                    <td>%5$s</td>
                                    <td>%6$s</td>
                                    <td>%7$s</td>
                                    <td>%8$s</td>
                                </tr> 
                            </tbody>',
                            $row->driverName_fk,
                            $row->jobName,
                            $row->jobType,
                            $row->orderNumber,
                            $row->referenceNumber,
                            $row->pallets,
                            $row->jobWeight,
                            $row->jobStatus,
                            $row->usersID
                    );
                }
            }            
            
            
            echo "
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript that adds functions to the driver name buttons and changes jobs displayed when selected -->
    <script>
        const qa=(e,n=document)=>n.querySelectorAll(e);
        
        qa('input[ data-name="driverNameBtn" ]').forEach( bttn=>bttn.addEventListener('click',function(e){
            e.preventDefault();
            qa('table.table-responsive tbody tr').forEach( tr=>{
                if( tr.dataset.did==this.dataset.did && tr.dataset.driver==this.value ){
                    tr.style.display='table-row';
                }else{
                    tr.style.display='none';
                }
            })
        }));
    </script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>

    <!-- Link to manifest.json for PWA functionality -->
    <?php include '../footer.php' ?>