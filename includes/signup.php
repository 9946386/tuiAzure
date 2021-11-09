<?php

if (isset($_POST["submit"])) {

    // Taking the user inputs and assigning the to a variable
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Connecting to the database and the functions.php file
    require '../local-db-connection.php';
    require '../includes/functions.php';

    // Using the emptyInputSignup function to check if input is empty
    if (emptyInputSignup($name, $email, $username, $password, $confirmPassword) !== false) {
        header("location: ../pages/signupPage.php?error=emptyinput");
        exit();
    }

    // Using the invaludUid to check if the username meets the criterea
    if (invalidUid($username) !== false) {
        header("location: ../pages/signupPage.php?error=invalidUsername");
        exit();
    }

    // Using the invaludEmail to check if the email is valid
    if (invalidEmail($email) !== false) {
        header("location: ../pages/signupPage.php?error=invalidEmail");
        exit();
    }

    // Using the pwdMatch to check if the two passwords entered match
    if (pwdMatch($password, $confirmPassword) !== false) {
        header("location: ../pages/signupPage.php?error=passwordsdontmatch");
        exit();
    }

    // Using the UidExists to check if the username already exists
    if (UidExists($conn, $username, $email) !== false) {
        header("location: ../pages/signupPage.php?error=usernamealreadyused");
        exit();
    }

    // Using the createUser function to create the user and add to the database
    createUser($conn, $name, $email, $username, $password);

}