<?php
include '../local-db-connection.php';
session_start();

//This needs to be moved to the php page and wrap around the whole hours form - the rest of the code stays here
if (isset($_SESSION['useruid'])) {

    // If the submit button is set
    if (isset($_POST['submit'])) {

        // Get driver ID from the users table
        $driver = $sql = mysqli_query($conn, "SELECT users.usersID
                                                FROM users
                                                WHERE users.usersID = '" . $_SESSION['userid'] . "' ");

        // Takes the input names from Enter Hours and assigns them to a variable
        // Driver ID is set by the session variable userid that gets details from logged in user
        // This automatically assigns the hours input to the logged in user
        $driverID = $_SESSION['userid'];
        $diesel = $_POST['diesel'];
        $hours = $_POST['hours'];
        $kms = $_POST['kms'];
        $mood = $_POST['mood'];
        $date = date('Y-m-d H:i:s');

        require '../includes/functions.php';

        if (emptyInput($diesel, $hours, $km, $mood) !== false) {
            header("location: ../pages/enterHours.php?error=emptyinput");
            exit();
        }

        if (invalidEntryHours($diesel, $hours, $km, $mood) !== false) {
            header("location: ../pages/enterHours.php?error=invalidentry");
            exit();
        }

        // SQL query to insert the above variables into the openjobs table.
        $sql = "INSERT INTO driverhours(hoursDriver_FK, hoursDate, dieselLitres, driverHours, kms, mood) 
        VALUES ('$driverID', '$date', '$diesel', '$hours', '$kms', '$mood');";

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
else {
    echo "You are not logged in";
}

header("Location: ../pages/mobileHome.php?jobadded=success");
?>