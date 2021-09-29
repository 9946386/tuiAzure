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
    <div class="container-fluid bg-secondary vh-100 darkContainer">
        <div class="container px-4 p-3 webDailyPlanTruckCard vh-100">
            <div class="row gy-2">
                <div class="col-12">
                 <?php include 'includes/functions.php'; driverMenu(); ?>
                </div>  
            </div> 
        </div>   
    </div>                                   

    <!-- Footer -->
    <div class="container-fluid bg-primary p-4">
        <footer class="webFooter">
            <div class="row w-75 m-auto align-items-center">
                <div class="col-3 text-center">
                    <a href="/index.php">
                        <img src="/images/navLogo.png" alt="footerImg">
                    </a>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col text-center">
                            <a class="text-light m-auto" role="button" href="/index.php">Daily Plan</a>
                        </div>
                        <div class="col text-center">
                            <a class="text-light m-auto" role="button" href="/pages/webWeeklyPlan.php">Weekly Plan</a>
                        </div>
                        <div class="col text-center">
                            <a class="text-light m-auto" role="button" href="/pages/webArchive.php">Archive</a>
                        </div>
                        <div class="col text-center">
                            <a class="text-light m-auto" role="button" href="/pages/webReports.php">Reports</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-3 text-center loginBtn m-auto">
                    <button class="btn btn-secondary rounded-pill">Login to Truck App</button>
                </div> -->
                <div class="col-3 text-center loginBtn m-auto">
                    <a href="/pages/mobileHome.html" class="btn btn-secondary rounded-pill">Login to Truck App</a>
                </div>
            </div>
        </footer>
    </div>

    <?php include 'footer.php' ?>