<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {

  if (isset($_POST['submit'])) {
    $programme = $_POST['programme'];
    $ret = mysqli_query($con, "insert into programme(program) values('$programme')");
    if ($ret) {
      echo '<script>alert("programme Created Successfully !!")</script>';
      echo '<script>window.location.href=deprtment.php</script>';
    } else {
      echo '<script>alert("Error : programme not created")</script>';
      echo '<script>window.location.href=deprtment.php</script>';
    }
  }
  //Delete the programme
  if (isset($_GET['del'])) {
    $progrid = $_GET['id'];
    mysqli_query($con, "delete from programme where id = '$progrid'");
    echo '<script>alert("programme deleted !!")</script>';
    echo '<script>window.location.href=deprtment.php</script>';
  }
  ?>

  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <title>Admin | programme</title>
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
      <h1 class="studentPortal">Programme</h1>
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
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Programme
              </div>
              <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font>


              <div class="panel-body">
                <form name="dept" method="post">
                  <div class="form-group">
                    <label for="Programme">Add Programme </label>
                    <input type="text" class="form-control" id="Programme" name="programme" placeholder="programme"
                      required />
                  </div>
                  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </form>
              </div>
            </div>
          </div>

        </div>
        <font color="red" align="center">
          <?php echo htmlentities($_SESSION['delmsg']); ?>
          <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
        </font>
        <div class="col-md-12">
          <!--    Bordered Table  -->
          <div class="panel panel-default">
            <div class="panel-heading">
              Manage Session
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive table-bordered">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>programme</th>
                      <th>Creation Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from programme");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $cnt; ?>
                        </td>
                        <td>
                          <?php echo htmlentities($row['program']); ?>
                        </td>
                        <td>
                          <?php echo htmlentities($row['creationDate']); ?>
                        </td>
                        <td>
                          <a href="department.php?id=<?php echo $row['id'] ?>&del=delete"
                            onClick="return confirm('Are you sure you want to delete?')">
                            <button class="btn btn-primary">Delete</button>
                          </a>
                        </td>
                      </tr>
                      <?php
                      $cnt++;
                    } ?>


                  </tbody>
                </table>
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
  </body>

  </html>
<?php } ?>