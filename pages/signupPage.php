<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?> 

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
    <link rel="stylesheet" href="/styles/myTheme.css"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="/styles/addedStyles.css">

    <title>Sign Up</title>

</head>
<body class="signupbody">

    <div class="container-fluid loginBackground min-vh-100">
        <div class="container w-75 min-vh-100 loginContainer d-flex align-items-center justify-content-center">
            <div class="row align-items-center">
                <div class="row pb-5">
                    <div class="col-6 align-self-center mx-auto">
                        <img src="/images/loginImage.png" alt="Tui Logo">
                    </div>
                </div>
                <div class="row">
                    <h1 class="pb-3 text-light">Sign Up</h1>
                    <form action="../includes/signup.php" method="POST" class="form-group">
                        <div class="row pb-2">
                            <p class="text-light">Name:</p>
                            <input type="text" class="rounded-pill border border-white ms-3 form-control" name="name"></input>
                        </div>
                        <div class="row pb-2">
                            <p class="text-light">Email:</p>
                            <input type="text" class="rounded-pill border border-white ms-3 form-control" name="email"></input>
                        </div>
                        <div class="row pb-2">
                            <p class="text-light">Username:</p>
                            <input type="text" class="rounded-pill border border-white ms-3 form-control" name="username"></input>
                        </div>
                        <div class="row pb-2">
                            <p class="text-light">Password:</p>
                            <input type="password" class="rounded-pill border border-white ms-3 form-control" name="password"></input>
                        </div>
                        <div class="row pb-2">
                            <p class="text-light"> Confirm Password:</p>
                            <input type="password" class="rounded-pill border border-white ms-3 form-control" name="confirmPassword"></input>
                        </div>
                        <div class="row mt-2 d-flex form-group">
                            <input type="submit" class="btn btn-secondary text-light ms-3" name="submit" value="Sign Up">
                        </div>
                        <div class="row mt-4 d-flex">
                            <p class="col-8 text-light"> Already have an account?</p>
                            <a href="../pages/loginPage.php" class="btn btn-secondary text-light col-4">Login</a>
                        </div>
                        <?php
// Error messages that will show below form input feilds if user input is invalid
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Please fill in all fields</p>";
    }
    else if ($_GET["error"] == "invalidUsername") {
        echo "<p>Please choose a valid username</p>";
    }
    else if ($_GET["error"] == "invalidEmail") {
        echo "<p>Please choose a valid email</p>";
    }
    else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords don't match</p>";
    }
    else if ($_GET["error"] == "usernamealreadyused") {
        echo "<p>That username is already in use. Please try another username.</p>";
    }
    else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong. Please try again</p>";
    }
    else if ($_GET["error"] == "none") {
        echo "<p>Success!</p>";
    }
}
?>
                    </form>  
                       
                </div>
            </div>            
        </div>        
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="/JS/app.js"></script>
    <script src="/JS/ui.js"></script>
  
</body>
</html>