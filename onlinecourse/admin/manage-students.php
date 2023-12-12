<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // Code for Deletion
    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from students where StudentRegno = '" . $_GET['id'] . "'");
        echo '<script>alert("Student Record Deleted Successfully !!")</script>';
        echo '<script>window.location.href=manage-students.php</script>';
    }

    // Code for Password Reset
    if (isset($_GET['pass'])) {
        // Function to generate a random password
        function generateRandomPassword($length = 8)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $password;
        }

        // Generate a random password
        $randomPassword = generateRandomPassword();

        $newpass = md5($randomPassword);
        mysqli_query($con, "update students set password='$newpass' where StudentRegno = '" . $_GET['id'] . "'");
        echo '<script>alert("Password Reset. New Password is ' . $randomPassword . '")</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!-- Add the DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href= "../assets/css/admin_side_nav.css"rel="stylesheet"/>
    <title>Admin | Manage Students</title>
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
            
            <div >
                <font color="red" align="center">
                    <?php echo htmlentities($_SESSION['delmsg']); ?>
                    <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                </font>
                <div class=" row">
                    <!--    Bordered Table  -->
                    <div class="panel  mt-5 panel-default">
                        <div class="panel-body card">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reg No </th>
                                            <th>Student Name </th>
                                            <th>Reg Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($con, "select * from students");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $cnt; ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlentities($row['StudentRegno']); ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlentities($row['surname'] . " " . $row['firstname']); ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlentities($row['creationdate']); ?>
                                                </td>
                                                <td>
                                                    <a
                                                        href="edit-student-profile.php?id=<?php echo $row['StudentRegno'] ?>">
                                                        <button class="btn btn-primary"><i class="fa fa-edit "></i>
                                                            Edit</button>
                                                    </a>
                                                    <a href="manage-students.php?id=<?php echo $row['StudentRegno'] ?>&del=delete"
                                                        onClick="return confirm('Are you sure you want to delete?')">
                                                        <button class="btn btn-primary">Delete</button>
                                                    </a>
                                                    <a href="manage-students.php?id=<?php echo $row['StudentRegno'] ?>&pass=update"
                                                        onClick="return confirm('Are you sure you want to reset password?')">
                                                        <button type="submit" name="submit" id="submit"
                                                            class="btn btn-default">Reset Password</button>
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
                    <!--  End  Bordered Table  -->
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
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        // DataTable initialization script
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
</body>

</html>

<?php ?>