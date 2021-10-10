<?php ini_set('error_reporting', E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php ini_set('display_startup_errors', 1); ?>

<?php include '../includes/mobileHeader.php';
include '../local-db-connection.php';

// check GET request id param

if (isset($_GET['id'])) {

  //global $conn;
  $jobID = $_GET['id'];


  $id = mysqli_real_escape_string($conn, $_GET['id']);


  $sql = "SELECT * FROM openjobs WHERE openJobID = $id";


  $result = mysqli_query($conn, $sql);

  $job = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
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
              <?php else: ?>
                <h5>This job is no longer open.</h5>
              <?php endif ?>
          </div>
        </div>
    </div> 

      <div class="container px-4 customerInputContainer">
        <div class="row">
          <div class="col d-flex flex-row-reverse">
            <button type="button" class="btn btn-primary text-light " data-bs-toggle="modal" data-bs-target="#customerInput">Customer Input</button>
          </div>
        </div>

        <div class="modal fade" id="customerInput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Customer Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label for="customerName" class="form-label">Enter Name:</label>
            <input type="text" class="form-control" id="customerNameInput">
            <label for="customerSignature" class="form-label">Enter Signature:</label>

            <canvas id="signature-pad" width="200px" height="100%" style="border: 1px solid #ddd;"></canvas>
            <br>
            <button id="clear" class="btn btn-primary btn-sm text-light">Clear</button>
            <button type="button" class="btn btn-primary btn-sm text-light position-absolute ">Enter Photo</button>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary text-light">Save changes</button>
                <button type="button" class="btn btn-secondary text-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- <div class="card customerInputCard ">
            <div class="card-body">
            <label for="customerName" class="form-label">Enter Name:</label>
            <input type="text" class="form-control" id="customerNameInput">
            <label for="customerSignature" class="form-label">Enter Signature:</label>

            <div class="flex-row">
              <div class="wrapper"> <canvas id="signature-pad" width="400" height="200"></canvas> </div>
              <div class="clear-btn"> <button id="clear"><span> Clear </span></button> </div>
            </div>

            <canvas id="signature-pad" width="200px" height="100%" style="border: 1px solid #ddd;"></canvas>
            <br>
            <button id="clear" class="btn btn-primary btn-sm text-light">Clear</button>
            <textarea class="form-control" id="customerSignatureInput" rows="5"></textarea>
          </div>
        </div> -->
        <!-- <div class="container position-relative">
          <button type="button" class="btn btn-primary btn-sm text-light mt-3 position-absolute start-0">Enter Photo</button>
          <button type="button" class="btn btn-primary btn-sm text-light mt-3 position-absolute end-0">Submit</button>
        </div> -->
      </div>
    </div>

    <div class="d-flex flex-row-reverse">
      <button type="button" class="btn btn-primary text-light " data-bs-toggle="modal" data-bs-target="#customerInput">
        <a class="btn " href="../pages/enterHours.php">Complete Job</a>
      </button>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>