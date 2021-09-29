<?php

include '../local-db-connection.php';

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