<?php
session_start();
include('includes/config.php');
error_reporting(0);

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
  <div class="content-wrapper">
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

                  <div class="form-group">
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
                  </div>

                  <div class="form-group">
                    <label for="Programme">Programme</label>
                    <select class="form-control" name="programme" required="required" readonly>
                      <option value="<?php echo htmlentities($row['programme']); ?>">
                        <?php echo htmlentities($row['programme']); ?>
                      </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="Level">Level</label>
                    <select class="form-control" name="level" required="required">
                      <option value="">Select Level</option>
                      <?php
                      $sql_level = mysqli_query($con, "select * from level");
                      while ($row_level = mysqli_fetch_array($sql_level)) {
                        ?>
                        <option value="<?php echo htmlentities($row_level['id']); ?>">
                          <?php echo htmlentities($row_level['level']); ?>
                        </option>
                      <?php } ?>
                    </select>
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
                  <div class="form-group text-left">
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
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>
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