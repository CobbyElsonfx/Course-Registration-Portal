<?php
// Include your database connection code
include('includes/config.php');

// Fetch data from the database
$query = "SELECT category, SUM(total_students) as total FROM programme GROUP BY category";
$result = mysqli_query($con, $query);

// Process data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Convert data to JSON
echo json_encode($data);

