<?php include '../includes/mobileHeader.php' ?>

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
                          <a href="jobDetails.php" class="btn btn-primary text-light btn-sm">View Job</a>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </dib>
