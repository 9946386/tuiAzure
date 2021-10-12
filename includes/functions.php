<?php

include '../local-db-connection.php';

// Function to loop through all drivers in driver table
// Adds the driver names to the buttons on Weekly Plan
function driverMenu()
{
    global $conn;
    $sql = "select usersID, userName from users";
    $results = mysqli_query($conn, $sql);
    //$drivers = mysqli_fetch_all($results, MYSQLI_ASSOC);

    while ($row = mysqli_fetch_assoc($results)) {
        echo "
            <div class='col text-center'>
                <input type='button' aria-pressed='true' name='driverNameBtn' class='btn btn-primary rounded-pill text-light' value='{$row['usersID']}. {$row['userName']}' />
            </div>";
    }
}

function dropDown()
{
    global $conn;
    $drivers = mysqli_query($conn, "SELECT usersID, userName FROM users");

    while ($data = mysqli_fetch_array($drivers)) {
        echo "<option value='" . $data['usersID'] . "'>" . $data['usersID'] . ': ' . $data['userName'] . "</option>";
    }
}

function emptyInputSignup($name, $email, $username, $password, $confirmPassword)
{
    $result = true;
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $confirmPassword)
{
    $result;
    if ($password !== $confirmPassword) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function UidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signupPage.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password)
{
    // Inserting new user info into users tables
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPW) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signupPage.php?error=stmt2failed");
        exit();
    }

    // Hashing password so that it's sercure and unreadable
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../pages/mobileHome.php");
}

function emptyInputLogin($username, $password)
{
    $result = true;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    // Checking if the user details already exsist in the database
    $uidExists = UidExists($conn, $username, $username);

    // Error handler
    if ($uidExists === false) {
        header("location: ../pages/loginPage.php?error=wrongLogin");
        exit();
    }

    // Putting the database password into a variable
    $passwordHashed = $uidExists["userPW"];
    // Checking password entered and database password are equal
    $checkPassword = password_verify($password, $passwordHashed);

    // If false the database pw and input pw are not the same
    if ($checkPassword === false) {
        header("location: ../pages/loginPage.php?error=wrongLogin");
        exit();
    }
    // 
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["userUid"];
        $_SESSION["usersname"] = $uidExists["userName"];
        header("location: ../pages/mobileHome.php?loginSuccessful");
        exit();
    }
}

function getUserJobs2()
{
    global $conn;

    // Checking if the session 'useruid' has started / Checking someone is logged in
    if (!isset($_SESSION['useruid'])) {
        // If no one is logged in:
        echo "You are not logged in";

    // Need to add button to redirect to login page
    }
    else {
        // If someone is logged in: 

        // Query to get users and open jobs data and link to logged in user
        $sql = mysqli_query($conn, "SELECT users.usersID, users.userName, openjobs.driver_fk
                                    FROM users
                                    INNER JOIN openjobs ON users.usersID = openjobs.driver_fk
                                    WHERE users.usersID = '" . $_SESSION['userid'] . "' ");

        while ($row = mysqli_fetch_assoc($sql)) {

            // Assigning variables to use when fetching allocated jobs
            $id = $row['usersID'];
            $name = $row['userName'];

            // Query to get open jobs and user info that are equal to the id of signed in user
            $jobs = mysqli_query($conn, "SELECT openJobs.openJobID, openjobs.jobName, openjobs.jobType, openjobs.orderNumber, openjobs.referenceNumber, openjobs.pallets, openjobs.jobWeight, openjobs.jobStatus, users.usersID, users.userName
                                          FROM openjobs
                                          INNER JOIN users ON openjobs.driver_fk = users.usersID
                                          WHERE users.usersID = $id");

            // While loop to loop through each job assigned to the user
            while ($row = mysqli_fetch_assoc($jobs)) {
                //$userID = $row['usersID'];
                $jobID = $row['openJobID'];
                $jobName = $row['jobName'];
                $jobType = $row['jobType'];
                $orderNumber = $row['orderNumber'];
                $referenceNumber = $row['referenceNumber'];
                $pallets = $row['pallets'];
                $jobWeight = $row['jobWeight'];
                $jobStatus = $row['jobStatus'];

                echo "
                        <div class='card mainPageJobCard mt-2'>              
                            <div class='card-body'>
                                <h5 class='card-title'>{$jobName}</h5>
                                <table class='table table-responsive'>
                                    <tbody>
                                        <tr>
                                            <th>Type:</th>
                                            <td>{$jobType}</td>
                                        </tr>
                                        <tr>
                                            <th>Order #:</th>
                                            <td>{$orderNumber}</td>
                                        </tr>
                                        <tr>
                                            <th>Reference:</th>
                                            <td>{$referenceNumber}</td>
                                        </tr>
                                        <tr>
                                            <th>Pallets:</th>
                                            <td>{$pallets}</td>
                                        </tr>
                                        <tr>
                                            <th>Weight:</th>
                                            <td>{$jobWeight}</td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td>{$jobStatus}</td>
                                        </tr>
                                    </tbody>                          
                                </table>
                                <div class='row'>
                                    <div class='col d-flex flex-row-reverse'>
                                    <a href='jobDetails.php?id={$jobs['openJobID']}' class='btn btn-primary text-light btn-sm'>View Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
            }
        }
    }
}

function enterHours()
{

    global $conn;

    if (isset($_POST['submit'])) {
        // Takes the input names from Add Job and assigns them to a variable
        $driver = $_POST[$_SESSION['userid']];
        $diesel = $_POST['diesel'];
        $hours = $_POST['hours'];
        $kms = $_POST['kms'];
        $mood = $_POST['mood'];

        // SQL query to insert the above variables into the openjobs table.
        $sql = "INSERT INTO driverhours(hoursDriver_FK, dieselLitres, driverHours, kms, mood) 
        VALUES ('$driver', '$diesel', '$hours', '$kms', '$mood');";

        $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (!$run) {
            echo '<script>console.log("Couldnt create entry")';
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        else {
            echo '<script>console.log("Success Bro!")</script>';
        }
    }

    header("Location: ../pages/mobileHome.php?jobadded=success");
}

function searchOrders()
{
    if (isset($_POST['submit'])) {

        global $conn;

        $searchValue = $_POST['search'];
        $sql = "SELECT * FROM completedJobs WHERE completedJobReferenceNumber OR completedJobOrderNumber LIKE '%$searchValue%'";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo $row['completedJobName'] . "<br>";
            echo $row['completedJobDate'] . "<br>";
            echo $row['completedJobDestination'] . "<br>";
            echo $row['completedJobType'] . "<br>";
            echo $row['completedJobOrdernumber'] . "<br>";
            echo $row['completedJobReferenceNumber'] . "<br>";
            echo $row['completedJobPallets'] . "<br>";
            echo $row['completedJobWeight'] . "<br>";
            echo $row['completedJobStatus'] . "<br>";
            echo $row['completedJobDriverName_fk'] . "<br>";
        }
        ;
    }

}

function getUserJobs()
{
    global $conn;

    // Checking if the session 'useruid' has started / Checking someone is logged in
    if (!isset($_SESSION['useruid'])) {
        // If no one is logged in:
        echo "You are not logged in";

    // Need to add button to redirect to login page
    }
    else {
        // If someone is logged in: 

        // Query to get users and open jobs data and link to logged in user
        $sql = "SELECT users.usersID, users.userName, openjobs.driver_fk
                                    FROM users
                                    INNER JOIN openjobs ON users.usersID = openjobs.driver_fk
                                    WHERE users.usersID = '" . $_SESSION['userid'] . "' ";

        $result1 = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result1);

        if ($user):

            // Assigning variables to use when fetching allocated jobs
            $id = $user['usersID'];
            $name = $user['userName'];

            // Query to get open jobs and user info that are equal to the id of signed in user
            $jobs = "SELECT openJobs.openJobID, openjobs.jobName, openjobs.jobType, openjobs.orderNumber, openjobs.referenceNumber, openjobs.pallets, openjobs.jobWeight, openjobs.jobStatus, users.usersID, users.userName
                                          FROM openjobs
                                          INNER JOIN users ON openjobs.driver_fk = users.usersID
                                          WHERE users.usersID = $id";

            $result = mysqli_query($conn, $jobs);

            $openjobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($openjobs as $openjob) {
                echo "
                        <div class='card mainPageJobCard mt-2'>              
                            <div class='card-body'>
                                <h5 class='card-title'> {$openjob['jobName']} </h5>
                                <table class='table table-responsive'>
                                    <tbody>
                                        <tr>
                                            <th>Type:</th>
                                            <td>{$openjob['jobType']}</td>
                                        </tr>
                                        <tr>
                                            <th>Order #:</th>
                                            <td>{$openjob['orderNumber']}</td>
                                        </tr>
                                        <tr>
                                            <th>Reference:</th>
                                            <td>{$openjob['referenceNumber']}</td>
                                        </tr>
                                        <tr>
                                            <th>Pallets:</th>
                                            <td>{$openjob['pallets']}</td>
                                        </tr>
                                        <tr>
                                            <th>Weight:</th>
                                            <td>{$openjob['jobWeight']}</td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td>{$openjob['jobStatus']}</td>
                                        </tr>
                                    </tbody>                          
                                </table>
                                <div class='row'>
                                    <div class='col d-flex flex-row-reverse'>
                                    <a href='jobDetails.php?id={$openjob['openJobID']}' class='btn btn-primary text-light btn-sm'>View Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
            }
            ;

        endif;

    }
}

function getCompletedJob()
{
    global $conn;

    // Checking if the session 'useruid' has started / Checking someone is logged in
    if (!isset($_SESSION['useruid'])) {
        // If no one is logged in:
        echo "You are not logged in";

    // Need to add button to redirect to login page
    }
    else {
        // If someone is logged in: 

        // Query to get users and open jobs data and link to logged in user
        $sql = "SELECT users.usersID, users.userName, completedjobs.completedJobsDriver_fk
                FROM users
                INNER JOIN completedjobs ON users.usersID = completedjobs.completedJobsDriver_fk
                WHERE users.usersID = '" . $_SESSION['userid'] . "' ";

        // Performing the query
        $result1 = mysqli_query($conn, $sql);
        print_r($result1);

        // Fetching results as an associative array
        $user = mysqli_fetch_assoc($result1);

        // If there is a logged in user in the array
        if ($user):
            // Assigning variables to use when fetching allocated jobs
            $id = $user['driver_fk'];
            $name = $user['driverName_fk'];

            // Query to get open jobs and user info that are equal to the id of signed in user
            $jobs = "SELECT completedjobs.completedJobID, completedjobs.completedJobName, completedjobs.completedJobType, completedjobs.completedOrderNumber, completedjobs.completedReferenceNumber, completedjobs.completedPallets, completedjobs.completedJobWeight, completedjobs.completedJobStatus, users.usersID, users.userName
                        FROM completedjobs
                        INNER JOIN users ON completedjobs.completedJobsDriver_fk = users.usersID
                        WHERE users.usersID = $id";

            // Performing the query
            $result = mysqli_query($conn, $jobs);

            // Fetching results as an associative array 
            $completedJobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Looping through all completed jobs
            foreach ($completedJobs as $completedJob) {
                echo "
                        <div class='card mainPageJobCard mt-2'>              
                            <div class='card-body'>
                                <h5 class='card-title'> {$completedJob['jobName']} </h5>
                                <table class='table table-responsive'>
                                    <tbody>
                                        <tr>
                                            <th>Type:</th>
                                            <td>{$completedJob['jobType']}</td>
                                        </tr>
                                        <tr>
                                            <th>Order #:</th>
                                            <td>{$completedJob['orderNumber']}</td>
                                        </tr>
                                        <tr>
                                            <th>Reference:</th>
                                            <td>{$completedJob['referenceNumber']}</td>
                                        </tr>
                                        <tr>
                                            <th>Pallets:</th>
                                            <td>{$completedJob['pallets']}</td>
                                        </tr>
                                        <tr>
                                            <th>Weight:</th>
                                            <td>{$completedJob['jobWeight']}</td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td>{$completedJob['jobStatus']}</td>
                                        </tr>
                                    </tbody>                          
                                </table>
                                <div class='row'>
                                    <div class='col d-flex flex-row-reverse'>
                                    <a href='completedJobDetails.php?id={$completedJob['openJobID']}' class='btn btn-primary text-light btn-sm'>View Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
            }
            ;

        endif;

    }

}
