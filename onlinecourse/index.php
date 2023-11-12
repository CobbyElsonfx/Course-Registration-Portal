<?php
session_start();
error_reporting(0);
include("includes/config.php");
if (isset($_POST['submit'])) {
    $regno = $_POST['regno'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        $_SESSION['login'] = $_POST['regno'];
        $_SESSION['id'] = $num['studentRegno'];
        $_SESSION['sname'] = $num['studentName'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con, "insert into userlog(studentRegno,userip,status) values('" . $_SESSION['login'] . "','$uip','$status')");
        header("location:http:change-password.php");
    } else {
        $_SESSION['errmsg'] = "Invalid Reg no or Password";
        header("location:http:index.php");
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

    <title>Student Login</title>

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
    <div class="studensPortalHeader">
        <h1 class="studentPortal">Welcome Wiawso College Education Course <br> Registration Portal </h1>
    </div>
    <header class="p-4 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <img class="homeIcon" src="./assets/img/home.svg">
                    <li class="navLink px-3 py-2 "><a href="#">Home </a></li>
                    <img class="adminIcon" src="./assets/img/login.svg">
                    <li class="navLink px-3 py-2"><a href="./admin/index.php">Admin Login </a></li>
                    <img class="studentIcon" src="./assets/img/student.svg">
                    <li class="navLink px-3 py-2 "><a href="./index.php">Student Login</a></li>
                </ul>

                <form class="col-12 col-lg-6 mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Type in your query"
                        aria-label="Search">
                </form>
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
                    <h4 class="page-head-line">Please Login To Enter </h4>
                    <span style="color:red;">
                        <?php echo htmlentities($_SESSION['errmsg']); ?>
                        <?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                    </span>
                    <form class="card" name="admin" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Enter Reg no : </label>
                                <input type="text" name="regno" class="form-control" />
                                <label>Enter Password : </label>
                                <input type="password" name="password" class="form-control" />
                                <hr />
                                <button type="submit" name="submit" class="btn btn-info"><span
                                        class="glyphicon glyphicon-user"></span>
                                    &nbsp;Log Me In </button>&nbsp;
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