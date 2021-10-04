<?php

include '../local-db-connection.php';

// Function to loop through all drivers in driver table
// Adds the driver names to the buttons on Weekly Plan
function driverMenu()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM driver");

    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['DriverID'];
        $name = $row['driverName'];

        echo "<div class='col text-center'>
                <button class='btn btn-primary rounded-pill text-light'>{$name}</button>
                </div>";
    }
}

function emptyInputSignup($name, $email, $username, $password, $confirmPassword)
{
    $result = true;
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $confirmPassword)
{
    $result;
    if ($password !== $confirmPassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function UidExists($conn, $usename, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $password)
{
    // Inserting new user info into users tables
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPW) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }

    // Hashing password so that it's sercure and unreadable
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../pages/webHome.php");
}