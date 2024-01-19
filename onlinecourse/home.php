<?php
session_start();
error_reporting(1);
include("includes/config.php");

if (isset($_POST['submit'])) {
    $regno = $_POST['regno'];
    $password = md5($_POST['password']);

    // Add the check for cleared account in the SQL query
    $query = mysqli_query($con, "SELECT * FROM students WHERE studentRegno='$regno' AND password='$password' AND cleared = 1");
    $num = mysqli_fetch_array($query);

    if ($num > 0) {
        // Student is cleared, proceed with login
        $_SESSION['login'] = $_POST['regno'];
        $_SESSION['id'] = $num['studentRegno'];
        $_SESSION['sname'] = $num['studentName'];

        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;

        // Log the login attempt
        $log = mysqli_query($con, "INSERT INTO userlog(studentRegno, userip, status) VALUES('" . $_SESSION['login'] . "','$uip','$status')");

        // Redirect to the profile page
        header("location:http:my-profile.php");
    } else {
        // Account is not cleared, show error message
        $_SESSION['errmsg'] = "Invalid Reg no, Password, or student not cleared. Please contact the admin for clearance.";
        header("location:http:home.php");
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

    <title>Student Login </title>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="pageHeadline">
        <div class="pageHeadlineText">
            <h1 class="welcHeadLine"> WELCOME TO</h1>
            <h3> THE STUDENTS' PORTAL
            </h3>
            <small>Login With Your Credentials</small>
        </div>
        <img class="schoolLogo" src="./assets/img/schoolLogo.png" />

    </div>
    <header class="p-2 navbarHeader text-white">
        <div class="container d-flex flex-wrap align-items-center justify-content-center ">
            <div class="">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li class="navLink px-3 py-2 d-flex ">
                        <img class="navIcon" src="./assets/img/home.svg">
                        <a href="./index.php">Home </a>
                    </li>

                    <li class="navLink px-3 py-2 d-flex">
                        <img class="navIcon" src="./assets/img/student.svg">
                        <a href="./home.php">Student Login</a>
                    </li>
                </ul>

            </div>
        </div>
    </header>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="studentSVG" src="./assets/img/book-lovers.svg">
                </div>
                <div class="col-md-6">
                    <h4 class="page-head-line">Please Enter Your details to Login </h4>
                    <span style="color:red;">
                        <?php echo htmlentities($_SESSION['errmsg']); ?>
                        <?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                    </span>
                    <form class="card" name="admin" method="post">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="lnginput">
                                    <label>Enter index/ref no : </label>
                                    <input type="text" name="regno" class="form-control" />
                                    <label>Enter Password : </label>
                                    <input type="password" name="password" class="form-control" />
                                    <hr />
                                    <button type="submit" name="submit" class="btn btn-info"><span
                                            class="glyphicon glyphicon-user"></span>
                                        &nbsp;Log Me In </button>&nbsp;
                                </div>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 

</div>
    
    <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>

</body>

</html>