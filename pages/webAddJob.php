<?php
include_once '/includes/dbh.php';
?>

<!DOCTYPE html>
<html>

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

    <title>Web - Add Job</title>
</head>

<body>

    <?php
    include_once '/includes/dbh.php';
    ?>

    <!-- Header -->
    <header class="w-100">
        <div class="container-fluid bg-primary top-0 h-auto">
            <a href="/index.html" class="btn">
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
                            <a class="nav-link active text-light" aria-current="page" href="/index.html">Daily Plan</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-light" href="/pages/webWeeklyPlan.html">Weekly Plan</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-light" href="/pages/webArchives.html">Archives</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link text-light" href="/pages/webReports.html">Reports</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Title -->
    <div class="container-sm text-dark px-3 p-4 truckList">
        <div class="row m-auto align-items-center">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Truck 1
                </button>
                <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Truck 2</a>
                    <a class="dropdown-item" href="#">Truck 3</a>
                    <a class="dropdown-item" href="#">Truck 4</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-secondary darkContainer">
        <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard">
            <div class="card w-75 m-auto">
                <div class="card-body">
                    <form action="/includes/insert.php" method="POST" name="insert" class="form-group">
                        <div class="row gy-5 form-group">
                            <div class="col-2">
                                <label for="addJobName" class="form-label p-1">Name:</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control p-1" name="JobName" value="Enter Date" id="JobName">
                            </div>
                        </div>
                        <div class="row gy-5 form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Date:</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control p-1" name="JobDate" value="Enter Date" id="JobDate">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Destination:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control p-1" name="Destination" value="Enter Destination" id="Destination">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Type:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="JobType" value="Enter Type" id="JobType">
                            </div>
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Order #:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="OrderNumber" value="Enter Order Number" id="OrderNumber">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Reference:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="ReferenceNumber" value="Enter Reference" id="ReferenceNumber">
                            </div>
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Pallets:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="Pallets" value="Enter Pallets" id="Pallets">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Weight:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="JobWeight" value="Enter Weight" id="JobWeight">
                            </div>
                            <div class="col-2">
                                <label for="addJobDate" class="form-label p-1">Status:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control p-1" name="JobStatus" value="Enter Status" id="JobStatus">
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

    <!-- Footer -->
    <div class="container-fluid bg-primary p-4">
        <footer class="webFooter">
            <div class="row w-75 m-auto align-items-center">
                <div class="col-3 text-center">
                    <a href="/index.html">
                        <img src="/images/navLogo.png" alt="footerImg">
                    </a>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col text-center">
                            <a class="text-light m-auto" role="button" href="/index.html">Daily Plan</a>
                        </div>
                        <div class="col text-center">
                            <a class="text-light m-auto" role="button" href="/pages/webWeeklyPlan.html">Weekly Plan</a>
                        </div>
                        <div class="col text-center">
                            <a class="text-light m-auto" role="button" href="/pages/webArchive.html">Archive</a>
                        </div>
                        <div class="col text-center">
                            <a class="text-light m-auto" role="button" href="/pages/webReports.html">Reports</a>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center loginBtn m-auto">
                    <button class="btn btn-secondary rounded-pill">Login to Truck App</button>
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