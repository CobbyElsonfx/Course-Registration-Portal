<?php
session_start();
include('includes/config.php');
error_reporting(1);


if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['submit'])) {
    $studentregno = $_SESSION['login'];
    $session = $_POST['session'];
    $progr = $_POST['programme'];
    $level = $_POST['level'];
    // No need to retrieve $courses from $_POST as we are not using checkboxes
    $sem = $_POST['sem'];

    // Fetch courses based on the student's program and level
    $regno = $_SESSION['login'];
    $programQuery = mysqli_query($con, "SELECT programme, level FROM students WHERE studentRegno = '$regno'");
    $programData = mysqli_fetch_assoc($programQuery);

    $programId = $programData['programme'];
    $currentLevel = $programData['level'];

    $stmt = $con->prepare("SELECT id FROM level WHERE level = ?");
    $stmt->bind_param("s", $currentLevel);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $id = $row['id'];

    $coursesQuery = $con->prepare("SELECT * FROM course WHERE (level_id = ? AND programme_id = ?) OR (level_id = ? AND isCore = 1)");
    $coursesQuery->bind_param("iii", $id, $programId, $id);
    $coursesQuery->execute();

    if ($coursesQuery->error) {
      die("Error: " . $coursesQuery->error);
    }

    $coursesResult = $coursesQuery->get_result();

    if ($coursesResult) {
      while ($courseRow = $coursesResult->fetch_assoc()) {
        $courseId = $courseRow['id'];
        // Insert each course into the courseenrolls table
        $ret = mysqli_query($con, "INSERT INTO courseenrolls(studentRegno, session, programme, level, course, semester) VALUES ('$studentregno', '$session', '$progr', '$level', '$courseId', '$sem')");
      }

      if ($ret) {
        echo '<script>alert("Enroll Successfully !!")</script>';
      } else {
        echo ' <script>alert("Sorry there was an error")</script>';
      }
    } 
  
  
  // Fetch student details based on session login
  $sql = mysqli_query($con, "SELECT * FROM students WHERE studentRegno='" . $_SESSION['login'] . "'");
  $row = mysqli_fetch_array($sql);
}


  ?>

  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Course Enroll</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="studensPortalHeader">
      <h1 class="studentPortal">Course Enroll</h1>
    </div>
    <?php if ($_SESSION['login'] != "") {
      include('includes/menubar.php');
    } ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper mb-4">
      <div class="container">
        <div class="row">
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font>
              <?php $sql = mysqli_query($con, "select * from students where studentRegno='" . $_SESSION['login'] . "'");
              $cnt = 1;
              while ($row = mysqli_fetch_array($sql)) { ?>
                <div class="panel-body">
                  <form name="dept" method="post" class="card shadow-lg text-left" enctype="multipart/form-data"
                    id="student-info-form">

                    <div class="form-group">
                      <label for="studentregno">Student Index/Ref No.</label>
                      <input type="text" class="form-control" id="studentregno" name="studentregno"
                        value="<?php echo htmlentities($row['studentRegno']); ?>" placeholder="Student Reg no" readonly />
                    </div>

                    <div class="form-group">
                      <label for="Programme">Programme</label>
                      <?php
                      // Fetch the student's program information
                      $regno = $_SESSION['login'];
                      $programQuery = mysqli_query($con, "SELECT programme FROM students WHERE studentRegno = '$regno'");

                      if ($programData = mysqli_fetch_array($programQuery)) {
                        $programId = $programData['programme'];

                        // Fetch the corresponding program name from the programme table
                        $programQuery = mysqli_query($con, "SELECT program FROM programme WHERE id = '$programId'");

                        if ($programRow = mysqli_fetch_array($programQuery)) {
                          $programName = htmlentities($programRow['program']);
                        } else {
                          $programName = "Unknown Program";
                        }
                      } else {
                        $programName = "Program Not Found";
                      }
                      ?>
                      <input type="text" class="form-control" id="programme" name="programme"
                        value="<?php echo $programName; ?>" readonly />
                    </div>

                    <div class="form-group">
                      <label for="Level">Level</label>
                      <?php
                      // Fetch the current student's level information
                      $regno = $_SESSION['login'];
                      $levelQuery = mysqli_query($con, "SELECT level FROM students WHERE studentRegno = '$regno'");

                      if ($levelData = mysqli_fetch_array($levelQuery)) {
                        $currentLevel = $levelData['level'];
                      } else {
                        $currentLevel = ""; // Set a default value if level information is not found
                      }
                      ?>
                      <input type="text" class="form-control" id="level" name="level"
                        value="<?php echo htmlentities($currentLevel); ?>" readonly />
                    </div>



                    <div class="form-group">
                      <?php
                      $regno = $_SESSION['login'];

                      // Fetch the student's program and level
                      $programQuery = mysqli_query($con, "SELECT programme, level FROM students WHERE studentRegno = '$regno'");
                      $programData = mysqli_fetch_assoc($programQuery);

                      $programId = $programData['programme'];
                      $currentLevel = $programData['level'];

                      // Fetch the level ID
                      $stmt = $con->prepare("SELECT id FROM level WHERE level = ?");
                      $stmt->bind_param("s", $currentLevel);
                      $stmt->execute();
                      $result = $stmt->get_result();
                      $row = $result->fetch_assoc();
                      $id = $row['id'];

                      // Fetch courses based on the student's program and level
                      $coursesQuery = $con->prepare("SELECT * FROM course WHERE (level_id = ? AND programme_id = ?) OR (level_id = ? AND isCore = 1)");
                      $coursesQuery->bind_param("iii", $id, $programId, $id);
                      $coursesQuery->execute();

                      // Check for errors
                      if ($coursesQuery->error) {
                        die("Error: " . $coursesQuery->error);
                      }

                      $coursesResult = $coursesQuery->get_result();

                      if ($coursesResult) {
                        $allCourses = array();

                        while ($courseRow = $coursesResult->fetch_assoc()) {
                          $allCourses[] = $courseRow;
                        }

                        if (!empty($allCourses)) {
                          echo '<label>Select Courses</label>';
                          // Display a list of courses using ul and li
                          echo "<ul>";
                          foreach ($allCourses as $course) {
                            echo "<li>" . $course['courseCode'] . " - " . $course['courseName'] . "</li>";
                          }
                          echo "</ul>";

                          // Display a single "Register" button
                          echo "<button type='submit' name='submit' class='btn btn-primary'>Register</button>";
                        } else {
                          echo 'No courses found.';
                        }
                      } else {
                        echo "Error: " . $con->error;
                      }

                      ?>
                    </div>
                  </form>
                </div>
              <?php } ?>
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
<?php } ?>