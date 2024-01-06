<?php
session_start();
include('includes/config.php');
error_reporting(1);

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    function getTotalStudentsByLevel($con, $level) {
        $sql = "SELECT COUNT(*) AS total_students FROM students WHERE level = $level";
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_students'];
        } else {
            return 0; // Error handling
        }
    }
    
    // Storing to variables
    $totalStudentsLevel100 = getTotalStudentsByLevel($con, 100);
    $totalStudentsLevel200 = getTotalStudentsByLevel($con, 200);
    $totalStudentsLevel300 = getTotalStudentsByLevel($con, 300);
    $totalStudentsLevel400 = getTotalStudentsByLevel($con, 400);
 

    
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
      <link href="../assets/css/style.css" rel="stylesheet" />

    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/analytics_dashboard.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    <link href= "../assets/css/admin_side_nav.css"rel="stylesheet"/>
    <title>Admin | Analytics</title>


    
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
            
            


            <div>
    <?php
    $sql = "SELECT COUNT(*) AS total_students FROM students";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalStudents = $row['total_students'];
    } else {
        $totalStudents = 0; // Error handling
    }
    ?>
    
    <h2>Total Students</h2>
    <div class="grid-box">
        <h2>Total Population</h2>
        <p><?php echo "Total Students: " . $totalStudents; ?></p>
    </div>
</div>

            <main>
        <!-- Grid Boxes for Total Number of Students -->
        <div class="grid-box">
            <h2>Level 100</h2>
            <p><?php echo "Total Students:". $totalStudentsLevel100  ?></p>
        </div>

        <div class="grid-box">
            <h2>Level 200</h2>
            <p><?php echo "Total Students:". $totalStudentsLevel200  ?></p>
        </div>

        <div class="grid-box">
            <h2>Level 300</h2>
            <p><?php echo "Total Students:". $totalStudentsLevel300  ?></p>
        </div>

        <div class="grid-box">
            <h2>Level 400</h2>
            <p><?php echo "Total Students:". $totalStudentsLevel400  ?></p>
        </div>

        <!-- Grid for Pie Chart (Programs) -->
        <div class="grid-box chart-box">
            <h2>Programs</h2>
            <canvas id="programChart"></canvas>
        </div>
        <div class="grid-box chart-box">
            <h2>Programs</h2>
            <canvas id="anotherChart"></canvas>
        </div>


        <!-- Grid for Courses with Side Filter -->
        <div class="grid-box course-box">
            
            <h2>Courses</h2>
            <div class="filter">
                <label for="levelFilter">Filter by Level:</label>
                <select id="levelFilter">
                    <option value="100">Level 100</option>
                    <option value="200">Level 200</option>
                    <option value="300">Level 300</option>
                    <option value="400">Level 400</option>
                </select>
            </div>
            <div class="course-chart">
        <canvas id="courseChart"></canvas>
    </div>
        </div>
    </main>
        
        </div>
</div>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script>

    $(document).ready(function () {

  
        var programChart; // Declare the chart variable outside of the function

// Function to update the pie chart for programs
// Function to update the pie chart for programs
function updateProgramChart(data) {
    var ctx = document.getElementById('programChart').getContext('2d');

    var chartData = {
        labels: data.map(program => program.program),
        datasets: [{
            data: data.map(program => program.id),
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(50, 200, 50, 0.5)',
                'rgba(200, 50, 50, 0.5)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(50, 200, 50, 1)',
                'rgba(200, 50, 50, 1)',
            ],
            borderWidth: 1,
        }],
    };

    // Destroy the existing chart to prevent duplicates
    if (programChart) {
        programChart.destroy();
    }

    // Create a new pie chart for programs
    window.programChart = new Chart(ctx, {
        type: 'pie',
        data: chartData,
    });
}

// Fetch initial data for programs
$.ajax({
    type: 'POST',
    url: 'fetch_programmes.php',
    dataType: 'json',
    success: function (response) {
        // Log the response to the console
        console.log(response);

        // Process the response and update the chart
        updateProgramChart(response);
    },
    error: function (xhr, status, error) {
        console.log('Error in AJAX request for programs:', status, error);
    },
});



        // Function to update the stacked bar chart
        function updateStackedBarChart(data) {
            var ctx = document.getElementById('courseChart').getContext('2d');

            var chartData = {
            labels: data.courseNames,
            datasets: [
                {
                    label: 'Number of Students',
                    data: data.num_students,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }
            ],
        };

            var chartOptions = {
                scales: {
                    x: {
                        beginAtZero: true,
                        stacked: true, // Enable stacking
                    },
                    y: {
                        stacked: true, // Enable stacking
                    },
                },
            };

            // Destroy the existing chart to prevent duplicates
            if (window.myChart) {
                window.myChart.destroy();
            }

            // Create a new stacked bar chart
            window.myChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: chartOptions,
            });
        }

        // Event listener for the level filter change
        $('#levelFilter').change(function () {
            var level = $(this).val();

            $.ajax({
                type: 'POST',
                url: 'fetch_courses.php',
                data: { level: level },
                dataType: 'json',
                success: function (response) {
                    // Process the response and update the chart
                    updateStackedBarChart(response);
                    console.log(response);
                },
                error: function () {
                    console.log('Error in AJAX request');
                },
            });
        });
    });
</script>


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