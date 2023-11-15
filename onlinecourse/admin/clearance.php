<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['a_login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['search'])) {
        $studentIndex = trim($_POST['studentIndex']); // Trim whitespaces
        $studentIndex = mysqli_real_escape_string($con, $studentIndex); // Escape the string for use in a query
        $studentIndex = $_POST['studentIndex'];
        $sql = "SELECT * FROM students WHERE StudentRegno = '$studentIndex'";
        $result = mysqli_query($con, $sql);
    }

    if (isset($_POST['markCleared'])) {
        $studentIndex = $_POST['studentIndex'];
        // Perform the logic to mark the student as cleared and activate their portal
        // This is a placeholder, you need to implement your logic here

        echo '<script>alert("Student marked as cleared and portal activated!");</script>';
    }
    ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Admin | Account Office Dashboard</title>
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
            <h1 class="studentPortal">Account Office Dashboard</h1>
        </div>
        <?php if ($_SESSION['a_login'] != "") {
            include('includes/menubar.php');
        }
        ?>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Account Office Dashboard</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Search Student
                            </div>
                            <div class="panel-body">
                                <form name="searchForm" method="post">
                                    <div class="form-group">
                                        <label for="studentIndex">Student Index/Ref No. </label>
                                        <input type="text" class="form-control" id="studentIndex" name="studentIndex"
                                            placeholder="Student Index" required />
                                    </div>
                                    <button type="submit" name="search" class="btn btn-default">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (isset($result)) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Student Details
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Student Index</th>
                                                <th>Surname</th>
                                                <th>Firstname</th>
                                                <!-- Add more fields as needed -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo htmlentities($row['StudentRegno']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['surname']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['firstname']); ?>
                                                    </td>
                                                    <!-- Add more fields as needed -->
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <form name="markClearedForm" method="post">
                                        <input type="hidden" name="studentIndex" value="<?php echo $studentIndex; ?>">
                                        <button type="submit" name="markCleared" class="btn btn-success">Mark as Cleared and
                                            Activate Portal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
        <script src="../assets/js/jquery-1.11.1.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
    </body>

    </html>
<?php } ?>