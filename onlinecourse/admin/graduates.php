<?php
session_start();
include('includes/config.php');


error_reporting(0);

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    // Code for Deletion
    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from graduation where studentRegno = '" . $_GET['id'] . "'");
        echo '<script>alert("Student Record Deleted Successfully !!")</script>';
        echo '<script>window.location.href=graduates.php</script>';
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Francis Andoh" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="../assets/css/admin_side_nav.css" rel="stylesheet" />
    <title>Graduates | Manage Students</title>

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
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>


                </div>
            </nav>


            <div class="page-instructions">
                <strong>Instructions:</strong>
                <p>
                    This page allows you to manage student details. You can search for student information using
                    parameters
                    such as index number and name. You can also delete student records from the database.
                </p>

            </div>




            <div>
                <font color="red" align="center">
                    <?php echo htmlentities($_SESSION['delmsg']); ?>
                    <?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                </font>
                <div class=" row">
                    <!--    Bordered Table  -->
                    <div class="mt-5 ">
                        <div class="panel-body card">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reg No </th>
                                            <th>Student Name </th>
                                            <th>Graduation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($con, "select * from graduation");

                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $cnt; ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlentities($row['studentRegno']); ?>
                                                </td>



                                                <td>
                                                    <?php echo htmlentities($row['surname'] . " " . $row['firstname'] . " " . $row['otherName']); ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlentities($row['graduationDate']); ?>
                                                </td>
                                                <td>

                                                    <div class="mt-1">

                                                        <a href="graduates.php?id=<?php echo $row['studentRegno'] ?>&del=delete"
                                                            onClick="return confirm('Are you sure you want to delete?')">
                                                            <button class=" deleteBtn"><i class="fa fa-trash"></i></button>
                                                        </a>
                                                    </div>

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
                    <div class="warning-card">
                        <div class="card-header">Warning</div>
                        <div class="card-body">
                            <div class="col-7">
                                <h5 class="card-title">DELETE RECORDS</h5>
                                <p class="card-text">Clicking the "Delete" button will perform a batch password reset
                                    for Selected Year.
                                    This action is irreversible. Please ensure you have considered the implications
                                    before proceeding.</p>
                            </div>
                            <div class="col-5">
                                <form method="post">
                                    <div class="mx-3 d-flex form mb-3 justify-content-between">
                                        <label>Choose the Particular Date</label>
                                        <select class="form-control mx-2" style="width:40%" name="dateToDelete">
                                            <?php
                                            // Assuming you have a database connection
                                            
                                            // Query to fetch distinct years from the graduation table
                                            $query = "SELECT DISTINCT graduationDate FROM graduation";
                                            $result = mysqli_query($con, $query);

                                            // Check if the query was successful
                                            if ($result) {
                                                // Loop through the result set to generate options
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $date = $row["graduationDate"];
                                                    echo "<option value=\"$date\">$date</option>";
                                                }
                                                mysqli_free_result($result);
                                            } else {
                                                echo "Error: " . mysqli_error($con);
                                            }

                                            // Close the database connection
                                            mysqli_close($con);
                                            ?>
                                        </select>

                                    </div>
                                    <button class="action-button form-control" id="deleteRecords" type="submit"
                                        name="deleteRecords">
                                        DELETE
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
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