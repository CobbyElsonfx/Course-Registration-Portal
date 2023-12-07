<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login']) == 0) {
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
        <title>Enroll History</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>

    <body>
    <div class="studensPortalHeader">
      <h1 class="studentPortal">Enrollment History</h1>
    </div>
        <!-- LOGO HEADER END-->
        <?php if ($_SESSION['login'] != "") {
            include('includes/menubar.php');
        }
        ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Enroll History </h1>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <!--    Bordered Table  -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Enroll History
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name </th>
                                                <th>Level</th>
                                                <th>Semester</th>
                                                <th>Enrollment Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT
                                            courseenrolls.course as cid,
                                            course.courseName as courname,
                                            level.level as level,
                                            courseenrolls.enrollDate as edate,
                                            semester.semester as sem
                                        FROM courseenrolls
                                        JOIN course ON course.id = courseenrolls.course
                                        JOIN level ON level.level = courseenrolls.level
                                        JOIN semester ON semester.id = courseenrolls.semester
                                        WHERE courseenrolls.studentRegno='" . $_SESSION['login'] . "'");
                                        
                                            $cnt = 1;
                                            while($row = mysqli_fetch_array($sql)) {
                                                ?>


                                                <tr>
                                                    <td>
                                                        <?php echo $cnt; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['courname']); ?>
                                                    </td>
                               
                                                    <td>
                                                        <?php echo htmlentities($row['level']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['sem']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['edate']); ?>
                                                    </td>
                                                </tr>

                                                
                                                <?php
                                                $cnt++;
                                            } ?>


                                        </tbody>
                                        
                                    </table>
                                    <a href="print.php" target="_blank">
                                                            <button class="btn btn-primary"><i class="fa fa-print "></i>
                                                                Print</button> </a>
                                </div>
                            </div>
                        </div>
                        <!--  End  Bordered Table  -->
                    </div>
                </div>


            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <?php include('includes/footer.php'); ?>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.11.1.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
    </body>

    </html>
<?php } ?>