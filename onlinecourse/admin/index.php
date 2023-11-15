<?php
session_start();
error_reporting(0);
include("includes/config.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        header("location:student-registration.php");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        header("location:index.php");
        exit();
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
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="pageHeadline">
        <div class="pageHeadlineText">
            <h1 class="welcHeadLine"> WELCOME TO</h1>
            <h3> <span class="welcHeadLineSpan">THE STUDENTS </span> REGISTRATION
                PORTAL
            </h3>
            <small>Register your Semester Courses Here</small>
        </div>
        <img class="schoolLogo" src="../assets/img/schoolLogo.png" />

    </div>
    <header class="p-4 navbarHeader text-white">
        <div class="container d-flex flex-wrap align-items-center justify-content-center">
            <div class="">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li class="navLink px-3 py-2 d-flex  align-items-center gap-0">
                        <img class="homeIcon1" src="../assets/img/home.svg">
                        <a href="../home.php">Home </a>
                    </li>

                    <li class="navLink px-3 py-2 d-flex  align-items-center gap-0">
                        <img class="adminIcon " src="../assets/img/login.svg">

                        <a href="index.php">
                            Admin Login </a>
                    </li>

                </ul>

            </div>
        </div>
    </header>
    <div class="content-wrapper">
        <div class="container">
            <div class="row d-flex  flex-row justify-content-center align-items-center">
                <div class="col-md-6 col-sm-10 gap-4">
                    <img src="../assets/img/admin.svg" class="adminSVG p-0 m-0">
                </div>
                <div class="col-md-5 col-sm-9 mt-8 panel panel-default  ">
                    <div class="panel-heading">
                        Enter Into Admin Panel
                    </div>

                    <span style="color:red;">
                        <?php echo htmlentities($_SESSION['errmsg']); ?>
                        <?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                    </span>

                    <div class="panel-body">
                        <form class="adminForm card shadow-lg" name="admin" method="post">
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required id="exampleInputEmail1"
                                    aria-describedby="emailusername">
                                <div id="usernameHelp" class="form-text">We'll never share your details with anyone
                                    else
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-1 form-check ">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</body>

</html>