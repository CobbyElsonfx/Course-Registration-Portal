<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {

  if (isset($_POST['submit'])) {
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $otherName = $_POST['otherName'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $dob = $_POST['dob'];
    $level = $_POST['level'];
    $programme = $_POST['programme'];
    $studentregno = $_POST['studentregno'];
    $password = md5($_POST['password']);
    $pincode = rand(100000, 999999);
    $ret = mysqli_query($con, "insert into students(studentRegno,surname,firstname,otherName,email,contactNumber,level,programme,password,pincode,dob) values('$studentregno','$surname','$firstname','$otherName','$email','$contactNumber','$level','$programme','$password','$pincode', '$dob')");
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
        require '../vendor/autoload.php'; // Include the Composer autoloader
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetFilePath);

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Loop through rows starting from row 2 (assuming the first row is headers)
        foreach ($worksheet->getRowIterator(2) as $row) {
          $studentregno = $worksheet->getCell('A' . $row->getRowIndex())->getValue();
          $surname = $worksheet->getCell('D' . $row->getRowIndex())->getValue();
          $firstname = $worksheet->getCell('E' . $row->getRowIndex())->getValue();
          $othername = $worksheet->getCell('F' . $row->getRowIndex())->getValue();
          $programme = $worksheet->getCell('G' . $row->getRowIndex())->getValue();
          $level = $worksheet->getCell('K' . $row->getRowIndex())->getValue();
          $email = $worksheet->getCell('L' . $row->getRowIndex())->getValue();
          $contactNumber = $worksheet->getCell('M' . $row->getRowIndex())->getValue();
          $dob = $worksheet->getCell('N' . $row->getRowIndex())->getValue();

          $query = "INSERT INTO students (studentRegno,surname, firstname, otherName, programme ,level, email, contactNumber,dob ) 
                          VALUES ('$studentregno','$surname', '$firstname', '$othername' , '$programme', '$level','$email','$contactNumber', '$dob' )
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
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="fas fa-align-justify"></i>
            </button>

          
          </div>
        </nav>

        <div class="  m-auto">
          <!-- <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font> -->
          <div class="panel-body m-auto" class=" shadow-lg" style="width:80%">
            <form class="card shadow-lg" name="programme" method="post">
              <div class="d-flex flex-row justify-content-between">
                <div class="form-group " style="width:45%">
                  <label for="surname">Surname </label>
                  <input type="text" class="form-control" id="surname" name="surname" placeholder="surname" required />
                </div>
                <div class="form-group" style="width:45%">
                  <label for="firtname">Firstname </label>
                  <input type="text" class="form-control" id="firtname" name="firstname" placeholder="firstname"
                    required />
                </div>
              </div>
              <div class="form-group">
                <label for="otherName">Other Name</label>
                <input type="text" class="form-control" id="otherName" name="otherName" placeholder="Other Name" />
              </div>
              <div class="form-group">
                <label for="email">Email </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" />
              </div>
              <div class="d-flex justify-content-between">
                <div class="form-group" style="width:45%">
                  <label for="contactNumber">Contact Number</label>
                  <input type="telephone" class="form-control" id="contactNumber" name="contactNumber"
                    placeholder="+233 **** *** ***" required />
                </div>
                <div class="form-group" style="width:45%">
                  <label for="dob">Date of Birth</label>
                  <input type="date" class="form-control" id="dob" name="dob" placeholder="example@gmail.com" required />
                </div>

              </div>
              <div class="d-flex flex-row justify-content-between">
                <div class="form-group" style="width:45%">
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
                <div class="form-group mx-2" style="width:20%">
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
              <div class="alert alert-warning" role="alert">
                <strong>Warning!</strong> The Excel file to be uploaded must match the headers order and spelling:
                <ul>
                  <li>studentRegno</li>
                  <li>surname</li>
                  <li>firstname</li>
                  <li>otherName</li>
                  <li>programme</li>
                  <li>level</li>
                  <li>email</li>
                  <li>contactNumber</li>
                  <li>dob</li>
                </ul>
              </div>

              <div class="form-group">
                <label for="excelFile">Upload Excel File</label>
                <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx" required />
              </div>
              <div class="d-flex justify-content-between">
                <button type="submit" name="upload" class="btn mt-5 btn-default">Upload Excel</button>
                <a href="./uploads/1702831760_657f2690aa30b.xlsx" download="excel_template">
                  <button type="button" class="btn mt-5 btn-default">Download Template</button>
                </a>


              </div>
            </form>
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
    <script type="text/javascript">
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