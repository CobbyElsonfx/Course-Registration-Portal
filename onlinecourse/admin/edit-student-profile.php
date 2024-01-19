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
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../studentphoto/" . $_FILES["photo"]["name"]);
    $ret = mysqli_query($con, "update students set surname='$surname', firstname='$firstname', otherName= '$otherName',dob = '$dob',email= '$email', contactNumber='$contactNumber', programme='$programme' ,studentPhoto='$photo' where studentRegno='$regid'");
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
        <title>Enroll History</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
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

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid ">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                  
                </div>
            </nav>
 
           
    
    <!-- MENU SECTION END-->
    <div>
      <a class="btn btn-primary" href="manage-students.php" role="button"><i class="fa fa-caret-left"></i>Back</a>

    </div>
      <div>
        <div>
          <div class="row">
            <div class="col-md-12">
              <h1 class="page-head-line">STUDENT REGISTRATION </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 mx-auto">
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

                $sql = mysqli_query($con, "select * from students where studentRegno='$regid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($sql)) { ?>

                  <div class="panel-body card">
                    <form name="dept" method="post" enctype="multipart/form-data">

                    <div class="form-group my-4 ">
                        <label for="studentphoto">Student Photo </label>
                        <?php if ($row['studentPhoto'] == "") { ?>
                          <img src="../studentphoto/noimage.jpg" width="200" height="200"  style="border-radius: 50%;  border:2px solid gray">
                        <?php } else { ?>
                          <img src="../studentphoto/<?php echo htmlentities($row['studentPhoto']); ?>" width="200" height="200" style="border-radius: 50%;border:2px solid gray">
                        <?php } ?>
                      </div>


                  
                      <div class="form-group my-3">
                        <label for="studentphoto">Upload New Photo </label>
                        <input type="file" class="form-control" id="photo" name="photo"
                          value="<?php echo htmlentities($row['studentPhoto']); ?>" />
                      </div>
                      <div class="d-flex  flex-row justify-content-between">
                        <div class="form-group" style="width:35%">
                          <label for="surname">Surname </label>
                          <input type="text" class="form-control" id="surname" name="surname"
                            value="<?php echo htmlentities($row['surname']); ?>" />
                        </div>
                        <div class="form-group mx-2"   style="width:35%">
                          <label for="firstname">First Name</label>
                          <input type="text" class="form-control" id="firstname" name="firstname"
                            value="<?php echo htmlentities($row['firstname']); ?>" />
                        </div>
                        <div class="form-group "   style="width:35%">
                          <label for="otherName">Other Name</label>
                          <input type="text" class="form-control" id="otherName" name="otherName"
                            value="<?php echo htmlentities($row['otherName']); ?>" />
                        </div>
                      </div>
                

                        <div class="d-flex  flex-row justify-content-between">
                        <div class="form-group">
                          <label for="dob">Date Of Birth</label>
                          <input type="text" class="form-control" id="dob" name="dob"
                            value="<?php echo htmlentities($row['dob']); ?>" />
                        </div>
                        <div class="form-group mx-2"  style="width:45%">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email" name="email"
                            value="<?php echo htmlentities($row['email']); ?>" />
                        </div>
                        <div class="form-group">
                          <label for="contactNumber">Contact Number</label>
                          <input type="text" class="form-control" id="contactNumber" name="contactNumber"
                            value="<?php echo htmlentities($row['contactNumber']); ?>" />
                        </div>

                        </div>

                    
                        <div  class="d-flex flex-row  my-3 justify-content-between ">
                          
                      <div class="form-group" style="width:65%; margin-right: 1rem;">
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
                      
                      <div class="form-group ml-2"  style="width:35%">
                        <label for="studentregno">Student Index/Ref No </label>
                        <input type="text" class="form-control" id="studentregno" name="studentregno"
                          value="<?php echo htmlentities($row['studentRegno']); ?>" placeholder="Student Reg no" readonly />
                      </div>

                        </div>
                        


                  

                <?php } ?>

                <button type="submit" name="submit" id="submit" class="btn btn-default mt-2 form-control">Update</button>
                </form>
              </div>
            </div> 
          </div>

        </div>
      </div>
      </div>
                          </div>

                          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

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