<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $id = intval($_GET['id']);
  date_default_timezone_set('Asia/Kolkata'); // change according timezone
  $currentTime = date('d-m-Y h:i:s A', time());
  if (isset($_POST['submit'])) {
    $coursecode = $_POST['coursecode'];
    $coursename = $_POST['coursename'];
    $courseunit = $_POST['courseunit'];
    $ret = mysqli_query($con, "update course set courseCode='$coursecode',courseName='$coursename',courseUnit='$courseunit',updationDate='$currentTime' where id='$id'");
    if ($ret) {
      echo '<script>alert("Course Updated Successfully !!")</script>';
      echo '<script>window.location.href=course.php</script>';
    } else {
      echo '<script>alert("Error : Course not Updated!!")</script>';
      echo '<script>window.location.href=course.php</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <link href="../assets/css/style.css" rel="stylesheet" />

    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/admin_side_nav.css" rel="stylesheet" />

  </head>


  <body>
    <div class="wrapper">
      <!-- Sidebar Holder -->
      <?php if ($_SESSION['alogin'] != "") {
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
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="fas fa-align-justify"></i>
            </button>


          </div>
        </nav>
        <div class="container">
          <div>
            <a class="btn btn-primary" href="course.php" role="button"><i class="fa fa-caret-left"></i>Back</a>

          </div>
          <div class="row">
            <div class="col-md-12">
              <h1 class="page-head-line">Course </h1>
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


                <div class="panel-body p-3">
                  <form name="dept" method="post">
                    <?php
                    $sql = mysqli_query($con, "select * from course where id='$id'");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <p><b>Last Updated at</b> :
                        <?php echo htmlentities($row['updationDate']); ?>
                      </p>
                      <div class="form-group">
                        <label for="coursecode">Course Code </label>
                        <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Course Code"
                          value="<?php echo htmlentities($row['courseCode']); ?>" required />
                      </div>

                      <div class="form-group">
                        <label for="coursename">Course Title </label>
                        <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name"
                          value="<?php echo htmlentities($row['courseName']); ?>" required />
                      </div>

                      <div class="form-group">
                        <label for="courseunit">Credit Hours </label>
                        <input type="number" max="5" min="0" class="form-control" id="courseunit" name="courseunit"
                          placeholder="Course Unit" value="<?php echo htmlentities($row['courseUnit']); ?>" required />
                      </div>


                    <?php } ?>
                    <button type="submit" name="submit" class="btn btn-default my-3 "><i class=" fa fa-refresh "></i>
                      Update</button>
                  </form>
                </div>
              </div>
            </div>

          </div>

        </div>





      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
      integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
      crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
      integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
      crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
          $(this).toggleClass('active');
        });
      });
    </script>
  </body>

  </html>
<?php } ?>