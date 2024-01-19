<?php
// Function to reverse student progression
function reverseProgression($studentRegno, $con) {
    // Get the current level and promotion count
    $result = mysqli_query($con, "SELECT level, promotionCount FROM students WHERE studentRegno = '$studentRegno'");
    $row = mysqli_fetch_assoc($result);

    $currentLevel = $row['level'];
    $promotionCount = $row['promotionCount'];

    // Check if the student has been promoted at least once
    if ($promotionCount > 0) {
        // Decrease the level by 100
        $newLevel = $currentLevel - 100;

        // Update student's level
        mysqli_query($con, "UPDATE students SET level = '$newLevel' WHERE studentRegno = '$studentRegno'");

        // Decrease the promotion count
        mysqli_query($con, "UPDATE students SET promotionCount = promotionCount - 1 WHERE studentRegno = '$studentRegno'");

    }
}

?>
