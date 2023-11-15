<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {

  if (isset($_POST['submit'])) {
    $surname = $_POST['surname'];
    $firstname = $_POST['fistname'];
    $photo = $_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "studentphoto/" . $_FILES["photo"]["name"]);
    $ret = mysqli_query($con, "update students set surname='$surname',firstname='$firstname',studentPhoto='$photo', where StudentRegno='" . $_SESSION['login'] . "'");
    if ($ret) {
      echo '<script>alert("Student Record updated Successf
      ully !!")</script>';
      echo '<script>window.location.href=my-profile.php</script>';
    } else {
      echo '<script>alert("Something went wrong . Please try again.!")</script>';
      echo '<script>window.location.href=my-profile.php</script>';
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
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="studensPortalHeader">
      <h1 class="studentPortal">Student Profile</h1>
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
            <h1 class="page-head-line">Student Registration </h1>
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
              <?php $sql = mysqli_query($con, "select * from students where StudentRegno='" . $_SESSION['login'] . "'");
              $cnt = 1;
              while ($row = mysqli_fetch_array($sql)) { ?>

                <div class="panel-body">
                  <form class="card shadow-lg text-left" name="dept" method="post" enctype="multipart/form-data">
                    <div class="d-flex justify-content-between">
                      <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname"
                          value="<?php echo htmlentities($row['surname']); ?>" />
                      </div>
                      <div class="form-group">
                        <label for="firstname">Firstname </label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                          value="<?php echo htmlentities($row['firstname']); ?>" />
                      </div>

                    </div>


                    <div class="form-group">
                      <label for="studentregno">Student Index/Ref No. </label>
                      <input type="text" class="form-control" id="studentregno" name="studentregno"
                        value="<?php echo htmlentities($row['StudentRegno']); ?>" placeholder="Student Reg no" readonly />

                    </div>
                    <div class="form-group">
                      <label for="progamme">Programme</label>
                      <input type="text" class="form-control" id="progamme" name="progamme"
                        value="<?php echo htmlentities($row['progamme']); ?>" />
                    </div>

                    <div class="form-group">
                      <label for="level">Level</label>
                      <input type="text" class="form-control" id="level" name="level"
                        value="<?php echo htmlentities($row['level']); ?>" />
                    </div>





                    <div class="form-group">
                      <label for="Pincode">Pincode </label>
                      <input type="text" class="form-control" id="Pincode" name="Pincode" readonly
                        value="<?php echo htmlentities($row['pincode']); ?>" required />
                    </div>

                    <div class="form-group">
                      <label for="Pincode">Student Photo </label>
                      <?php if ($row['studentPhoto'] == "") { ?>
                        <img src="studentphoto/noimage.png" width="200" height="200">
                      <?php } else { ?>
                        <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']); ?>" width="200" height="200">
                      <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="Pincode">Upload New Photo </label>
                      <input type="file" class="form-control" id="photo" name="photo"
                        value="<?php echo htmlentities($row['studentPhoto']); ?>" />
                    </div>


                  <?php } ?>

                  <button class="mt-4" type="submit" name="submit" id="submit" class="btn btn-default">Update</button>
                </form>
              </div>
            </div>
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