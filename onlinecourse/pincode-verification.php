<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  date_default_timezone_set('Asia/Kolkata'); // change according timezone
  $currentTime = date('d-m-Y h:i:s A', time());
  if (isset($_POST['submit'])) {
    $sql = mysqli_query($con, "SELECT * FROM  students where pincode='" . trim($_POST['pincode']) . "' && StudentRegno='" . $_SESSION['login'] . "'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
      $_SESSION['pcode'] = $_POST['pincode'];
      header("location:enroll.php");
    } else {
      echo '<script>alert("Error :Wrong Pincode. Please Enter a Valid Pincode !!")</script>';
      echo '<script>window.location.href=my-pincode-verification.php</script>';
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
    <title>Pincode Verification</title>
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
      <h1 class="studentPortal">Pincode Verification</h1>
    </div>
    <?php if ($_SESSION['login'] != "") {
      include('includes/menubar.php');
    }
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-head-line">Student Pincode Verification</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Pincode Verification
              </div>
              <font color="red" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font>


              <div class="panel-body">
                <form name="pincodeverify" method="post">
                  <div class="form-group">
                    <label for="pincode">Enter Pincode</label>
                    <input type="password" class="form-control" id="pincode" name="pincode" placeholder="Pincode"
                      required />
                  </div>

                  <button type="submit" name="submit" class="btn btn-default  mt-4">Verify</button>
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