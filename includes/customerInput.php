<?php
include '../local-db-connection.php';
session_start();

if (isset($_POST['submit'])) {

    $signature = json_decode('output');

    $customerName = $_POST['name'];
    $customerSignature = $_POST[$signature];





}