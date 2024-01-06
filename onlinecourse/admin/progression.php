<?php
// Function to calculate months between two dates
function calculateMonths($startDate, $endDate) {
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);

    return floor(($endTimestamp - $startTimestamp) / (60 * 60 * 24 * 30.44)); // Average month length
}

// Function to handle student progression
function handleProgression($studentRegno, $enrollmentDate, $level, $promotionCriteria, $promotionLimit, $con) {
    $currentDate = date('Y-m-d');
    $monthsCovered = calculateMonths($enrollmentDate, $currentDate);

    if ($monthsCovered >= $promotionCriteria) {
        // Perform promotion
        $newLevel = $level + 100;
        
        // Check if promotion is within the limit
        if ($newLevel <= 400) {
            // Update student's level
            mysqli_query($con, "UPDATE students SET level = '$newLevel' WHERE studentRegno = '$studentRegno'");
            
            // Check if the student has reached level 400
            if ($newLevel == 500) {
                // Insert into graduation table
                mysqli_query($con, "INSERT INTO graduation (studentRegno, graduationDate, additionalInfo) VALUES ('$studentRegno', NOW(), 'Graduated from Level 400')");
                
                // Set level to 0
                mysqli_query($con, "UPDATE students SET level = 0 WHERE studentRegno = '$studentRegno'");
                
                echo "Student has graduated!\n";
            }
        }
        // Update promotion count
        mysqli_query($con, "UPDATE students SET promotionCount = promotionCount + 1 WHERE studentRegno = '$studentRegno'");
        
        // Check if promotion limit is reached
        $promotionCount = getPromotionCount($con, $studentRegno);
        if ($promotionCount >= $promotionLimit) {
        } 
    }
}

// Function to get promotion count
function getPromotionCount($con, $studentRegno) {
    $result = mysqli_query($con, "SELECT promotionCount FROM students WHERE studentRegno = '$studentRegno'");
    $row = mysqli_fetch_assoc($result);
    return $row['promotionCount'];
}


?>
