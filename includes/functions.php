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

function dropDown()
{
    global $conn;
    $drivers = mysqli_query($conn, "SELECT driverName FROM driver");

    while ($data = mysqli_fetch_array($drivers)) {
        // $id = $row['DriverID'];
        // $name = $row['driverName'];

        echo "<option value='" . $data['$name'] . "'>" . $data['$name'] . "</option>";
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

function UidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signupPage.php?error=stmtfailed");
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

function createUser($conn, $name, $email, $username, $password)
{
    // Inserting new user info into users tables
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPW) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signupPage.php?error=stmt2failed");
        exit();
    }

    // Hashing password so that it's sercure and unreadable
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../pages/mobileHome.php");
}

function emptyInputLogin($username, $password)
{
    $result = true;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    $uidExists = UidExists($conn, $username, $username);

    // Error handler
    if ($uidExists === false) {
        header("location: ../pages/loginPage.php?error=wrongLogin");
        exit();
    }

    $passwordHashed = $uidExists["userPW"];
    $checkPassword = password_verify($password, $passwordHashed);

    // If false the database pw and input pw are not the same
    if ($checkPassword === false) {
        header("location: ../pages/loginPage.php?error=wrongLogin");
        exit();
    }
    // 
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["userUid"];
        $_SESSION["driver_id"] = "usersID";
        header("location: ../pages/mobileHome.php?loginSuccessful");
        exit();
    }
}