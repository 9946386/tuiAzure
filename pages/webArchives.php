<?php include '../header.php' ?>

<div class="container-sm text-dark px-3 p-4 searchInputs w-50">
        <div class="row m-auto align-items-center">
            <div class="col gy-3">
                <div class="row gx-3">
                    <h6 class="p-2">Con Note:</h6>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-pill" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="col gy-3">
                <div class="row gx-3">
                    <h6 class="p-2">Date:</h6>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-pill" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-secondary darkContainer">
        <div class="container py-5 px-4 p-3 webWeeklyPlanTruckCard ">
            <!-- <div class="row gy-2"> 
                <div class="col-12"> -->
                    <div class="card my-1">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col">
                                    <h3>Results</h1>
                                </div>
                                <div class="col d-flex flex-row-reverse">
                                    <button type="button" class="btn btn-primary text-light ">Export</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Results will show here</p>
                                </div>
                            </div>

                        </div>
                    </div>
                <!-- </div>
            </div> -->
        </div>
    </div>

    <?php include '../footer.php' ?>