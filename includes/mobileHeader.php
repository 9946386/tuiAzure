
<!-- Starting a session so that the logged in users information is accessible -->
<?php
session_start();
include '../local-db-connection.php';
?>

<!-- Mobile Header section to be added to all mobile pages -->

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

    <!-- Link to manifest file for PWA functionality -->
    <link rel="manifest" href="../manifest.json">

    <title>Tui Truck App</title>
  </head>
  <body> 

    <!-- Pop Out Nav Bar -->
    
    <nav class="navbar navbar-light bg-primary fixed-top py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="../pages/mobileHome.php">
              <img src="../images/navLogo.png" alt="navLogo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="offcanvas offcanvas-end bg-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h1 class="offcanvas-title text-light display-3" id="offcanvasNavbarLabel">Tui Truck App</h1>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" onclick=""></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <!-- Checking if the user is signed in -->
                <?php
if (isset($_SESSION['useruid'])) {
  // If they are signed in show all buttons and sign out button
  echo "<li class='nav-item'>
      <a class='nav-link text-light h6 display-4' aria-current='page' href='../pages/mobileHome.php?username={$_SESSION['useruid']}id={$_SESSION["userid"]}'>Daily Plan</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link text-light h6 display-4' href='../pages/completedJobs.php?username={$_SESSION['useruid']}id={$_SESSION["userid"]}'>Completed Jobs</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link text-light h6 display-4' href='../pages/enterHours.php?username={$_SESSION['useruid']}id={$_SESSION["userid"]}'>Enter Hours</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link text-light h6 display-4' href='../includes/logout.php'>Sign Out</a>
      </li>";
}
// If they are not signed in show a sign in button
else {
  echo "<li class='nav-item'>
                            <a class='nav-link text-light h6 display-4' href='../pages/loginPage.php'>Login</a>
                          </li>
                          <li class='nav-item'>
                            <a class='nav-link text-light h6 display-4' href='../pages/signupPage.php'>Sign Up</a>
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