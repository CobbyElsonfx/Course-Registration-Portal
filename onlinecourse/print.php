<?php
session_start();
include('includes/config.php');
error_reporting(1);

if (strlen($_SESSION['login']) == 0) {
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
        <title>Enrollment Print</title>
        <!-- Add your CSS styles if needed -->
    </head>

    <body>
        <div class="invoice-box">
            <?php
            // Fetch the enrolled courses directly in the print page
            $courses = [];
            $sql = mysqli_query($con, "SELECT course.courseName as courname, course.courseCode as ccode, course.courseUnit as cunit, programme.program as progr, level.level as level, courseenrolls.enrollDate as edate, semester.semester as sem, students.surname as sname, students.firstname as fname, students.studentPhoto as photo, students.creationdate as studentregdate
            FROM courseenrolls
            JOIN course ON course.id = courseenrolls.course
            JOIN programme ON programme.id = courseenrolls.programme
            JOIN level ON level.id = courseenrolls.level
            JOIN students ON students.StudentRegno = courseenrolls.StudentRegno
            JOIN semester ON semester.id = courseenrolls.semester
            WHERE courseenrolls.studentRegno='" . $_SESSION['login'] . "'");

            $cnt = 1;
            ?>

            <table cellpadding="0" cellspacing="0">
                <?php
                while ($row = mysqli_fetch_array($sql)) {
                    $courses[] = $row; // Store each course information
                    ?>
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <?php if ($row['photo'] == "") { ?>
                                            <img src="studentphoto/noimage.png" width="200" height="200">
                                        <?php } else { ?>
                                            <img src="studentphoto/<?php echo htmlentities($row['photo']); ?>" width="200"
                                                height="200">
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <b> Reg No: </b>
                                        <?php echo htmlentities($_SESSION['login']); ?><br>
                                        <b> Student Name: </b>
                                        <?php echo htmlentities($row['sname'] . " " . $row['fname']); ?><br>
                                        <b> Student Reg Date:</b>
                                        <?php echo htmlentities($row['studentregdate']); ?><br>
                                        <b> Student Course Enroll Date:</b>
                                        <?php echo htmlentities($row['edate']); ?><br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="heading">
                        <td>
                            Course Details
                        </td>

                        <td>

                        </td>
                    </tr>

                    <tr class="details">
                        <td>
                            Course Code
                        </td>

                        <td>
                            <?php echo htmlentities($row['ccode']); ?>
                        </td>
                    </tr>

                    <tr class="details">
                        <td>
                            Course Name
                        </td>

                        <td>
                            <?php echo htmlentities($row['courname']); ?>
                        </td>
                    </tr>

                    <tr class="details">
                        <td>
                            Course unit
                        </td>

                        <td>
                            <?php echo htmlentities($row['cunit']); ?>
                        </td>
                    </tr>

                    <tr class="heading">
                        <td>
                            Other Details
                        </td>

                        <td>

                        </td>
                    </tr>

                    <tr class="item">
                        <td>
                            Programme
                        </td>

                        <td>
                            <?php echo htmlentities($row['progr']); ?>
                        </td>
                    </tr>
                    <tr class="item">
                        <td>
                            Level
                        </td>

                        <td>
                            <?php echo htmlentities($row['level']); ?>
                        </td>
                    </tr>

                    <tr class="item last">
                        <td>
                            Semester
                        </td>

                        <td>
                            <?php echo htmlentities($row['sem']); ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>

    </html>

<?php } ?>
