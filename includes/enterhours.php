<?php
include '../local-db-connection.php';

// Taking code added to "Add Job" and inserts it into the openjob database
// If the submit button is set
if (isset($_POST['submit'])) 
{
    // Takes the input names from Add Job and assigns them to a variable
    $diesel = $_POST['diesel'];
    $hours = $_POST['hours'];
    $kms = $_POST['kms'];
    $mood = $_POST['mood'];

    // SQL query to insert the above variables into the openjobs table.
    $sql = "INSERT INTO driverhours(hoursDriver_FK, dieselLitres, driverHours, kms, mood) 
    VALUES (NULL, '$diesel', '$hours', '$kms', '$mood');";

    $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (!$run) {
        echo '<script>console.log("Couldnt create entry")';
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    else {
        echo '<script>console.log("Success Bro!")</script>';
    }
}

header("Location: ../index.php?jobadded=success");
?>