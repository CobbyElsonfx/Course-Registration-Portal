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
        <title>Student | Student Password</title>




        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/results.css" rel="stylesheet" />

    </head>

    <body>

        <div class="studensPortalHeader">
            <h1 class="studentPortal">Results</h1>
        </div>
        <?php if ($_SESSION['login'] != "") {
            include('includes/menubar.php');
        }

        // Fetch student details
        $sql = mysqli_query($con, "select * from students where studentRegno='" . $_SESSION['login'] . "'");
        $row = mysqli_fetch_array($sql);
        $studentName = $row['surname'] . " " . $row['firstname'] . " " . $row['otherName'];
        $studentRegNo = $row['studentRegno'];
        $programme = $row['programme'];

        // Fetch all results for the student
        $resultQuery = "SELECT * FROM results WHERE studentRegno='$studentRegNo'";
        $resultData = mysqli_query($con, $resultQuery);

        // Organize results by level and semester
        $organizedResults = array();
        while ($resultRow = mysqli_fetch_array($resultData)) {
            $level = $resultRow['level'];
            $semester = $resultRow['semester'];
            $resultRow['level'] = $level; // Add level information to the result row
            $organizedResults[$level][$semester][] = $resultRow;
        }
        ?>

<div class="mt-5 mb-5">
    <div class="generateResults">
        <div class="d-flex justify-content-between w-75 m-auto">
            <div class="d-flex">
                <div class="mx-2">
                    <label>Semester</label>
                    <select class="semester form-control" name="semester">
                        <option value="1">First Semester</option>
                        <option value="2">Second Semester</option>
                    </select>
                </div>
                <div class="mx-2">
                    <div>
                        <label>Level</label>
                        <select class="level form-control" name="level">
                            <!-- Add options dynamically based on available levels -->
                            <?php
                            // Fetch and populate levels from your database
                            $levelQuery = "SELECT DISTINCT level FROM results";
                            $levelData = mysqli_query($con, $levelQuery);

                            while ($levelRow = mysqli_fetch_assoc($levelData)) {
                                echo "<option value='" . $levelRow['level'] . "'>" . $levelRow['level'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="button" class="cutomBtn px-3" id="generateBtn">Generate</button>
        </div>
    </div>

    <!-- Instructional Text -->
    <p class="instructionText text-center">
        Select the semester and level to generate results. Click the "Generate" button to view your results.
    </p>

    <!-- Example No Results Text -->
    <p class="noResultsText" id="noResultsMessage" style="display: none;">
        No results found for the selected semester and level.
    </p>
</div>
        <div id="resultsContainer" style="min-height:30vh;">
            <!-- Display results here using AJAX -->
        </div>

        <?php include('includes/footer.php'); ?>
        <script src="assets/js/jquery-1.11.1.js"></script>
        <script>
            $(document).ready(function () {
                // Event listener for the "Generate" button
                $('#generateBtn').click(function () {
                    var level = $('.level').val();
                    var semester = $('.semester').val();

                    // AJAX request to fetch and display results
                    $.ajax({
                        type: 'POST',
                        url: 'fetch_results.php',
                        data: { level: level, semester: semester },
                        dataType: 'html',
                        success: function (response) {
                            // Update the results container with fetched data
                            $('#resultsContainer').html(response);
                        },
                        error: function () {
                            console.log('Error in AJAX request');
                        },
                    });
                });
            });
        </script>
        <script>
            window.jsPDF = window.jspdf.jsPDF;
            function generatePDF() {
                // Capture the content of the results container using html2canvas
                html2canvas(document.getElementById('resultsContainer')).then(function (canvas) {
                    // Calculate the aspect ratio to maintain the A4 size (210mm x 297mm)
                    var aspectRatio = canvas.width / canvas.height;
                    var pdfWidth = 210;
                    var pdfHeight = pdfWidth / aspectRatio;

                    // Create a PDF document using jsPDF
                    var pdf = new jsPDF('p', 'mm', 'a4');
                    pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, pdfWidth, pdfHeight);

                    // Download the PDF
                    pdf.save('results.pdf');
                });
            }
        </script>


        <script src="assets/js/jquery-1.11.1.js"></script>
    </body>

    </html>
<?php } ?>