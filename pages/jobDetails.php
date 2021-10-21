<!-- PHP errors -->
<?php //ini_set('error_reporting', E_ALL); ?>
<?php //ini_set('display_errors', 1); ?>
<?php //ini_set('display_startup_errors', 1); ?>

<!-- Including the mobile header at top of page -->
<?php include '../includes/mobileHeader.php';
// Including the connection file
include '../local-db-connection.php';

// check GET request id param
// Getting the number that comes after 'id=' in the url
if (isset($_GET['id'])) {

  //global $conn;
  $jobID = $_GET['id'];

  // Takes away any special characters in the string
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // Select statement to get all the jobs linked to the id number passed through the url
  $sql = "SELECT * FROM openjobs WHERE openJobID = $id";

  

  // Performing the query
  $result = mysqli_query($conn, $sql);

  // Fetching the results as an associative array
  $job = mysqli_fetch_assoc($result);

  // Frees the memory associated with the results
  mysqli_free_result($result);
  // Closing connectiong
  // mysqli_close($conn);


}
?>

<!-- JS -->
    <!--[if lt IE 9]><script src="/Signature/flashcanvas.js"></script><![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../Signature/jquery.signaturepad.js"></script>
    <script src="../Signature/json2.min.js"></script>
    <link rel="stylesheet" href="../Signature/jquery.signaturepad.css">

    <script>
          $('.sigPad').signaturePad(options);
    </script>

<!-- Page Title -->
<div class="container-sm text-dark px-3 p-2">
      <div class="row justify-content ">
          <h1 class="pageTitle col-5 align-self-center ">Job Details</h1>
          <div class="line col-1 "></div>
          <h6 class="todaysDate col-6 align-self-center" id="todaysDate"></h6>
      </div>
  </div>

  <div class="position-relative container">
    <!-- Job Card -->
    <div class="container-fluid bg-secondary h-100 darkMobileContainer">
      <div class="container px-4 p-3 mainPageJobCardContainer ">
        <div class="card mainPageJobCard">
          <div class="card-body">
            <!-- If there are any jobs from above query -->
            <!-- Take the results and put them into the table - Uses htmlspecialchars to change any special characters to html -->
            <?php if($job): 
              $jobsID = $job['openJobID'];

              ?>
              <h5 class="card-title"><?php echo htmlspecialchars($job['jobName']); ?></h5>
              <table class="table table-responsive">
              <tbody>
                <tr>
                  <th>Type:</th>
                  <td id="jobTypeData"><?php echo htmlspecialchars($job['jobType']); ?></td>
                </tr>
                <tr>
                  <th>Order #:</th>
                  <td id="orderNumData"><?php echo htmlspecialchars($job['orderNumber']); ?></td>
                </tr>
                <tr>
                  <th>Reference:</th>
                  <td id="referenceData"><?php echo htmlspecialchars($job['referenceNumber']); ?></td>
                </tr>
                <tr>
                  <th>Pallets:</th>
                  <td id="palletsData"><?php echo htmlspecialchars($job['pallets']); ?></td>
                </tr>
                <tr>
                  <th>Weight:</th>
                  <td id="weightData"><?php echo htmlspecialchars($job['jobWeight']); ?></td>
                </tr>
                <tr>
                  <th>Status:</th>
                  <td id="statusData"><?php echo htmlspecialchars($job['jobStatus']); ?></td>
                </tr>                              
              </tbody>                          
            </table>
            <!-- If there are no jobs to show -->
              <?php //else: ?>
                <!-- <h5>This job is no longer open.</h5> -->
              <?php //endif ?>
          </div>
        </div>
        <!-- Button to complete the job which will then send the table entry from openjobs to completedjobs -->
        <!-- <div class="d-flex flex-row-reverse">
          <form action="" method="POST">
            <button name="completed" type="submit" class="btn btn-primary text-light mt-4">Complete Job</button>
          </form>
        </div> -->
    </div> 

    

    

    <div class="container">
      <!-- Button to show customer input modal -->
      <button type="button" class="btn btn-primary w-50 float-end text-light" data-bs-toggle="modal" data-bs-target="#customerModal">
        Customer Input
      </button>
    </div>

    

    <!-- <div class="modal"> -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Customer Input</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Customer input form -->
          <form method="POST" action="" class="sigPad">
            <label for="name" class="form-label">Print your name</label>
            <input type="text" name="name" id="name" class="name">
            <p class="drawItDesc">Draw your signature</p>
            <div class="sig sigWrapper">
              <div class="typed"></div>
              <canvas class="pad" width="300" height="150"></canvas>
              <!-- Hidden output of signature pad -->
              <input type="hidden" name="output" class="output">
              <li class="clearButton btn" id="clearBtn"><a href="#clear" class="btn btn-secondary text-light">Clear</a></li>
            </div>
          </div>
            <div class="modal-footer">
            <button type="submit" name="submit">Confirm</button>
          </div>
          </form>                
        </div>
      </div>
    </div>

    <div class="position-absolute bottom-0 end-0 m-4">
      <form action="" method="POST">
        <button name="completed" type="submit" class="btn btn-primary text-light mt-4">Complete Job</button>
      </form>
    </div>
              

    <?php  
  
      if(isset($_POST['completed']) && isset($_GET['id'])){

        $jobID2 = $_GET['id'];
        print_r($jobID2);
        global $conn;     
        // Takes away any special characters in the string
        // $id2 = mysqli_real_escape_string($conn, $_GET['id']);

        // Moving selected job to completed jobs table
        $sql2 = "INSERT INTO completedjobs (completedJobID, completedJobName, completedJobDate, completedJobDestination, completedJobType, completedOrderNumber, completedReferenceNumber, completedPallets, completedJobWeight, completedJobStatus, completedJobDriver_fk, completedJobDriverName_fk, completedJobDriverUserName_fk) 
                    SELECT $jobsID, jobName, jobDate, destination, jobType, orderNumber, referenceNumber, pallets, jobWeight, jobStatus, driver_fk, driverName_fk, driverUserName_fk FROM openjobs WHERE openJobID = $jobID2"; 
                    mysqli_query($conn, $sql2); 
            echo "<script>console.log('Job moved to completed jobs')</script>";
                        
        // Deleting it from the openjobs table
        $deleteColumn = "DELETE FROM openjobs WHERE openJobID = $jobID2";
                    mysqli_query($conn, $deleteColumn);
            echo $job['jobName'] . " has been completed and has moved to Completed Jobs";
      }
      //header("Location: ../pages/mobileHome.php");
  
  ?>

    <!-- If there are no jobs to show -->
    <?php else: ?>
      <h5>This job is no longer open.</h5>
    <?php endif ?>

    <!-- <div class="container">
      <div class="d-flex align-items-end flex-column bd-highlight mb-3">
          <form action="" method="POST">
              <button name="completed" type="submit" class="btn btn-primary text-light pt-4 mt-auto bd-highlight">Complete Job</button>
          </form>
      </div>
    </div> -->
     <?php

if(isset($_POST['submit']) && isset($_GET['id'])){

    // Using a file with functions that help convert json to image
    require_once '../includes/signature-to-image.php';

    // Assigning input to variables
    $customerName = $_POST['name'];
    $customerSignature = filter_input(INPUT_POST, 'output', FILTER_UNSAFE_RAW);
    $jobsID = $_GET['id'];

    // Taking input and converting it to an image (Don't think it's working)
    $sigImg = sigJsonToImage($customerSignature);
    
    //$file = 'test.png';
    $theimage = imagepng($sigImg);
    
    // Insert into the customer table
    $sql = "INSERT INTO customers(customerName, customerSignature, completedJobID_fk)
            VALUES ('$customerName', '$sigImage', '$jobsID')";

    $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (!$run) {
      echo '<script>console.log("Couldnt create entry")';
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    else {
        echo '<script>console.log("Success Bro!")</script>';
    } 
    
}
?>
      </div>
    </div>
    </div>

    <!-- JavaScript for the customer Signature Pad -->
    <script>
      $(document).ready(function () {
        $('.sigPad').signaturePad({drawOnly:true});
      });

      $(document).ready(function () {
        $('.sigPad').signaturePad();
      });
    </script>

    <script src="../Signature/json2.min.js"></script>     

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>