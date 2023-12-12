<?php
session_start();
include('includes/config.php');
error_reporting(1);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {

  if (isset($_POST['submit'])) {
    $regid = intval($_GET['id']);
    $surname = $_POST['surname'];
    $programme = $_POST['programme'];
    $firstname = $_POST['firstname'];
    $otherName = $_POST['otherName'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $photo = $_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "studentphoto/" . $_FILES["photo"]["name"]);
    $ret = mysqli_query($con, "update students set surname='$surname', firstname='$firstname', otherName= '$otherName',dob = '$dob',email= '$email', contactNumber='$contactNumber', programme='$programme' ,studentPhoto='$photo' where StudentRegno='$regid'");
    if ($ret) {
      echo '<script>alert("Student Record updated Successfully !!")</script>';
      echo '<script>window.location.href=manage-students.php</script>';
    } else {
      echo '<script>alert("Error : Student Record not update")</script>';
      echo '<script>window.location.href=manage-students.php</script>';
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
    <title>Student Profile</title>
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
      <h1 class="studentPortal">Edit Student Profile</h1>
    </div>
    <?php if ($_SESSION['alogin'] != "") {
      include('includes/menubar.php');
    }
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-head-line">STUDENT REGISTRATION </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Student Registration
              </div>
              <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font>
              <?php
              $regid = intval($_GET['id']);

              $sql = mysqli_query($con, "select * from students where StudentRegno='$regid'");
              $cnt = 1;
              while ($row = mysqli_fetch_array($sql)) { ?>

                <div class="panel-body card">
                  <form name="dept" method="post" enctype="multipart/form-data">
                    <div class="d-flex  flex-row justify-content-between">
                      <div class="form-group">
                        <label for="surname">Surname </label>
                        <input type="text" class="form-control" id="surname" name="surname"
                          value="<?php echo htmlentities($row['surname']); ?>" />
                      </div>
                      <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                          value="<?php echo htmlentities($row['firstname']); ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="otherName">Other Name</label>
                        <input type="text" class="form-control" id="otherName" name="otherName"
                          value="<?php echo htmlentities($row['otherName']); ?>" />
                      </div>
                      <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" class="form-control" id="dob" name="dob"
                          value="<?php echo htmlentities($row['dob']); ?>" />
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                          value="<?php echo htmlentities($row['email']); ?>" />
                      </div>
                      <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber"
                          value="<?php echo htmlentities($row['contactNumber']); ?>" />
                      </div>
                      
                      

                    <div class="form-group">
                      <label for="studentregno">Student Index/Ref No </label>
                      <input type="text" class="form-control" id="studentregno" name="studentregno"
                        value="<?php echo htmlentities($row['StudentRegno']); ?>" placeholder="Student Reg no" readonly />
                    </div>
                    <div class="form-group">
                      <label for="studentphoto">Student Photo </label>
                      <?php if ($row['studentPhoto'] == "") { ?>
                        <img src="../studentphoto/noimage.png" width="200" height="200">
                      <?php } else { ?>
                        <img src="../studentphoto/<?php echo htmlentities($row['studentPhoto']); ?>" width="200" height="200">
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label for="Programme">Programme</label>
                      <select class="form-control" name="programme" required="required">
                        <?php $programmeSql = mysqli_query($con, "SELECT * FROM programme");
                        while ($programmeRow = mysqli_fetch_array($programmeSql)) { ?>
                          <option value="<?php echo htmlentities($programmeRow['id']); ?>" <?php if ($programmeRow['id'] == $row['programme'])
                               echo 'selected'; ?>>
                            <?php echo htmlentities($programmeRow['category'] . ' - ' . $programmeRow['program']); ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>

                
                    <div class="form-group">
                      <label for="studentphoto">Upload New Photo </label>
                      <input type="file" class="form-control" id="photo" name="photo"
                        value="<?php echo htmlentities($row['studentPhoto']); ?>" />
                    </div>
                 

               <?php } ?>

              <button type="submit" name="submit" id="submit" class="btn btn-default">Update</button>
              </form>
            </div>
          </div> 
        </div>

      </div>
    </div>
    </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <script src="../assets/js/jquery-1.11.1.js"></script>


  </body>

  </html>
<?php } ?>