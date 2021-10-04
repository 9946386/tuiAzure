<?php

// Checking if the submit button from login has been clicked
if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $passowrd = $_POST["password"];

    require_once '../local-db-connection.php';
    require_once '../includes/functions.php';

    // Error handlers 
    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../pages/loginPage.php?error=emptyinput");
        exit();
    }

    // Login function
    loginUser($conn, $username, $password);

}
// If invalid send back to login form
else {
    header("location: ../pages/loginPage.php");
    // Exit the script
    exit();
}