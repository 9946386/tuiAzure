<!-- PHP errors -->
<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

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
  $sql = "SELECT * FROM completedjobs WHERE completedJobID = $id";

  // Performing the query
  $result = mysqli_query($conn, $sql);

  // Fetching the results as an associative array
  $job = mysqli_fetch_assoc($result);

  print_r($job);

  // Frees the memory associated with the results
  mysqli_free_result($result);
  // Closing connectiong
  mysqli_close($conn);

}
?>

<!-- Page Title -->
<div class="container-sm text-dark px-3 p-2">
      <div class="row justify-content ">
          <h1 class="pageTitle col-5 align-self-center ">Job Details</h1>
          <div class="line col-1 "></div>
          <h6 class="todaysDate col-6 align-self-center" id="todaysDate"></h6>
      </div>
  </div>

    <!-- Job Card -->
    <div class="container bg-secondary vh-100 darkMobileContainer">
      <div class="container px-4 p-3 mainPageJobCardContainer ">
        <div class="card mainPageJobCard">
          <div class="card-body">
            <!-- If there are any jobs from above query -->
            <!-- Take the results and put them into the table - Uses htmlspecialchars to change any special characters to html -->
            <?php if($job): ?>
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
                <?php else: ?>
                  <h5>This job is no longer open.</h5>
                <?php endif ?>
            </div>
          </div>
      </div> 


      <div class="col-12">
          <div class="card mainPageJobCard">
              <div class="card-body">
                  <label for="customerName" class="form-label">Customer Name:</label>
                  <input type="text" class="form-control" id="customerNameInput" placeholder="Customers name will be here">
                  <label for="customerSignature" class="form-label">Customer Signature:</label>
                  <br>
                  <canvas id="signature-pad" width="200%" height="100%" style="border: 1px solid #ddd;"></canvas>
                  <br>
                  <button id="editCompletedJobDetails" class="btn btn-primary text-light float-end">Edit</button>
              </div>
          </div>
      </div>
  </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>
