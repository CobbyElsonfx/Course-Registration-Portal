<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $coursecode = $_POST['coursecode'];
        $coursename = $_POST['coursename'];
        $courseunit = $_POST['courseunit'];
        $seatlimit = $_POST['seatlimit'];
        $level = $_POST['level'];
        $program = $_POST['program'];

        $ret = mysqli_query($con, "INSERT INTO course(courseCode, courseName, courseUnit, noofSeats, level_id, programme_id) 
                                   VALUES ('$coursecode', '$coursename', '$courseunit', '$seatlimit', '$level', '$program')");

        if ($ret) {
            echo '<script>alert("Course Created Successfully !!")</script>';
            echo '<script>window.location.href=course.php</script>';
        } else {
            echo '<script>alert("Error : Course not created!!")</script>';
            echo '<script>window.location.href=course.php</script>';
        }
    }

    if (isset($_GET['del'])) {
        mysqli_query($con, "DELETE FROM course WHERE id = '" . $_GET['id'] . "'");
        echo '<script>alert("Course deleted!!")</script>';
        echo '<script>window.location.href=course.php</script>';
    }
    ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Admin | Course</title>
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
        <div class="studensPortalHeader">
            <h1 class="studentPortal">Course</h1>
        </div>
        <?php if ($_SESSION['alogin'] != "") {
            include('includes/menubar.php');
        }
        ?>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Course
                            </div>
                            <font color="green" align="center">
                                <?php echo htmlentities($_SESSION['msg']); ?>
                                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                            </font>

                            <div class="panel-body">
                                <form name="dept" method="post">
                                    <div class="form-group">
                                        <label for="coursecode">Course Code </label>
                                        <input type="text" class="form-control" id="coursecode" name="coursecode"
                                            placeholder="Course Code" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="coursename">Course Title </label>
                                        <input type="text" class="form-control" id="coursename" name="coursename"
                                            placeholder="Course Name" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="courseunit">Credit Hours</label>
                                        <input type="text" class="form-control" id="courseunit" name="courseunit"
                                            placeholder="Course Unit" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="level">Select Level</label>
                                        <select class="form-control" id="level" name="level" required>
                                            <?php
                                            $levels = mysqli_query($con, "SELECT * FROM level");
                                            while ($row = mysqli_fetch_assoc($levels)) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['level'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="program">Select Program</label>
                                        <select class="form-control" id="program" name="program" required>
                                            <?php
                                            $programs = mysqli_query($con, "SELECT * FROM programme");
                                            while ($row = mysqli_fetch_assoc($programs)) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['program'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="seatlimit">Seat Limit</label>
                                        <input type="text" class="form-control" id="seatlimit" name="seatlimit"
                                            placeholder="Seat Limit" required />
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <font color="red" align="center">
                    <?php echo htmlentities($_SESSION['delmsg']); ?>
                    <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                </font>
                <div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
        Manage Course
    </div>
    <div class="panel-body">
        <?php
        // Fetch distinct levels from the database
        $levelQuery = $con->query("SELECT DISTINCT level_id FROM course");

        while ($levelRow = $levelQuery->fetch_assoc()) {
            $levelId = $levelRow['level_id'];

            // Use prepared statement for fetching courses
            $stmt = $con->prepare("SELECT * FROM course WHERE level_id = ?");
            $stmt->bind_param("i", $levelId);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result) {
                // Display your data here
        ?>
                <div class="table-responsive table-bordered">
                    <h3>Level <?php echo $levelId; ?></h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cnt = 1;
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $cnt; ?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row['courseCode']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row['courseName']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row['creationDate']); ?>
                                    </td>
                                    <td>
                                        <a href="edit-course.php?id=<?php echo $row['id'] ?>">
                                            <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                                        </a>
                                        <a href="course.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $cnt++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        <?php
                $result->free_result();
            } else {
                // Handle query error
                echo "Error: " . $con->error;
            }

            $stmt->close();
        }
        ?>
    </div>
</div>


            </div>
        </div>
        <?php include('includes/footer.php'); ?>
        <script src="../assets/js/jquery-1.11.1.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
    </body>

    </html>
<?php } ?>
