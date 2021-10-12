<!-- Including the mobile header at the top of the page -->
<?php include '../includes/mobileHeader.php';
// Including the connection file
include '../local-db-connection.php'; ?>

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
            <?php
if (isset($_GET['id'])) {
    $userID = $_GET['id'];
    // $userName = $_GET['username'];

    print_r($userID);
// print_r($userName);
}
?>
            <!-- Form that uses the enterhours.php to take the form input and enter it into the database -->
            <form action="../includes/enterhours.php" method="POST" class="form-group">
            <!-- <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">Driver ID:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="driver">
                    </div>
                </div> -->
                <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">Diesel Litres:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="diesel">
                    </div>
                </div>
                <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">Hours:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="hours">
                    </div>
                </div>
                <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">KMs:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="kms">
                    </div>
                </div>
                <div class="row gy-2 p-2">
                    <div class="col-5">
                        <h4 class="diesel">Mood:</h1>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" placeholder="Rating 1-10" name="mood">
                    </div>
                </div>
                <div class="row gy-2 p-2 justify-content-end">
                    <div class="col-3 ">
                        <button type="submit" class="btn btn-primary text-light" name="submit">Confirm</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../JS/app.js"></script>
    <script src="../JS/ui.js"></script>