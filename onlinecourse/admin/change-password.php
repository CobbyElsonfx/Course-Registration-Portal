<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  date_default_timezone_set('Asia/Kolkata'); // change according timezone
  $currentTime = date('d-m-Y h:i:s A', time());


  if (isset($_POST['submit'])) {
    $sql = mysqli_query($con, "SELECT password FROM  admin where password='" . md5($_POST['cpass']) . "' && username='" . $_SESSION['alogin'] . "'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
      $con = mysqli_query($con, "update admin set password='" . md5($_POST['newpass']) . "', updationDate='$currentTime' where username='" . $_SESSION['alogin'] . "'");
      echo '<script>alert("Password Changed Successfully !!")</script>';
      echo '<script>window.location.href=change-password.php</script>';
    } else {
      echo '<script>alert("Old Password not match !!")</script>';
      echo '<script>window.location.href=change-password.php</script>';
    }
  }
  ?>

  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8" />
    <title>Admin | Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
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
    <?php if ($_SESSION['alogin'] != "") {
      include('includes/menubar.php');
    }
    ?>
    <div class="content-wrapper card">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="page-head-line">Change Password </h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">


              <div class="panel-body">
                <form name="chngpwd" class="card shadow-lg " method="post" onSubmit="return valid();">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass"
                      placeholder="Password" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="newpass"
                      placeholder="New Password" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword3" name="cnfpass"
                      placeholder="Confirm Password" />
                  </div>

                  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                  <hr />




                </form>
              </div>
            </div>
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