<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    require '../local-db-connection.php';
    require '../includes/functions.php';

    if (emptyInputSignup($name, $email, $username, $password, $confirmPassword) !== false) {
        header("location: ../pages/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../pages/signup.php?error=invalidUsername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../pages/signup.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($password, $confirmPassword) !== false) {
        header("location: ../pages/signup.php?error=passwordsdontmatch");
        exit();
    }

    if (UidExists($conn, $username, $email) !== false) {
        header("location: ../pages/signup.php?error=usernamealreadyused");
        exit();
    }

    createUser($conn, $name, $email, $username, $password);

}