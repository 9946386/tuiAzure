<?php include '../includes/mobileHeader.php' ?>

<!-- Page Title -->
<div class="container-sm text-dark px-3 p-2">
        <div class="row justify-content ">
            <h1 class="pageTitle col-5 align-self-center ">Completed Jobs</h1>
            <div class="line col-1 "></div>
            <h6 class="todaysDate col-6 align-self-center" id="todaysDate"></h6>
        </div>
    </div>

    <!-- Job Cards -->
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
                      <div class="row">
                        <div class="col d-flex flex-row-reverse">
                          <a href="completedJobsDetails.php" class="btn btn-primary text-light btn-sm">View Job</a>
                        </div>
                      </div>
                  </div>
              </div>
            </div>

            <div class="col-12">
                <div class="card mainPageJobCard mt-2">
                    <div class="card-body">
                      <h5 class="card-title">Kapiti Mega</h5>
                      <table class="table table-responsive">
                        <tbody>
                          <tr>
                            <th>Type:</th>
                            <td id="jobTypeData">Delivery</td>
                          </tr>
                          <tr>
                            <th>Order #:</th>
                            <td id="orderNumData">SOM112677</td>
                          </tr>
                          <tr>
                            <th>Reference:</th>
                            <td id="referenceData">TUI181501</td>
                          </tr>
                          <tr>
                            <th>Pallets:</th>
                            <td id="palletsData">7</td>
                          </tr>
                          <tr>
                            <th>Weight:</th>
                            <td id="weightData">498.</td>
                          </tr>
                          <tr>
                            <th>Status:</th>
                            <td id="statusData">Loaded</td>
                          </tr>                              
                        </tbody>                          
                      </table>
                      <div class="row">
                        <div class="col d-flex flex-row-reverse">
                          <a href="pages/jobDetails.html" class="btn btn-primary text-light btn-sm">View Job</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>