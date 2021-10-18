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
              <!-- If there are no jobs to show -->
                <?php else: ?>
                  <h5>This job is no longer open.</h5>
                <?php endif ?>
            </div>
          </div>
      </div> 

      <div class="container">
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
                <form method="post" action="" class="sigPad">
                  <label for="name" class="form-label">Print your name</label>
                  <input type="text" name="name" id="name" class="name">
                  <p class="drawItDesc">Draw your signature</p>
                  <!-- <ul class="sigNav"> -->
                    <!-- <li class="drawIt"><a href="#draw-it">Draw It</a></li> -->
                    <!-- <li class="clearButton"><a href="#clear">Clear</a></li> -->
                  <!-- </ul> -->
                  <div class="sig sigWrapper">
                    <div class="typed"></div>
                    <canvas class="pad" width="300" height="150"></canvas>
                    <input type="hidden" name="output" class="output">
                    <li class="clearButton btn" id="clearBtn"><a href="#clear" class="btn btn-secondary text-light">Clear</a></li>
                  </div>
                </div>
                  <div class="modal-footer">
                  <button type="submit">Confirm</button>
                </div>
                </form>                
              </div>
            </div>
          </div>


      <!-- This will be completed once the customer signature pad is working -->
      <div class="container px-4 p-3 ">
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
