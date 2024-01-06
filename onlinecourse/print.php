

    <?php
session_start();
include('includes/config.php');
error_reporting(1);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    ?>

    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Course Enrollment Print</title>
        <!-- jsPDF -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

        <!-- print.js -->
        <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

        <style>
            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 20px;
                font-size: 16px;
                line-height: 18px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 10px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 30px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }
        </style>
    </head>

    <body  onload="window.print()">
        <div class="invoice-box">
            <?php
            $sql = mysqli_query($con, "SELECT
                courseenrolls.course as cid, students.firstname as firstname,students.surname as surname,students.studentPhoto as photo,
                course.courseName as courname, course.courseCode as ccode,
                level.level as level,
                courseenrolls.enrollDate as edate,
                semester.semester as sem
                FROM courseenrolls
                JOIN course ON course.id = courseenrolls.course
                JOIN level ON level.level = courseenrolls.level
                JOIN semester ON semester.id = courseenrolls.semester
                JOIN students ON students.studentRegno = courseenrolls.studentRegno
                WHERE courseenrolls.studentRegno='" . $_SESSION['login'] . "'");
            $cnt = 1;
            $row = mysqli_fetch_array($sql);
            ?>

            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <?php if ($row['photo'] == "") { ?>
                                        <img src="studentphoto/noimage.png" width="200" height="200">
                                    <?php } else { ?>
                                        <img src="studentphoto/<?php echo htmlentities($row['photo']); ?>" width="200" height="200">
                                    <?php } ?>
                                </td>

                                <td>
                                    <b> Reg No: </b>
                                    <?php echo htmlentities($_SESSION['login']); ?><br>
                                    <b> Student Name: </b>
                                    <?php echo htmlentities($row['surname'] . "" . $row['firstname']); ?><br>
                                    <b> Student Course Enroll Date:</b>
                                    <?php echo htmlentities($row['edate']); ?><br>

                                    <b> Semester:</b>
                                    <?php echo htmlentities($row['sem']); ?><br>
                                    <b> Level:</b>
                                    <?php echo htmlentities($row['level']); ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <?php
                while ($row = mysqli_fetch_array($sql)) {
                ?>
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

                <?php } ?>

            </table>

        </div>


    </body>

    </html>
<?php } ?>
