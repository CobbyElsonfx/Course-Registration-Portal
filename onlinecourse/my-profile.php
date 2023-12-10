<?php
session_start();
include('includes/config.php');
error_reporting(1);
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
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/my_profile.css" rel="stylesheet" />

  </head>

  <body>
    <div class="studensPortalHeader">
      <h1 class="studentPortal">Profile Page </h1>
    </div>
    <!-- LOGO HEADER END-->
    <?php if ($_SESSION['login'] != "") {
      include('includes/menubar.php');
    }
    ?>



    <!-- MENU SECTION END-->
    <div class="content-wrapper">

      <div class="container bootstrap snippets bootdey">
        <font color="green" align="center">
          <?php echo htmlentities($_SESSION['msg']); ?>
          <?php echo htmlentities($_SESSION['msg'] = ""); ?>
        </font>
        <?php $sql = mysqli_query($con, "select * from students where StudentRegno='" . $_SESSION['login'] . "'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($sql)) { ?>
          <div class="row">
            <div class="profile-nav col-md-3">
              <div class="panel">
                <div class="user-heading round">
                  <a href="#">
                    <?php if ($row['studentPhoto'] == "") { ?>
                      <img src="studentphoto/noimage.png" class="rounded-3" width="200" height="200">
                    <?php } else { ?>
                      <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']); ?>" width="200" height="200">
                    <?php } ?>
                  </a>
                  <h1>
                    <?php echo htmlentities($row['surname'] . " " . $row['firstname']); ?>
                  </h1>
                  <span>Current Level:
                    <?php echo htmlentities($row['level']); ?>
                  </span>
                  <p><?php echo htmlentities($row['email']); ?></p>
                </div>
              </div>
            </div>
            <div class="profile-info col-md-9">
              <div class="panel card shadow-md">
                <div class="bio-graph-heading ">
                  Welcome to your Peronal Dashboard </div>
                <div class="panel-body bio-graph-info mt-2">
                  <h1>Personal Details</h1>
                  <div class="row d-flex">
                    <div class="bio-row">
                      <p><span>First Name </span>:
                        <?php echo htmlentities($row['firstname']); ?>
                      </p>
                    </div>
                    <div class="bio-row">
                      <p><span>Last Name </span>:
                        <?php echo htmlentities($row['surname']); ?>
                      </p>
                    </div>
                    <div class="bio-row">
                      <p><span>Country </span>: Ghana</p>
                    </div>
                    <div class="bio-row">
                      <p><span>Birthday</span>: 13 July 1983</p>
                    </div>
                    <div class="bio-row">
                      <p><span>Index Number </span>:
                        <?php echo htmlentities($row['StudentRegno']); ?>
                      </p>
                    </div>
                    <div class="bio-row">
                      <p><span>Email </span>: <?php echo htmlentities($row['email']); ?></p>
                    </div>
                    <?php
                    // Assuming the program ID is stored in $row['program_id']
                    $programId = $row['programme'];

                    // Fetch the corresponding program name from the programme table
                    $programQuery = "SELECT program FROM programme WHERE id = '$programId'";
                    $programResult = mysqli_query($con, $programQuery);

                    if ($programResult && $programRow = mysqli_fetch_assoc($programResult)) {
                      $programName = htmlentities($programRow['program']);
                    } else {
                      // Handle the case where the program ID doesn't exist in the programme table
                      $programName = "Unknown Program";
                    }
                    ?>
                    <div class="bio-row">
                      <p><span>Programme </span>:
                        <?php echo $programName; ?>
                      </p>
                    </div>
                    <div class="bio-row">
                      <p><span>Contact: </span> <?php echo htmlentities($row['contactNumber']); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>

    </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>

  </html>
<?php } ?>