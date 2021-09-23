<?php

// Database Variables 
$dbServerName = "tuiprojectserver.database.windows.net";
$dbUserName = "tuiprojectadmin";
$dbPassword = "TuiProjectPassword123";
$dbName = "tui-project-db";

$conn = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName) or die(mysqli_error($conn));

$jobResult = $conn->query("select * from OpenJobs") or die($conn->error);


}
