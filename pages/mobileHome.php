<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>
<?php include '../includes/mobileHeader.php' ?>

<?php 
session_start();
include '../local-db-connection.php'; 
?>

<!-- Page Title -->
    <div class="container-sm text-dark px-3 p-2">
        <div class="row justify-content ">
            <h1 class="pageTitle col-5 align-self-center ">To Complete</h1>
            <div class="line col-1 "></div>
            <h6 class="todaysDate col-6 align-self-center" id="todaysDate"></h6>
        </div>
    </div>

    <!-- Job Cards -->
    <div class="container px-4 p-3 mainPageJobCardContainer bg-secondary vh-100 darkMobileContainer">
        <div class="row gy-2">
            <div class="col-12">
                <div class="card mainPageJobCard">
                    <div class="card-body">
                      
                          <?php

if(!isset($_SESSION['useruid'])){
  echo "You are not logged in";
}
else{
  $sql = mysqli_query($conn, "SELECT * FROM drivers
                              INNER JOIN users ON drivers.userID_FK = users.usersID");
                              // WHERE drivers.userID_FK = '" . $_SESSION['useruid'] ."'"); 

  $userID = $row['userID_FK'];

  echo "User with ID: {$userID} is logged in";
  echo "2. User with ID: {$_SESSION['useruid']} is logged in";

  // while ($row = mysqli_fetch_assoc($sql)) {
  //   $jobName = $row['jobName'];
  //   $jobType = $row['jobType'];
  //   $orderNumber = $row['orderNumber'];
  //   $referenceNumber = $row['referenceNumber'];
  //   $pallets = $row['pallets'];
  //   $jobWeight = $row['jobWeight'];
  //   $jobStatus = $row['jobStatus'];
  
  //   echo "              <h5 class='card-title'>{$jobName}</h5>
  //                       <table class='table table-responsive'>
  //                         <tbody>
  //                           <tr>
  //                             <th>Type:</th>
  //                             <td>{$jobType}}</td>
  //                           </tr>
  //                           <tr>
  //                             <th>Order #:</th>
  //                             <td>{$orderNumber}</td>
  //                           </tr>
  //                           <tr>
  //                             <th>Reference:</th>
  //                             <td>{$referenceNumber}</td>
  //                           </tr>
  //                           <tr>
  //                             <th>Pallets:</th>
  //                             <td>{$pallets}</td>
  //                           </tr>
  //                           <tr>
  //                             <th>Weight:</th>
  //                             <td>{$jobWeight}</td>
  //                           </tr>
  //                           <tr>
  //                             <th>Status:</th>
  //                             <td>{$jobStatus}</td>
  //                           </tr>";
  
                          
  //   }
  //   echo "</tbody>                          
  //   </table>
  //   <div class='row'>
  //     <div class='col d-flex flex-row-reverse'>
  //       <a href='jobDetails.php' class='btn btn-primary text-light btn-sm'>View Job</a>
  //     </div>
  //   </div>
  // </div>
  // </div>
  // </div>
  // </div>
  // </div>";
  } ?>



    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>
