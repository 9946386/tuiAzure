<!-- Includes mobile header at the top of the page -->
<?php include '../includes/mobileHeader.php' ?>

<!-- Page Title -->
<div class="container-sm text-dark px-3 p-2">
        <div class="row justify-content ">
            <h1 class="pageTitle col-5 align-self-center ">Job Details</h1>
            <div class="line col-1 "></div>
            <!-- Uses JavaScript to add todays date to the page -->
            <h6 class="todaysDate col-6 align-self-center" id="todaysDate"></h6>
        </div>
    </div>

    <div class="container bg-secondary vh-100 px-4 p-3 mainPageJobCardContainer darkMobileContainer">
        <div class="row gy-2">
            <div class="col-12">
                <div class="card mainPageJobCard">
                    <div class="card-body">
                      <h5 class="card-title">Upper Hutt Mega</h5>
                      <table class="table table-responsive">
                        <tbody>
                          <tr>
                            <th>Type:</th>
                            <td id="jobTypeData">Delivery</td>
                          </tr>
                          <tr>
                            <th>Order #:</th>
                            <td id="orderNumData">SEM173666</td>
                          </tr>
                          <tr>
                            <th>Reference:</th>
                            <td id="referenceData">TUI181500</td>
                          </tr>
                          <tr>
                            <th>Pallets:</th>
                            <td id="palletsData">18</td>
                          </tr>
                          <tr>
                            <th>Weight:</th>
                            <td id="weightData">17565</td>
                          </tr>
                          <tr>
                            <th>Status:</th>
                            <td id="statusData">Loaded</td>
                          </tr>                              
                        </tbody>                          
                      </table>
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
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>
