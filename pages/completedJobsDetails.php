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
  $sql = "SELECT completedjobs.completedJobID, completedjobs.completedJobName, completedjobs.completedJobDate, completedjobs.completedJobDestination, completedjobs.completedJobType, completedjobs.completedOrderNumber, completedjobs.completedReferenceNumber, completedjobs.completedPallets, completedjobs.completedJobWeight, completedjobs.completedJobStatus, completedjobs.completedJobDriverName_fk, customers.customerName, customers.customerSignature
          FROM completedjobs 
          INNER JOIN customers ON completedjobs.completedJobID = customers.completedJobID_fk
          WHERE completedjobs.completedJobID = $id";

  // Performing the query
  $result = mysqli_query($conn, $sql);

  // Fetching the results as an associative array
  $job = mysqli_fetch_assoc($result);

  //print_r($job);

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
              <h5 class="card-title"><?php echo htmlspecialchars($job['completedJobName']); ?></h5>
              <table class="table table-responsive">
              <tbody>
                <tr>
                  <th>Type:</th>
                  <td id="jobTypeData"><?php echo htmlspecialchars($job['completedJobType']); ?></td>
                </tr>
                <tr>
                  <th>Order #:</th>
                  <td id="orderNumData"><?php echo htmlspecialchars($job['completedOrderNumber']); ?></td>
                </tr>
                <tr>
                  <th>Reference:</th>
                  <td id="referenceData"><?php echo htmlspecialchars($job['completedReferenceNumber']); ?></td>
                </tr>
                <tr>
                  <th>Pallets:</th>
                  <td id="palletsData"><?php echo htmlspecialchars($job['completedPallets']); ?></td>
                </tr>
                <tr>
                  <th>Weight:</th>
                  <td id="weightData"><?php echo htmlspecialchars($job['completedJobWeight']); ?></td>
                </tr>
                <tr>
                  <th>Status:</th>
                  <td id="statusData"><?php echo htmlspecialchars($job['completedJobStatus']); ?></td>
                </tr>                              
              </tbody>                          
              </table>
              
            </div>
          </div>
      </div>     

      <!-- This will be completed once the customer signature pad is working -->
      <div class="container px-4 p-3 ">
          <div class="card mainPageJobCard">
              <div class="card-body">
                <table class="table table-responsive">
                  <tr>
                    <th>Customer Name:</th>
                    <td id="jobTypeData"><?php echo htmlspecialchars($job['customerName']); ?></td>
                  </tr>
                  <tr>
                    <th>Customer Signature:</th>
                    <td id="orderNumData"><?php echo htmlspecialchars($job['customerSignature']); ?></td>
                  </tr>
                </table>
              </div>
              <!-- If there are no jobs to show -->
              <?php else: ?>
                  <h5>This job is no longer available.</h5>
                <?php endif ?>
          </div>
      </div>
  </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>
