<?php

if (isset($_POST['completed'])) {
    $sql = "INSERT INTO completedjobs 
                      SELECT * FROM openjobs WHERE id=$id";

    header('../pages/mobileHome.php');
}

?>