<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['a_login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['search'])) {
        $studentIndex = trim($_POST['studentIndex']); // Trim whitespaces
        $studentIndex = mysqli_real_escape_string($con, $studentIndex); // Escape the string for use in a query
        $studentIndex = $_POST['studentIndex'];
        $sql = "SELECT * FROM students WHERE studentRegno = '$studentIndex'";
        $result = mysqli_query($con, $sql);
    }

    if (isset($_POST['markCleared'])) {
        $studentIndex = $_POST['studentIndex'];
        $updateQuery = "UPDATE students SET cleared = 1 WHERE studentRegno = '$studentIndex'";
        $updateResult = mysqli_query($con, $updateQuery);

        echo '<script>alert("Student marked as cleared and portal activated!");</script>';
    }
    ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Admin | Account Office Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/style.css" rel="stylesheet" />
        <link href="../assets/css/course.css" rel="stylesheet" />
        <link href="../assets/css/admin_side_nav.css" rel="stylesheet" />
    </head>

    <body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php if ($_SESSION['a_login'] != "") {
      include('includes/menubar.php');
    }
    ?>

<div id="content">


<nav class="navbar navbar-expand-lg ">
                <div class="container-fluid ">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                    </div>
                </div>
            </nav>


            <div>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Account Office Dashboard</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Search Student
                            </div>
                            <div class="panel-body">
                                <form name="searchForm" method="post">
                                    <div class="form-group">
                                        <label for="studentIndex">Student Index/Ref No. </label>
                                        <input type="text" class="form-control" id="studentIndex" name="studentIndex"
                                            placeholder="Student Index" required />
                                    </div>
                                    <button type="submit" name="search" class="btn btn-default">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($result)) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Student Details
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Student Index</th>
                                                <th>Surname</th>
                                                <th>Firstname</th>
                                                <th>Othername</th>

                                                <!-- Add more fields as needed -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo htmlentities($row['studentRegno']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['surname']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['firstname']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['otherName']); ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <form name="markClearedForm" method="post">
                                       
                                        <input type="hidden" name="studentIndex" value="<?php echo $studentIndex; ?>">
                                        <div class="d-flex justify-content-between" >
                                        <button type="submit" name="markCleared" style="width:45%;" class="btn ">Deactivate Portal</button>
                                        <button type="submit" name="markCleared" style="width:45%;" class="btn ">
                                            Activate Portal</button>
                                            
                                            </div>
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

    </html>
<?php } ?>