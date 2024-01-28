<?php
session_start();
include('includes/config.php');
error_reporting(1);
if(strlen($_SESSION['alogin'])==0) {   
    header('location:index.php');
} else {
       
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />

    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/admin_side_nav.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
<div class="wrapper">
    <?php if ($_SESSION['alogin'] != "") {
        include('includes/menubar.php');
    }
    ?>
    <div id="content">
    <?php
     if (isset($_POST['clearAll'])) {
        $studentregno = $_SESSION['login'];

        // Execute a query to delete all course enrolls for the current use
        $num =  1;
        $clearAllQuery = mysqli_query($con, "DELETE FROM userlog");


        if ($clearAllQuery) {
            echo '<script>
    new Notify({
        title: "Course Enrolls",
        text: "All course enrolls cleared successfully",
        autoclose: true,
        autotimeout: 3000,
        status: "success"
    });
  </script>';
        } 
    }

    ?>

        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid ">
                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="cutomBtn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>
        
            </div>
        </nav>


        <div class="content-wrapper">
            <div class="container">
                <div class="d-flex justify-content-end">
                 <form method="post" >
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="clearAll" class="cutomBtn text-right btn-danger p-3 actio">Clear All</button>
                        </div>
                    </form>
                </div>
            
        
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default  card">
                            <div class="panel-heading">
                                User logs
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive table-bordered">
                                    <table id="userLogsTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student Reg no</th>
                                                <th>IP</th>
                                                <th>Login Time</th>
                                                <th>Logout Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql=mysqli_query($con,"select * from userlog");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($sql))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo htmlentities($row['studentRegno']);?></td>
                                                <td><?php echo htmlentities($row['userip']);?></td>
                                                <td><?php echo htmlentities($row['loginTime']);?></td>
                                                <td><?php echo htmlentities($row['logout']);?></td>
                                                <td><?php echo htmlentities($row['status']);?></td>
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
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


</body>
</html>
<?php } ?>
