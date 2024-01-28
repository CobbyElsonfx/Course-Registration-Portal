<?php
session_start();
include('includes/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

include_once 'functions/progression.php';
include_once 'functions/reverse-progression.php';
include_once 'functions/sendEmail.php';

if (strlen($_SESSION['a_login']) == 0) {
    header('location:index.php');
} else {
    
?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin | Account Office Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <div class="wrapper">


            <div id="content">
                <?php 

function sendBatchPasswordResetEmails($batchEmails)
{
    foreach ($batchEmails as $batchEmail) {
        $message = 'Your portal has been activated!!, you may login to register for your courses';
        $subject = "Student Portal";
        sendEmail($batchEmail['email'], $subject  , $message);
    }
}
                if (isset($_POST['deactivate'])) {
                    $studentRegno = $_POST['studentRegno'];
                    $updateQuery = "UPDATE students SET cleared = 0 WHERE studentRegno = '$studentRegno'";
                    $updateResult = mysqli_query($con, $updateQuery);
                    echo '<script>
                    new Notify({
                        title: "Portal De-activation",
                        text: "Portal has been deactivated successfully",
                        autoclose: true,
                        autotimeout: 3000,
                        status: "success"
                    });
                </script>';;
                }
            
                if (isset($_POST['activate'])) {
                    $studentRegno = $_POST['studentRegno'];
            
                    $emailQuery = mysqli_query($con," SELECT * FROM students WHERE studentRegno = '$studentRegno'" );
                    $fetchrow = mysqli_fetch_assoc($emailQuery);
            
                    $updateQuery = "UPDATE students SET cleared = 1 WHERE studentRegno = '$studentRegno'";
                    $updateResult = mysqli_query($con, $updateQuery);
                    $message = 'Your portal has been activated!!, you may login to register for your courses';
                    $subject = "Student Portal";
                    sendEmail($fetchrow['email'], $subject, $message);
                    echo '<script>
                    new Notify({
                        title: "Portal activation",
                        text: "Portal has been activated successfully",
                        autoclose: true,
                        autotimeout: 3000,
                        status: "success"
                    });
                </script>';
                }
            
                if (isset($_POST['activateBatch'])) {
                    $level = $_POST["levelToReset"];
            
                    $selectedLevelQuery = mysqli_query($con, "SELECT * FROM students WHERE level = '$level' ");
            
                    // Batch email array
                    $batchEmails = array();
                    $hasError = false;
            
                    while ($selectedLevel = mysqli_fetch_array($selectedLevelQuery)) {
                        $studentEmail = $selectedLevel['email'];
                        // Add to batch email array
                        $batchEmails[] = array('email' => $studentEmail);
            
                    };
            
            
                    
                    $updateQuery = "UPDATE students SET cleared = 1 WHERE level = '$level'";
                    $updateResult = mysqli_query($con, $updateQuery);
                    sendBatchPasswordResetEmails($batchEmails);
                    // Send batch emails
                 
            
                    if ($hasError) {
                        echo '<script>
                            new Notify({
                                title: "Portal activation not successfull",
                                text: "Something went wrong",
                                autoclose: true,
                                autotimeout: 6000,
                                status: "error"
                            });
                        </script>';
                                    
                                    } else {
                                        echo '<script>
                            new Notify({
                                title: "Portal activation Completed",
                                text: "Students can now login into their portal",
                                autoclose: true,
                                autotimeout: 6000,
                                status: "success"
                            });
                        </script>';
                    }
            
                  
                }
            
                if (isset($_POST['deactivateBatch'])) {
                    $level = $_POST["levelToReset"];
            
            
                    $updateQuery = "UPDATE students SET cleared = 0 WHERE level = '$level'";
                    $updateResult = mysqli_query($con, $updateQuery);
                    echo '<script>alert("Portal  deactivated! for Selected Level!");</script>';
                }

                ?>


                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid ">


                        <h1 class="page-head-line text-bg-light p-4" style="color:white;">Account Office Dashboard</h1>

                        <button class=" accountLogoutBtn  btn-light bg-light getInTouch rounded-md mb-2 mb-lg-0">

                            <a  href="logout_account.php">
                                Logout
                            </a>
                        </button>


                    </div>
                </nav>
                <div class="page-instructions mx-5">
                    <strong>Instructions:</strong>
                    <p>
                    This page enables you to oversee student information, providing the capability to search for student details using parameters like index number and name. The Activate and Deactivate buttons facilitate the activation and deactivation of students' portals, respectively.

                    </p>


                </div>
                <div class="container d-flex justify-content-end mt-5">
                <a href="clearance.php">
                    <button class="cutomBtn    " data-bs-toggle="tooltip" data-bs-placement="top" title="refresh page">
                        <i class="fa fa-sync-alt"></i> Refresh
                    </button>
                </a>

            </div>

                <div class="row">
                    <div class="col-11 m-auto">

                        <div>

                            <div class="mt-5 ">
                                <div class="panel-body card">
                                    <div class="table-responsive table-bordered">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Reg No </th>
                                                    <th>Student Name </th>
                                                    <th>Level </th>
                                                    <th>Reg Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($con, "select * from students");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $cnt; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['studentRegno']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['surname'] . " " . $row['firstname'] . " " . $row['otherName']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['level']) ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['creationdate']); ?>
                                                        </td>
                                                        <td>
                                                            <form method="post" name="markClearedForm">
                                                                <input type="hidden" name="studentRegno" value="<?php echo htmlentities($row['studentRegno']); ?>">
                                                                <div class="d-flex justify-content-between">
                                                                    <button type="submit" name="deactivate" class="cutomBtn btn-danger">Deactivate</button>
                                                                    <button type="submit" name="activate" class="cutomBtn btn-success">Activate</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $cnt++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="warning-card col-11 mt-5 m-auto mb-5">
                        <div class="card-header">Warning</div>
                        <div class="card-body">
                            <div class="col-7">
                                <h5 class="card-title">Activate Portal for particular level</h5>
                                <p class="card-text">Pressing the "Activate" button initiates the bulk activation of portals for the selected level, while the "Deactivate" button triggers the deactivation of the portals. Kindly review the potential consequences before proceeding.</p>
                            </div>
                            <div class="col-5">
                                <form method="post">
                                    <div class="mx-3 d-flex form mb-3 justify-content-between">
                                        <label>Choose the Particular Level </label>
                                        <select class="form-control mx-2" style="width:40%" name="levelToReset">

                                            <option value="100">Level 100</option>
                                            <option value="200">Level 200</option>
                                            <option value="300">Level 300</option>
                                            <option value="400">Level 400</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" name="deactivateBatch" class="action-button btn-danger w-50 mx-1 ">Deactivate</button>
                                        <button type="submit" name="activateBatch" class="action-button btn-success w-50 mx-1">Activate</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <!-- Popper.JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                        $(this).toggleClass('active');
                    });
                });
            </script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
            <script>
                // DataTable initialization script
                $(document).ready(function() {
                    $('.table').DataTable();
                });
            </script>

    </html>
<?php } ?>