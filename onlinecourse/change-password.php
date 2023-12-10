<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  date_default_timezone_set('Asia/Kolkata'); // change according timezone
  $currentTime = date('d-m-Y h:i:s A', time());

  //Code for Change Password
  if (isset($_POST['submit'])) {
    $regno = $_SESSION['login'];
    $currentpass = md5($_POST['cpass']);
    $newpass = md5($_POST['newpass']);
    $sql = mysqli_query($con, "SELECT password FROM  students where password='$currentpass' && studentRegno='$regno'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
      $con = mysqli_query($con, "update students set password='$newpass', updationDate='$currentTime' where studentRegno='$regno'");
      echo '<script>alert("Password Changed Successfully !!")</script>';
      echo '<script>window.location.href=change-password.php</script>';
    } else {
      echo '<script>alert("Current Password not match !!")</script>';
      echo '<script>window.location.href=change-password.php</script>';
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
    <title>Student | Student Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>
  <script type="text/javascript">
    function valid() {
      if (document.chngpwd.cpass.value == "") {
        alert("Current Password Filed is Empty !!");
        document.chngpwd.cpass.focus();
        return false;
      }
      else if (document.chngpwd.newpass.value == "") {
        alert("New Password Filed is Empty !!");
        document.chngpwd.newpass.focus();
        return false;
      }
      else if (document.chngpwd.cnfpass.value == "") {
        alert("Confirm Password Filed is Empty !!");
        document.chngpwd.cnfpass.focus();
        return false;
      }
      else if (document.chngpwd.newpass.value != document.chngpwd.cnfpass.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.cnfpass.focus();
        return false;
      }
      return true;
    }
  </script>

  <body>
    <div class="studensPortalHeader">
      <h1 class="studentPortal">Change Password</h1>
    </div>
    <?php if ($_SESSION['login'] != "") {
      include('includes/menubar.php');
    }
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-default">

              <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font>


              <div class="panel-body">
                <form name="chngpwd" method="post" class="card shadow-lg text-left" onSubmit="return valid();">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass"
                      placeholder="Password" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="newpass"
                      placeholder="Password" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword3" name="cnfpass"
                      placeholder="Password" />
                  </div>

                  <button type="submit" name="submit" class="btn my-4 btn-default">Submit</button>
                  <hr />
                </form>
              </div>
            </div>
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