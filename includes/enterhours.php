<?php
include '../local-db-connection.php';

if (isset($_SESSION['useruid'])) {

    if (isset($_POST['submit'])) {

        $driver = $sql = mysqli_query($conn, "SELECT users.usersID
                                                FROM users
                                                WHERE users.usersID = '" . $_SESSION['userid'] . "' ");

        // Takes the input names from Add Job and assigns them to a variable
        $driver = $_SESSION['userid'];
        $diesel = $_POST['diesel'];
        $hours = $_POST['hours'];
        $kms = $_POST['kms'];
        $mood = $_POST['mood'];

        // SQL query to insert the above variables into the openjobs table.
        $sql = "INSERT INTO driverhours(hoursDriver_FK, dieselLitres, driverHours, kms, mood) 
        VALUES ('$driver', '$diesel', '$hours', '$kms', '$mood');";

        $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (!$run) {
            echo '<script>console.log("Couldnt create entry")';
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        else {
            echo '<script>console.log("Success Bro!")</script>';
        }
    }

}
// Taking code added to "Add Job" and inserts it into the openjob database
// If the submit button is set


header("Location: ../pages/mobileHome.php?jobadded=success");
?>