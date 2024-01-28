<?php
session_start();
include('includes/config.php');
error_reporting(1);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollment Print</title>
    <style>
       body {
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}

.invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 20px;
    font-size: 16px;
    line-height: 1.6;
    color: #555;
    border: 1px solid #ddd; /* Add border to the entire box */
    border-radius: 10px; /* Add border radius for a modern look */
    background-color: #fff; /* Set background color */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
}

.invoice-box table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.invoice-box table td, .invoice-box table th {
    padding: 15px;
    border: 1px solid #ddd;
    text-align: left;
}

.invoice-box table th {
    background-color: #f2f2f2;
}

.invoice-box table tr:nth-child(even) {
    background-color: #f5f5f5;
}

.invoice-box table tr:hover {
    background-color: #f5f5f5;
}

.invoice-box table tr.top td {
    padding-bottom: 0;
}

.invoice-box table tr.information td {
    padding-top: 20px;
}

.invoice-box table tr.heading th,
.invoice-box table tr.details td {
    background-color:#fff ; /* Update heading background color */
    color: #555; /* Update heading text color */
    font-weight: bold;
}

.invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td {
    font-weight: bold;
    background-color: #f2f2f2;
}

    </style>
</head>
<body onload="window.print()">
    <div class="invoice-box">
        <?php
        $sql = mysqli_query($con, "SELECT
            courseenrolls.course as cid, students.firstname as firstname, students.surname as surname, students.studentPhoto as photo,
            course.courseName as courname, course.courseCode as ccode, course.semester_id as semId,
            level.level as level,
            courseenrolls.enrollDate as edate
           
            FROM courseenrolls
            JOIN course ON course.id = courseenrolls.course
            JOIN level ON level.level = courseenrolls.level
            JOIN students ON students.studentRegno = courseenrolls.studentRegno
            WHERE courseenrolls.studentRegno='" . $_SESSION['login'] . "'");
        $row = mysqli_fetch_array($sql);
        ?>

        <table>
            <tr class="top">
                <td colspan="2">
                    <b>Reg No:</b> <?php echo htmlentities($_SESSION['login']); ?><br>
                    <b>Student Name:</b> <?php echo htmlentities($row['surname'] . " " . $row['firstname']); ?><br>
                    <b>Date:</b> <?php echo htmlentities($row['edate']); ?><br>
                    <b>Semester:</b> <?php echo htmlentities($row['semId']); ?><br>
                    <b>Level:</b> <?php echo htmlentities($row['level']); ?>
                </td>
            </tr>

            <tr class="heading">
                <th>Course Details</th>
                <th></th>
            </tr>

            <?php
            mysqli_data_seek($sql, 0);

            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <tr class="details">
                    <td>Course Code</td>
                    <td><?php echo htmlentities($row['ccode']); ?></td>
                </tr>

                <tr class="details">
                    <td>Course Name</td>
                    <td><?php echo htmlentities($row['courname']); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

<?php } ?>