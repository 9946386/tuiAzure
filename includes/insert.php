<?php

include_once '../connection.php';

if (isset($_POST['submit'])) 
{
    $firstName = $_POST['JobName'];
    $lastName = $_POST['JobDate'];
    $sql = "INSERT INTO testTable (firstName, lastName)
    VALUES ('$firstName', '$lastName')";

    if ($conn->query($sql) === TRUE) {
        include '../index.php';
        echo '<script>console.log("Success Bro!")</script>';
        echo "New record made";
    }
    else {
        echo '<script>console.log("Couldnt create entry")';
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>