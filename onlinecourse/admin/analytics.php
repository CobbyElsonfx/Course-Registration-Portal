<?php
// Assuming you have a MySQL database connection
session_start();

include('includes/config.php');
error_reporting(1);


if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
}else{
    $sql = "SELECT level, programme, COUNT(*) as count FROM students GROUP BY level, programme";
$result = mysqli_query($con, $sql);

// Organize data for Chart.js
$chartData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $level = $row['level'];
    $program = $row['programme'];
    $count = $row['count'];

    $chartData['labels'][$program] = true;
    $chartData['datasets'][$level]['label'] = 'Level ' . $level;
    $chartData['datasets'][$level]['data'][$program] = $count;
}

// Close the database connection
mysqli_close($con);
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!-- Add the DataTables CSS -->
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width: 80%; margin: auto;">
        <canvas id="studentChart"></canvas>
    </div>

    <script>
        // Chart.js script
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('studentChart').getContext('2d');
            var chartData = <?php echo json_encode($chartData); ?>;

            var datasets = [];

            // Prepare datasets for each level
            Object.keys(chartData.datasets).forEach(function (level) {
                datasets.push({
                    label: chartData.datasets[level].label,
                    data: Object.keys(chartData.labels).map(function (program) {
                        return chartData.datasets[level].data[program] || 0;
                    }),
                    backgroundColor: getRandomColor(),
                    borderColor: getRandomColor(),
                    borderWidth: 1
                });
            });

            // Create a bar chart
            var studentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(chartData.labels),
                    datasets: datasets
                },
                options: {
                    scales: {
                        x: { stacked: true },
                        y: { stacked: true }
                    }
                }
            });

            // Function to generate random color
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
        });
    </script>
</body>

</html>
