<?php

include('includes/config.php');

// Perform database query to fetch programs
$query = "SELECT id, program FROM programme";
$result = mysqli_query($con, $query);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the results into an associative array
$programs = array();
while ($row = mysqli_fetch_assoc($result)) {
    $programs[] = $row;
}

// Return the programs as JSON
echo json_encode($programs);

// Close the database connection
mysqli_close($con);

?>

