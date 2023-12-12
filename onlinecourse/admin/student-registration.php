<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {

  if (isset($_POST['submit'])) {
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $level = $_POST['level'];
    $programme = $_POST['programme'];
    $studentregno = $_POST['studentregno'];
    $password = md5($_POST['password']);
    $pincode = rand(100000, 999999);
    $ret = mysqli_query($con, "insert into students(studentregno,surname,firstname,level,programme,password,pincode) values('$studentregno','$surname','$firstname','$level', '$programme','$password','$pincode')");
    if ($ret) {
      echo '<script>alert("Student Registered Successfully")</script>';
      echo '<script>window.location.href=manage-students.php</script>';
    } else {
      echo '<script>alert("Something went wrong. Please try again.")</script>';
      echo '<script>window.location.href=manage-students.php</script>';
    }
  }

  if (isset($_POST['upload'])) {
    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["excelFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileName = basename($_FILES["excelFile"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    $sanitizedFileName = preg_replace("/[^a-zA-Z0-9_-]/", "", $fileName);

    // Generate a unique file name
    $uniqueFileName = time() . '_' . uniqid() . '.' . $fileType;
    $targetFilePath = $targetDir . $uniqueFileName;

    // Allow certain file formats
    $allowedTypes = array('xls', 'xlsx');
    if (in_array($fileType, $allowedTypes)) {
      // Upload file to server
      if (move_uploaded_file($_FILES["excelFile"]["tmp_name"], $targetFilePath)) {
        // Load Excel file
        require '../../vendor/autoload.php'; // Include the Composer autoloader
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetFilePath);

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Loop through rows starting from row 2 (assuming the first row is headers)
        foreach ($worksheet->getRowIterator(2) as $row) {
          $studentregno = $worksheet->getCellByColumnAndRow(1, $row->getRowIndex())->getValue();
          $surname = $worksheet->getCellByColumnAndRow(2, $row->getRowIndex())->getValue();
          $firstname = $worksheet->getCellByColumnAndRow(3, $row->getRowIndex())->getValue();
          $programme = $worksheet->getCellByColumnAndRow(4, $row->getRowIndex())->getValue();


          $query = "INSERT INTO students (surname, firstname, programme, studentregno) 
                          VALUES ('$surname', '$firstname', '$programme', '$studentregno')
                          ON DUPLICATE KEY UPDATE surname = VALUES(surname), firstname = VALUES(firstname),
                          programme = VALUES(programme)";
          mysqli_query($con, $query);
        }

        // Close Excel file and remove uploaded file
        $spreadsheet->disconnectWorksheets();
        unlink($targetFilePath);

        echo '<script>alert("Database updated successfully!")</script>';
        echo '<script>window.location.href=student-registration.php</script>';
      } else {
        echo '<script>alert("Error uploading file. Please try again.")</script>';
        echo '<script>window.location.href=student-registration.php</script>';
      }
    } else {
      echo '<script>alert("Invalid file format. Please upload a valid Excel file.")</script>';
      echo '<script>window.location.href=student-registration.php</script>';
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
    <title>Admin | Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href= "../assets/css/admin_side_nav.css"rel="stylesheet"/>
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                    </div>
                </div>
            </nav>
            
            <div class="panel panel-default  m-auto">
              <!-- <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font> -->
              <div class="panel-body m-auto" class=" shadow-lg" style="width:80%">
                <form class="card shadow-lg" name="dept" method="post">
                  <div class="d-flex flex-row justify-content-between">
                    <div class="form-group "  style="width:45%">
                      <label for="surname">Surname </label>
                      <input type="text" class="form-control" id="surname" name="surname" placeholder="surname"
                        required />
                    </div>
                    <div class="form-group"  style="width:45%">
                      <label for="firtname">Firstname </label>
                      <input type="text" class="form-control" id="firtname" name="firstname" placeholder="firstname"
                        required />
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="otherName">Other Name</label>
                      <input type="text" class="form-control" id="otherName" name="otherName" placeholder="Other Name"
                         />
                    </div>
                    <div class="form-group">
                      <label for="email">Email </label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com"
                         />
                    </div>

                  <div class="form-group">
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
                  </div>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" id="level" name="level" required>
                      <option value="100">Level 100</option>
                      <option value="200">Level 200</option>
                      <option value="300">Level 300</option>
                      <option value="400">Level 400</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="studentregno">Student Index/Ref Number </label>
                    <input type="text" class="form-control" id="studentregno" name="studentregno"
                      onBlur="userAvailability()" placeholder="Student Reg no" required />
                    <span id="user-availability-status1" style="font-size:12px;">
                  </div>
                  <div class="form-group">
                    <label for="password">Password </label>
                    <input type="password" minlength="6" maxlength="10" class="form-control" id="password" name="password"
                      placeholder="Enter password" required />
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-default mt-4">Submit</button>
                </form>

                <!-- Form for Excel file upload -->
                <form class="card shadow-lg mt-4" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="excelFile">Upload Excel File</label>
                    <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx"
                      required />
                  </div>
                  <button type="submit" name="upload" class="btn mt-5 btn-default">Upload Excel</button>
                </form>
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
    <script>
      function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
          url: "check_availability.php",
          data: 'regno=' + $("#studentregno").val(),
          type: "POST",
          success: function (data) {
            $("#user-availability-status1").html(data);
            $("#loaderIcon").hide();
          },
          error: function () { }
        });
      }
    </script>

  </body>

  </html> 
<?php } ?>