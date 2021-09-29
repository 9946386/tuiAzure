<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/myTheme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="/styles/addedStyles.css">

    <title>Web - Daily Plan</title>
</head>

<body>

    <!-- Header -->
    <header class="w-100">
        <div class="container-fluid bg-primary top-0 h-auto" id="header">
            <a href="index.php" class="btn">
                <div class="row text-center">
                    <img src="/images/WebLogo.png" alt="Tui Logo" class="h-100 p-4 mx-auto">
            </a>
        </div>
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary webNavBar" id="navbar_top">
            <div class="container-fluid ">
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-5 ">
                            <a class="nav-link active text-light" aria-current="page" href="/index.php">Daily Plan</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-light" href="/pages/webWeeklyPlan.php">Weekly Plan</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-light" href="/pages/webArchives.php">Archives</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-light" href="/pages/webReports.php">Reports</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

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
                <?php include 'includes/indexFunction.php';
openJobsList(); ?> 
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="/JS/app.js"></script>
    <script src="/JS/ui.js"></script>


</body>

</html>