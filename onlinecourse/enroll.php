<?php
session_start();
include('includes/config.php');
error_reporting(1);

if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['submit'])) {
    $studentregno = $_POST['studentregno'];
    $session = $_POST['session'];
    $progr = $_POST['programme'];
    $level = $_POST['level'];
    $courses = $_POST['courses']; // An array of selected course IDs
    $sem = $_POST['sem'];

    if (!empty($courses)) {
      foreach ($courses as $courseId) {
        // Insert each selected course into the courseenrolls table
        $ret = mysqli_query($con, "INSERT INTO courseenrolls(studentRegno, session, programme, level, course, semester) VALUES ('$studentregno', '$session', '$progr', '$level', '$courseId', '$sem')");
      }

      if ($ret) {
        echo '<script>alert("Enroll Successfully !!")</script>';
        echo '<script>window.location.href=enroll.php</script>';
      } else {
        echo '<script>alert("Error: Not Enroll")</script>';
        echo '<script>window.location.href=enroll.php</script>';
      }
    } else {
      echo '<script>alert("Please select at least one course")</script>';
    }
  }
}

// Fetch student details based on session login
$sql = mysqli_query($con, "SELECT * FROM students WHERE StudentRegno='" . $_SESSION['login'] . "'");
$row = mysqli_fetch_array($sql);
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
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
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
            <?php $sql = mysqli_query($con, "select * from students where StudentRegno='" . $_SESSION['login'] . "'");
            $cnt = 1;
            while ($row = mysqli_fetch_array($sql)) { ?>
              <div class="panel-body">
                <form name="dept" method="post" class="card shadow-lg text-left" enctype="multipart/form-data"
                  id="student-info-form">
                  <div class="d-flex justify-content-between">
                    <div class="form-group">
                      <label for="surname">Surname</label>
                      <input type="text" class="form-control" id="surname" name="surname"
                        value="<?php echo htmlentities($row['surname']); ?>" readonly />
                    </div>
                    <div class="form-group">
                      <label for="firstname">Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname"
                        value="<?php echo htmlentities($row['firstname']); ?>" readonly />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="studentregno">Student Index/Ref No.</label>
                    <input type="text" class="form-control" id="studentregno" name="studentregno"
                      value="<?php echo htmlentities($row['StudentRegno']); ?>" placeholder="Student Reg no" readonly />
                  </div>
                  <div class="form-group">
                    <label for="Pincode">Student Photo</label>
                    <?php if ($row['studentPhoto'] == "") { ?>
                      <img src="studentphoto/noimage.png" width="200" height="200">
                    <?php } else { ?>
                      <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']); ?>" width="200" height="200">
                    <?php } ?>
                  </div>

                  <!-- <div class="form-group">
                    <label for="Session">Session</label>
                    <select class="form-control" name="session" required="required">
                      <option value="">Select Session</option>
                      <?php
                      $sql = mysqli_query($con, "select * from session");
                      while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <option value="<?php echo htmlentities($row['id']); ?>">
                          <?php echo htmlentities($row['session']); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div> -->
                  <div class="form-group">
                    <label for="Programme">Programme</label>
                    <?php
                    // Fetch the student's program information
                    $regno = $_SESSION['login'];
                    $programQuery = mysqli_query($con, "SELECT programme FROM students WHERE StudentRegno = '$regno'");

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




                  <!-- <div class="form-group">
                    <label for="Programme">Programme</label>
                    <select class="form-control" name="programme" required="required">
                      <option value="">Select Programme</option>
                      <?php

                      $sql = mysqli_query($con, "SELECT * FROM programme");
                      while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <option value="<?php echo htmlentities($row['id']); ?>">
                          <?php echo htmlentities($row['category'] . ' - ' . $row['program']); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div> -->

                  <div class="form-group">
                    <label for="Level">Level</label>
                    <?php
                    // Fetch the current student's level information
                    $regno = $_SESSION['login'];
                    $levelQuery = mysqli_query($con, "SELECT level FROM students WHERE StudentRegno = '$regno'");

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
                    <label for="Semester">Semester</label>
                    <select class="form-control" name="sem" required="required">
                      <option value="">Select Semester</option>
                      <?php
                      $sql_sem = mysqli_query($con, "select * from semester");
                      while ($row_sem = mysqli_fetch_array($sql_sem)) {
                        ?>
                        <option value="<?php echo htmlentities($row_sem['id']); ?>">
                          <?php echo htmlentities($row_sem['semester']); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php
                  $courses = array(
                    "Introduction to Agriculture",
                    "Textile Design Fundamentals",
                    "Food Science and Nutrition",
                    "Environmental Sustainability in Agriculture",
                    "Advanced Textile Techniques",
                    "Nutritional Biochemistry",
                    "Agricultural Economics",
                    "Fashion and Textile Marketing",
                    "Culinary Arts",
                    "Advanced Food Preparation"
                  );

                  $numberOfCourses = 5; // Set the number of random courses you want
                
                  $randomCourses = array_rand($courses, $numberOfCourses);
                  ?>

                  <h5>Choose Courses to Enroll in this Semester</h5>

                  <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Maths/Science
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <label>Choose Courses:</label>
                          <ul>
                            <?php foreach ($randomCourses as $index) { ?>
                              <li>
                                <input type="checkbox" id="course_<?php echo $index; ?>" name="courses[]"
                                  value="<?php echo htmlentities($courses[$index]); ?>">
                                <label for="course_<?php echo $index; ?>">
                                  <?php echo htmlentities($courses[$index]); ?>
                                </label>
                              </li>
                            <?php } ?>
                          </ul>
                          <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>

                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Technical
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                          data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <label>Choose Courses:</label>
                            <ul>
                              <?php foreach ($randomCourses as $index) { ?>
                                <li>
                                  <input type="checkbox" id="course_<?php echo $index; ?>" name="courses[]"
                                    value="<?php echo htmlentities($courses[$index]); ?>">
                                  <label for="course_<?php echo $index; ?>">
                                    <?php echo htmlentities($courses[$index]); ?>
                                  </label>
                                </li>
                              <?php } ?>
                            </ul>
                            <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>

                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Agric/Home Economics
                          </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                          data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <label>Choose Courses:</label>
                            <ul>
                              <?php foreach ($randomCourses as $index) { ?>
                                <li>
                                  <input type="checkbox" id="course_<?php echo $index; ?>" name="courses[]"
                                    value="<?php echo htmlentities($courses[$index]); ?>">
                                  <label for="course_<?php echo $index; ?>">
                                    <?php echo htmlentities($courses[$index]); ?>
                                  </label>
                                </li>
                              <?php } ?>
                            </ul>
                            <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>



                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group text-left">
                      <label for="Courses">Courses</label>
                      <?php
                      $sql_courses = mysqli_query($con, "SELECT * FROM course");
                      while ($row_courses = mysqli_fetch_array($sql_courses)) {
                        echo '<div class="checkbox">';
                        echo '<label>';
                        echo '<input type="checkbox" name="courses[]" value="' . $row_courses['id'] . '"> ' . htmlentities($row_courses['courseName']);
                        echo '</label>';
                        echo '</div>';
                      }
                      ?>
                    </div> -->
                    <!-- <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button> -->
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