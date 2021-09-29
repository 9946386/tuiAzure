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