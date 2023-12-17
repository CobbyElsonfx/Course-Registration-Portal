
<?php
// fetch_courses.php

include('includes/config.php');
error_reporting(1);

if (isset($_POST['level'])) {
    $level = $_POST['level'];

    // Fetch course data based on the selected level
    $sql = "SELECT courseName, courseCode, COUNT(studentRegno) AS num_students
    FROM course
    LEFT JOIN courseenrolls ON course.id = courseenrolls.course
    JOIN level ON course.level_id = level.id
    WHERE level.level = $level
    GROUP BY course.id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Prepare data for JSON response
        $courseData = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $courseData['courseNames'][] = $row['courseName'] . ' (' . $row['courseCode'] . ')';
            $courseData['num_students'][] = $row['num_students'];
        }

        // Send JSON response
        echo json_encode($courseData);
    } else {
        echo 'Error fetching courses';
    }
} else {
    echo 'Invalid request';
}
?>
