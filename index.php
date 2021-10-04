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
    <div class="container-fluid bg-secondary darkContainer">
        <div class="container px-4 p-3 webDailyPlanTruckCard">
            <div class="row gy-2">
                <div class="col-12">
                 <?php include 'includes/indexFunction.php'; openJobsList2(); ?>
                </div>  
            </div> 
        </div>   
    </div>      
        
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="/JS/app.js"></script>
    <script src="/JS/ui.js"></script>

<?php include 'footer.php' ?>