<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

<?php include '../header.php' ?>

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
                <div class="col-12">
                 <?php include '../includes/indexFunction.php'; openJobsList(); ?>
                </div>  
            </div> 
        </div>   
    </div>                                   

<?php include '../footer.php' ?>