<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/myTheme.css"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../styles/addedStyles.css">

    <link rel="manifest" href="../manifest.json">

    <!-- jQuery libraries for signature pad -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery UI library for touch-enabled devices -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>

    <link type="text/css" href="/styles/jquery.signature.css" rel="stylesheet"> 
    <script type="text/javascript" src="/JS/jquery.signature.js"></script>
    <!-- <script type="text/javascript" src="/JS/jquery.signature.min.js"></script> -->

    <title>Tui App Practice</title>
  </head>
  <body> 

    <!-- Pop Out Nav Bar -->
    
    <nav class="navbar navbar-light bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../pages/mobileHome.php">
              <img src="../images/navLogo.png" alt="navLogo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">Tui Truck App</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" onclick=""></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="../pages/mobileHome.php">Daily Plan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="../pages/completedJobs.php">Completed Jobs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="../pages/enterHours.php">Enter Hours</a>
                  </li>
                  <!-- Checking if the user is signed in -->
                  <?php
session_start();
// If they are signed in show sign out button
if (isset($_SESSION['useruid'])) {
  echo "<li class='nav-item'>
                            <a class='nav-link text-light' href='../includes/logout.php'>Sign Out</a>
                          </li>";
}
// If they are not signed in show a sign in button
else {
  echo "<li class='nav-item'>
                            <a class='nav-link text-light' href='../includes/loginPage.php'>Sign In</a>
                          </li>
                          <li class='nav-item'>
                            <a class='nav-link text-light' href='../includes/signupPage.php'>Sign Up</a>
                          </li>";
}
?>
                </ul>
              </div>
            </div>
        </div>
    </nav>

     <!-- Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script> -->
    
</body>
</html>