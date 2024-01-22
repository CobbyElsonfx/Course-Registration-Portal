<?php
session_start();
include('includes/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 

error_reporting(1);

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // Code for Deletion
    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from students where studentRegno = '" . $_GET['id'] . "'");
        echo '<script>alert("Student Record Deleted Successfully !!")</script>';
        echo '<script>window.location.href=manage-students.php</script>';
    }

    // Code for Password Reset
    if (isset($_GET['pass'])) {
        // Function to generate a random password
        function generateRandomPassword($length = 8)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $password;
        }

        // Generate a random password
        $randomPassword = generateRandomPassword();

        $newpass = md5($randomPassword);
        mysqli_query($con, "update students set password='$newpass' where studentRegno = '" . $_GET['id'] . "'");
        echo '<script>alert("Password Reset. New Password is ' . $randomPassword . '")</script>';
        echo '<script>window.location.href=manage-students.php</script>';
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

<!-- Add NProgress JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!-- Add the DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="../assets/css/admin_side_nav.css" rel="stylesheet" />
    <title>Admin | Manage Students</title>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php if ($_SESSION['alogin'] != "") {
            include('includes/menubar.php');
        }
        ?>

        <!-- Page Content Holder -->
        <div id="content">

            <div aria-live="polite" aria-atomic="true" class="position-relative">

                <div class="toast-container position-absolute top-0 end-0 p-3">

                    <!-- Then put toasts within -->
                    <div class="toast" data-bs-delay="10000" id="customToast" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">Bootstrap</strong>
                            <small class="text-muted">just now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">

                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid ">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>


                </div>
            </nav>


            <div class="page-instructions">
                <strong>Instructions:</strong>
                <p>
                    This page allows you to manage student details. You can search for student information using
                    parameters
                    such as index number and name. Edit student details, delete , progress, and repeat students buttons
                    are
                    among the available options. Additionally, batch progression and reversal can be performed at the
                    beginning
                    of the year.
                </p>
                <strong>Important:</strong>
                <p>
                    Please use this page with care. Avoid unnecessary page refreshes, and be cautious when performing
                    irreversible actions. Batch progression and reversal should only be done at the start of the
                    academic year.
                </p>
            </div>

            <!-- Caution Message -->
            <div class="caution-message">
                <strong>Caution:</strong> The following buttons require careful handling. Ensure you understand the
                implications before clicking. 1. Delete , 2. Progress , 3. Repeat
            </div>


            <div>
                <font color="red" align="center">
                    <?php echo htmlentities($_SESSION['delmsg']); ?>
                    <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                </font>
                <div class=" row">
                    <!--    Bordered Table  -->
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
                                                    <div class="d-flex flex-row align-items-center">
                                                        <a
                                                            href="edit-student-profile.php?id=<?php echo $row['studentRegno'] ?>">
                                                            <button class="btn btn-primary"><i class="fa fa-edit "></i>
                                                                Edit</button>
                                                        </a>

                                                        <!-- Form for individual progression -->
                                                        <!-- Form for individual reversal -->
                                                        <form method="get" action="manage-students.php">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $row['studentRegno']; ?>">
                                                            <input type="hidden" name="reverse" value="update">
                                                            <button type="submit" class="reverseBtn mt-1"><i
                                                                    class="fa fa-backward"></i> </button>
                                                        </form>

                                                        <form method="get" action="manage-students.php">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $row['studentRegno']; ?>">
                                                            <input type="hidden" name="progress" value="update">
                                                            <button type="submit" class=" progressBtn mt-1"><i
                                                                    class="fa fa-forward"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="mt-1">
                                                        <a href="manage-students.php?id=<?php echo $row['studentRegno'] ?>&pass=update"
                                                            onClick="return confirm('Are you sure you want to reset password?')">
                                                            <button type="submit" name="submit" id="submit"
                                                                class="btn btn-primary fs-6">Reset Password</button>
                                                        </a>
                                                        <a href="manage-students.php?id=<?php echo $row['studentRegno'] ?>&del=delete"
                                                            onClick="return confirm('Are you sure you want to delete?')">
                                                            <button class=" deleteBtn"><i class="fa fa-trash"></i></button>
                                                        </a>


                                                    </div>

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
                    <!--  End  Bordered Table  -->
                    <div style="margin-top:5rem;">
                        <h2 class="text-center text-danger mt-4 mb-4 fw-bolder ">Danger Zone</h2>

                    </div>
                    <?php


                    if (isset($_POST["passwordReset"])) {
                        $level = $_POST["levelToReset"];

                        function generateRandomPassword($length = 8)
                        {
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $password = '';
                            for ($i = 0; $i < $length; $i++) {
                                $password .= $characters[rand(0, strlen($characters) - 1)];
                            }
                            return $password;
                        }


                        $selectedLevelQuery = mysqli_query($con, "SELECT * FROM students WHERE level = '$level' ");

                        // Batch email array
                        $batchEmails = array();

                        while ($selectedLevel = mysqli_fetch_array($selectedLevelQuery)) {
                            $studentEmail = $selectedLevel['email'];
                            $newPassword = md5(generateRandomPassword());

                            // Update the database with the new password
                            mysqli_query($con, "UPDATE students SET password = '$newPassword' WHERE email = '$studentEmail'");

                            // Add to batch email array
                            $batchEmails[] = array('email' => $studentEmail, 'newPassword' => $newPassword);
                        }

                        // Send batch emails
                        sendBatchPasswordResetEmails($batchEmails);

                        echo '<script>alert("Password reset completed. Check email for the new passwords.")</script>';
                    }

                    function sendBatchPasswordResetEmails($batchEmails)
                    {
                        foreach ($batchEmails as $batchEmail) {
                            sendPasswordResetEmail($batchEmail['email'], $batchEmail['newPassword']);
                        }
                    }

                    function sendPasswordResetEmail($email, $newPassword)
                    {
                        $mail = new PHPMailer(true);

                        try {
                            //Server settings
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
                            $mail->SMTPAuth = true;
                            $mail->Username = 'andohfrancis9187@gmail.com';
                            $mail->Password = 'mdgu tsjx utef vgcw';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port = 587;

                            //Recipients
                            $mail->setFrom('andohfrancis9187@gmail.com', 'Wiawso College of Education');
                            $mail->addAddress($email);

                            //Content
                            $mail->isHTML(true);
                            $mail->Subject = 'Password Reset';
                            $mail->Body = 'Your password for your  portal has been reset, please keep your new password safe: ' . $newPassword;

                            $mail->send();
                        } catch (Exception $e) {
                            echo '<script>alert("Password reset not successfull,some emails were not valid")</script>';
                            echo '<script>window.location.href=manage-students.php</script>';
                        }
                    }
                    ?>

                    <div class="warning-card">
                        <div class="card-header">Warning</div>
                        <div class="card-body">
                            <div class="col-7">
                                <h5 class="card-title">Reset password for particular level</h5>
                                <p class="card-text">Clicking the "Reset Password" button will perform a batch password
                                    reset for Selected Level. This action is irreversible. Please ensure you have
                                    considered the
                                    implications before proceeding.</p>
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
                                    <button class="action-button form-control" id="passwordReset" type="submit"
                                        name="passwordReset">
                                        Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                    include 'functions/progression.php';
                    include 'functions/reverse-progression.php';


                    // Reopen the database connection before batch processing
                    
                    if (isset($_POST['batchProgression'])) {
                        $promotionCriteria = 12; // Promote after 12 months
                        $promotionLimit = 4; // Promote for up to 4 years
                    
                        // Set a limit for the number of records to process in each iteration
                        $limit = 100;

                        // Calculate the number of iterations required
                        $totalStudents = mysqli_query($con, "SELECT COUNT(*) as total FROM students WHERE level <= 400");
                        $totalStudents = mysqli_fetch_assoc($totalStudents)['total'];
                        $iterations = ceil($totalStudents / $limit);

                        for ($i = 0; $i < $iterations; $i++) {
                            // Calculate the offset for each iteration
                            $offset = $i * $limit;

                            // Perform batch progression for a limited number of students
                            $sql = mysqli_query($con, "SELECT * FROM students WHERE level <= 400 LIMIT $limit OFFSET $offset");
                            while ($row = mysqli_fetch_array($sql)) {
                                handleProgression($row['studentRegno'], $row['enrollmentDate'], $row['level'], $promotionCriteria, $promotionLimit, $con);
                            }
                        }

                        echo "Batch progression completed.";
                    }

                    // Check if the form is submitted for batch reversal
                    if (isset($_POST['batchReversal'])) {
                        // Set a limit for the number of records to process in each iteration
                        $limit = 100;
                        

                        // Calculate the number of iterations required
                        $totalStudents = mysqli_query($con, "SELECT COUNT(*) as total FROM students WHERE level <= 400");
                        $totalStudents = mysqli_fetch_assoc($totalStudents)['total'];
                        $iterations = ceil($totalStudents / $limit);

                        for ($i = 0; $i < $iterations; $i++) {
                            // Calculate the offset for each iteration
                            $offset = $i * $limit;

                            // Perform batch reversal for a limited number of students
                            $sql = mysqli_query($con, "SELECT * FROM students WHERE level <= 400 LIMIT $limit OFFSET $offset");
                            while ($row = mysqli_fetch_array($sql)) {
                                reverseProgression($row['studentRegno'], $con);
                            }
                        }

                        echo "Batch reversal completed.";
                    }
                    ?>

                    <div class="warning-card">
                        <div class="card-header">Warning</div>
                        <div class="card-body">
                            <div class="col-8">
                                <h5 class="card-title">Batch Progression of Students</h5>
                                <p class="card-text">Clicking the "Batch Progression" button will perform progression
                                    for eligible
                                    students. This action may take some time to complete. Please ensure you have
                                    considered the
                                    implications before proceeding.</p>
                                <p class="card-text"><strong>Note:</strong> THIS MUST BE DONE AT THE VERY BEGINNING OF
                                    EVERY YEAR</p>
                            </div>
                            <div class="col-4">

                                <form method="post">
                                    <button class="action-button  form-control" id="batchProgression" type="submit"
                                        name="batchProgression">Batch
                                        Progression</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Warning Card - Reversal -->
                    <div class="warning-card">
                        <div class="card-header">Warning</div>
                        <div class="card-body">
                            <div class="col-8">
                                <h5 class="card-title">Batch Reversal </h5>
                                <p class="card-text">Clicking the "Reverse Progression" button will perform a reversal
                                    for eligible
                                    students. This action may take some time to complete. Please ensure you have
                                    considered the
                                    implications before proceeding.</p>
                            </div>
                            <div class="col-4">
                                <form method="post">
                                    <button class="action-button form-control" id="batchReversal" type="submit"
                                        name="batchReversal">
                                        Reverse Progression</button>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            <?php
            if (isset($_GET['progress'])) {
                $studentRegno = $_GET['id'];
                $promotionCriteria = 12;
                $promotionLimit = 4;

                $sql = mysqli_query($con, "SELECT * FROM students WHERE level <= 400 AND studentRegno = '$studentRegno'");
                while ($row = mysqli_fetch_array($sql)) {
                    handleProgression($row['studentRegno'], $row['enrollmentDate'], $row['level'], $promotionCriteria, $promotionLimit, $con);
                }
                ?>
                $('#customToast .toast-body').html('Progression completed for student with Reg No: <?php echo $studentRegno; ?>');
                $('#customToast').toast('show');
                <?php

            }

            if (isset($_GET['reverse'])) {
                $studentRegno = $_GET['id'];
                reverseProgression($studentRegno, $con);
                ?>
                $('#customToast .toast-body').html('Reversal completed for student with Reg No: <?php echo $studentRegno; ?>');
                $('#customToast').toast('show');
                <?php
            }
            ?>
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        // DataTable initialization script
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
</body>

</html>

<?php ?>