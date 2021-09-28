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

<?php include '/local-db-connection.php' ?>

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
