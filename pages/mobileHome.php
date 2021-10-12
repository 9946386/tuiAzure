<!-- PHP error -->
<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

<!-- Including the mobile header -->
<?php include '../includes/mobileHeader.php' ?>

<!-- Including the connection file -->
<?php 
include '../local-db-connection.php'; 
?>

<!-- Page Title -->
    <div class="container-sm text-dark px-3 p-2">
        <div class="row justify-content ">
            <h1 class="pageTitle col-5 align-self-center ">To Complete</h1>
            <div class="line col-1 "></div>
            <!-- Uses JavaScript to display todays date -->
            <h6 class="todaysDate col-6 align-self-center" id="todaysDate"></h6>
        </div>
    </div>

    <!-- Job Cards -->
    <div class="container px-4 p-3 mainPageJobCardContainer bg-secondary darkMobileContainer min-vh-100">
        <div class="row gy-2">
            <div class="col-12">
                <!-- Calling the get users function to get the loged in users openjobs -->
                <?php 
                include '../includes/functions.php';
                getUserJobs();
            ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>
