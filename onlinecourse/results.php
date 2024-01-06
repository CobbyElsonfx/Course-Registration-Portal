<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {


    //Code for Change Password

    ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Student | Student Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/results.css" rel="stylesheet" />

    </head>


    <body>
        <div class="studensPortalHeader">
            <h1 class="studentPortal">Results</h1>
        </div>
        <?php if ($_SESSION['login'] != "") {
            include('includes/menubar.php');
        }
        ?>

        <?php $sql = mysqli_query($con, "select * from students where studentRegno='" . $_SESSION['login'] . "'");

        while ($row = mysqli_fetch_array($sql)) { ?>

            <div class="mt-5 mb-5">
                <div class="row">
                    <div class="col-md-2"></div>

                    <div class="col-md-8  col-sm-11">
                        <div class="card">
                            <div class="card-body">
                                <!-- Student Details -->
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img class="schoolLogo" src="./assets/img/schoolLogo.png">
                                        </div>
                                        <div>
                                            <h3 class="card-title">Wiawso College Of Education</h3>
                                            <h5>Sefwi Wiawso - Western North Region</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <ul>
                                            <li><span>Name :  </span><?php echo htmlentities($row['surname'] . " " . $row['firstname'] . " " . $row['otherName'])  ?></li>
                                            <li><span>Index/Ref Number:</span><?php echo htmlentities($row['studentRegno']) ?></li>
                                            <li><span>Programme:</span> <?php echo htmlentities($row['programme']) ?></</li>
                                            <li><span>Sem:</span> First Semester</li>
                                            <li><span>Level:</span><?php echo htmlentities($row['level']) ?></</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>


                            <!-- Additional student details go here -->

                            <!-- Courses and Grades -->
                            <h2 class="mt-4 mb-4 text-center ">Provisional Results</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Replace the following rows with actual data from your database -->
                                    <tr>
                                        <td>CSE101</td>
                                        <td>Introduction to Computer Science</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>MTH201</td>
                                        <td>Calculus</td>
                                        <td>B+</td>
                                    </tr>
                                    <!-- Additional rows go here -->
                                </tbody>
                            </table>

                            <!-- Total GPA -->
                            <h5 class="mt-4 text-end">Total GPA: 3.75</h5>

                            <!-- Additional content goes here -->

                        </div>
                    </div>
                    <div class="col-md-2 col-sm-11"></div>
                </div>
            </div>
            </div>
        <?php } ?>

        <!-- CONTENT-WRAPPER SECTION END-->
        <?php include('includes/footer.php'); ?>
        <script src="assets/js/jquery-1.11.1.js"></script>
    </body>

    </html>
<?php } ?>