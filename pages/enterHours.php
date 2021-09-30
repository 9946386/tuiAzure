<?php include '../includes/mobileHeader.php' ?>

<!-- Page Title -->
<div class="container-sm text-dark px-3 p-2">
        <div class="row justify-content ">
            <h1 class="pageTitle col-5 align-self-center ">Enter Hours</h1>
            <div class="line col-1 "></div>
            <h6 class="todaysDate col-6 align-self-center" id="todaysDate"></h6>
        </div>
    </div>

    <!-- Hours Card -->
    <div class="container bg-secondary vh-100 px-4 p-3 enterHoursCard darkMobileContainer ">
        <div class="card mainPageJobCard">
            <div class="card-body">

                <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">Diesel Litres:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">Hours:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">KMs:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">Mood:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" placeholder="Rating 1-10">
                    </div>
                </div>
                <div class="row gy-2 p-2 justify-content-end">
                    <div class="col-3 ">
                        <button type="button" class="btn btn-primary text-light">Confirm</button>
                    </div>
                </div>
            </div>

        </div>

    </div>