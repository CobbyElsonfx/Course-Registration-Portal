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
      echo '<script>alert("Student Registered Successfully. Pincode is "+"' . $pincode . '")</script>';
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
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="studensPortalHeader">
      <h1 class="studentPortal">Student Registration</h1>
    </div>
    <!-- LOGO HEADER END-->
    <?php if ($_SESSION['alogin'] != "") {
      include('includes/menubar.php');
    }
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Student Registration
              </div>
              <!-- <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font> -->
              <div class="panel-body" class=" shadow-lg">
                <form class="card shadow-lg" name="dept" method="post">
                  <div class="d-flex flex-row justify-content-between">
                    <div class="form-group ">
                      <label for="surname">Surname </label>
                      <input type="text" class="form-control" id="surname" name="surname" placeholder="surname"
                        required />
                    </div>
                    <div class="form-group">
                      <label for="firtname">Firstname </label>
                      <input type="text" class="form-control" id="firtname" name="firstname" placeholder="firstname"
                        required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="level">Level </label>
                    <input type="text" class="form-control" id="level" name="level" placeholder="level" required />
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
                    <label for="studentregno">Student Index/Ref Number </label>
                    <input type="text" class="form-control" id="studentregno" name="studentregno"
                      onBlur="userAvailability()" placeholder="Student Reg no" required />
                    <span id="user-availability-status1" style="font-size:12px;">
                  </div>
                  <div class="form-group">
                    <label for="password">Password </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
                      required />
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button>
                </form>

                <!-- Form for Excel file upload -->
                <form class="card shadow-lg mt-4" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="excelFile">Upload Excel File</label>
                    <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx"
                      required />
                  </div>
                  <button type="submit" name="upload" class="btn btn-default">Upload Excel</button>
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
    <script src="../assets/js/bootstrap.js"></script>
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