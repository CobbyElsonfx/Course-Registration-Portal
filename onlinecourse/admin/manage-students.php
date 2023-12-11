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
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!-- Add the DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

</head>

<body>
    <div class="studensPortalHeader">
        <h1 class="studentPortal">Manage Students</h1>
    </div>
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

                <font color="red" align="center">
                    <?php echo htmlentities($_SESSION['delmsg']); ?>
                    <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                </font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
                                                    <a href="edit-student-profile.php?id=<?php echo $row['StudentRegno'] ?>">
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
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
    <!-- Add the DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        // DataTable initialization script
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
</body>

</html>

<?php ?>