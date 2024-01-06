<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {

  if (isset($_POST['submit'])) {
    $level = $_POST['level'];
    $semester = $_POST['sem'];
    $courseCode = $_POST['courseCode'];
    $grade = $_POST['grade'];
    $studentRegno = $_POST['studentRegno'];
  
    $ret = mysqli_query($con, "insert into results(studentRegno,courseCode,level,grade,semester) values('$studentRegno','$courseCode','$level','$grade','$semester')");
    if ($ret) {
      echo '<script>alert("Results Uploaded Successfully")</script>';
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
            require '../../vendor/autoload.php'; // Include the Composer autoloader
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetFilePath);

            // Get the first worksheet
            $worksheet = $spreadsheet->getActiveSheet();

            // Loop through rows starting from row 2 (assuming the first row is headers)
            foreach ($worksheet->getRowIterator(2) as $row) {
                $studentregno = $worksheet->getCell('A' . $row->getRowIndex())->getValue();
                $courseCode = $worksheet->getCell('D' . $row->getRowIndex())->getValue();
                $grade = $worksheet->getCell('E' . $row->getRowIndex())->getValue();
                $semester = $worksheet->getCell('F' . $row->getRowIndex())->getValue();
                $level = $worksheet->getCell('G' . $row->getRowIndex())->getValue();
               

                $query = "INSERT INTO course (studentRegno,courseCode, grade, semester,level ) 
                          VALUES ('$studentregno','$courseCode', '$grade', '$semester', '$level')";
                mysqli_query($con, $query);
            }

            // Close Excel file and remove uploaded file
            $spreadsheet->disconnectWorksheets();
            unlink($targetFilePath);

            echo '<script>alert("Database updated successfully!")</script>';
            echo '<script>window.location.href=level400.php</script>';
        } else {
            echo '<script>alert("Error uploading file. Please try again.")</script>';
            echo '<script>window.location.href=level400.php</script>';
        }
    } else {
        echo '<script>alert("Invalid file format. Please upload a valid Excel file.")</script>';
        echo '<script>window.location.href=level400.php</script>';
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
    <title>Admin | Level 100 results</title>
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
            
            <div class="  m-auto">
              <!-- <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font> -->
              <div class="panel-body m-auto" class=" shadow-lg" style="width:80%">
            
                <form class="card shadow-lg"  method="post">
                <div>
                <h4>Add Results</h4>
              </div>
                <div class="form-group">
                    <label for="studentRegno">Student Index/Ref Number </label>
                    <input type="text" class="form-control" id="studentRegno" name="studentRegno"
                       placeholder="eg: 200045681" required />

                  </div>
                  <div class="d-flex justify-content-between"> 
                  <div class="form-group" style="width:65%">
                    <label for="level">Level</label>
                    <select class="form-control" id="level" name="level" required>
                      <option value="100">Level 100</option>
                    </select>
                  </div>
                  <div class="form-group"  style="width:30%">
                      <label for="Semester">Semester</label>
                      <select class="form-control" name="sem" required="required">
                        <option value="">Select Semester</option>
                        <?php
                        $sql_sem = mysqli_query($con, "select * from semester");
                        while ($row_sem = mysqli_fetch_array($sql_sem)) {
                          ?>
                          <option value="<?php echo htmlentities($row_sem['id']); ?>">
                            <?php echo htmlentities($row_sem['semester']); ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    

                  </div>
           
                    

                <div  class="d-flex justify-content-between">
                <div class="form-group" style="width:85%">
                      <label for="course">Courese Code</label>
                      <select class="form-control" name="sem" required="required">
                        <option value="">Select Course</option>
                        <?php
                        $level_id = 1;
                        $sql_course = mysqli_query($con, "SELECT * FROM  course WHERE  level_id='$level_id' ");
                        while ($row_course = mysqli_fetch_array($sql_course)) {
                          ?>
                          <option value="<?php echo htmlentities($row_course['id']); ?>">
                            <?php echo htmlentities($row_course['courseCode']." - " .$row_course['courseName']); ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="grade">Grade</label>
                    <select  style="width:7rem" class="form-control" id="grade" name="grade" required>
                      <option value="A">A</option>
                      <option value="B+">B+</option>
                      <option value="B">B</option>
                      <option value="C+">C+</option>
                      <option value="C ">C</option>
                      <option value="D+">D+</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                      <option value="F">F</option>s



                    </select>
                  </div>
                </div>
                
                  <button type="submit" name="submit" id="submit" class="btn btn-default mt-4">Add New Result</button>
                </form>

                <!-- Form for Excel file upload -->
                <form class="card shadow-lg mt-4" method="post" enctype="multipart/form-data">
                  
                  <div class="form-group">
                  <div class="alert alert-warning" role="alert">
    <strong>Warning!</strong> The Excel file to be uploaded must match the headers order and spelling:
    <ul>
        <li>studentRegno</li>
        <li>courseCode</li>
        <li>level</li>
        <li>semester</li>
        <li>grade</li>
        
    </ul>
</div>
                    <label for="excelFile">Upload Excel File</label>
                    <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx"
                      required />
                  </div>
                  <div class="d-flex justify-content-between">
                  <button type="submit" name="upload" class="btn mt-5 btn-default">Upload File</button>
                  <a href="./uploads/1702831760_657f2690aa30b.xlsx" download="excel_template">             
                  <button type="button" class="btn mt-5 btn-default">Download Template</button>
</a>

                    
                  </div>
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
    
    

  </body>

  </html> 
<?php } ?>