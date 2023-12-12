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
    <title>Programme</title>
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

    <!-- MENU SECTION END-->
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
            

        <div>
          <div>
            <div class="panel panel-default m-auto card" style="width:70%;">
              <font color="green" align="center">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
              </font>


              <div class="panel-body"  >
                <form name="programme" method="post">
                  <div class="form-group"  >
                    <label for="Programme">Add Programme </label>
                    <input type="text" class="form-control" id="Programme" name="programme" placeholder="programme"
                      required />
                  </div>
                  <button type="submit" name="submit" class="btn btn-default mt-4">Submit</button>
                </form>
              </div>
            </div>
          </div>

     
        <font color="red" align="center">
          <?php echo htmlentities($_SESSION['delmsg']); ?>
          <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
        </font>
        <div class="col-md-12">
          <!--    Bordered Table  -->
          <div class="panel panel-default card">
            <div class="panel-heading">
              Manage Programme
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