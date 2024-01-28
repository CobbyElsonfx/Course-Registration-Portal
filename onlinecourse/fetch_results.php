<?php
session_start();
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $level = $_POST['level'];
    $semester = $_POST['semester'];

    // Fetch student details
    $sql = mysqli_query($con, "select * from students where studentRegno='" . $_SESSION['login'] . "'");
    $row = mysqli_fetch_array($sql);
    $studentName = $row['surname'] . " " . $row['firstname'] . " " . $row['otherName'];
    $studentRegNo = $row['studentRegno'];
    $programme = $row['programme'];

    // Fetch all results for the student
    $resultQuery = "SELECT * FROM results WHERE studentRegno='$studentRegNo'";
    $resultData = mysqli_query($con, $resultQuery);

    // Fetch results based on selected level and semester
    $resultQuery = "SELECT * FROM results WHERE level = '$level' AND semester = '$semester'";
    $resultData = mysqli_query($con, $resultQuery);

    // Organize results by level and semester (similar to your existing logic)
    $organizedResults = array();
    while ($resultRow = mysqli_fetch_array($resultData)) {
        $level = $resultRow['level'];
        $semester = $resultRow['semester'];
        $resultRow['level'] = $level; // Add level information to the result row
        $organizedResults[$level][$semester][] = $resultRow;
    }

    // Display the results (similar to your existing logic)
    foreach ($organizedResults as $level => $semesterResults) {
        foreach ($semesterResults as $semester => $results) {
            ?>
            <div class="shadow-lg p-4 mt-5 mb-5 mx-md-5 m-sm-2">
                <div class="card-body  d-flex flex-column  ">
                    <!-- Student Details -->
                    <!--  -->
                    <div class="d-flex align-items-center flex-column">
                        <div>
                            <img class="schoolLogo" src="./assets/img/schoolLogo.png">
                        </div>
                        <div >
                            <h3 class="card-title">Wiawso College Of Education</h3>
                            <h5  class="fs-4 text-center">Sefwi Wiawso - Western North Region</h5>
                        </div>
                    </div>
                    <!--  -->
                    <div class="d-flex justify-content-between">
                        <?php
                        // Fetch the corresponding program name from the programme table
                        $programQuery = "SELECT program FROM programme WHERE id = '$programme'";
                        $programResult = mysqli_query($con, $programQuery);

                        $programRow = mysqli_fetch_assoc($programResult);
                        $programName = htmlentities($programRow['program']);



                        ?>
                        <div>
                            <ul class="d-flex flex-wrap align-items-center text-center">
                                <li><span class="fw-bold  mx-2">Name : </span>
                                    <?php echo htmlentities($studentName) ?>
                                </li>
                                <li><span class="fw-bold  mx-2">Index/Ref No.:</span>
                                    <?php echo htmlentities($studentRegNo) ?>
                                </li>
                                <li><span class="fw-bold mx-2 ">Programme:</span>
                                    <?php echo htmlentities($programName) ?>
                                </li>
                                <li><span class="fw-bold mx-2">Level:</span>
                                    <?php echo htmlentities($level) ?>
                                </li>
                                <?php
                                if ($semester == 1) {
                                    $semester = "First Semester";
                                } else {
                                    $semester = "Second Semester";
                                }

                                ?>
                                <li><span class="fw-bold mx-2">Sem:</span>
                                    <?php echo htmlentities($semester) ?>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Courses and Grades -->
                <table class="table">
    <thead>
        <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Define grade points for each grade
        $gradePoints = array(
            'A' => 4.0,
            'B+' => 3.5,
            'B' => 3.0,
            'C+' => 2.5,
            'C' => 2.0,
            'D+' => 1.5,
            'D' => 1.0,
            'F' => 0.0,
        );

        // Initialize variables for CGPA calculation
        $totalCreditHours = 0;
        $totalGradePoints = 0;

        foreach ($results as $result) {
            echo "<tr>";
            echo "<td>" . htmlentities($result['courseCode']) . "</td>";
            echo "<td>" . htmlentities($result['courseName']) . "</td>";
            echo "<td>" . htmlentities($result['grade']) . "</td>";
            echo "</tr>";

            // Calculate grade points for the current result
            $creditHours = (int) $result['courseUnit'];
            $grade = strtoupper($result['grade']);
            $gradePoint = isset($gradePoints[$grade]) ? $gradePoints[$grade] : 0;

            // Update total grade points and credit hours
            $totalGradePoints += ($creditHours * $gradePoint);
            $totalCreditHours += $creditHours;
        }

        // Calculate CGPA
        $cgpa = ($totalCreditHours > 0) ? round($totalGradePoints / $totalCreditHours, 2) : 0;

        echo "<div>";
        echo "<h5>CGPA: <span style='font-weight: bold;'>$cgpa</span></h5>";
        echo "</div>";
        ?>
    </table>

                <div class="d-flex justify-content-end">

                <button class="cutomBtn mt-4     m-auto" onclick="generatePDF()" >
                                           print
                                        </button> 
                </div>


          
            </div>
            <?php
        }
    }
}
?>
