<?php
// Function to calculate months between two dates
function calculateMonths($startDate, $endDate) {
    $startDateTime = new DateTime($startDate);
    $endDateTime = new DateTime($endDate);

    $interval = $startDateTime->diff($endDateTime);
    
    // Calculate total months and include the remainder in days
    $months = $interval->y * 12 + $interval->m + $interval->d / 30;

    return floor($months);
}


// Function to handle student progression
function handleProgression($studentRegno, $enrollmentDate, $level, $promotionCriteria, $promotionLimit, $con) {
    try {
        $currentDate = date('Y-m-d');
        $monthsCovered = calculateMonths($enrollmentDate, $currentDate);

        if ($monthsCovered >= $promotionCriteria) {
            // Perform promotion
            if($level >= 0){
                $newLevel = $level + 100;
            }
          

            // Check if promotion is within the limit
            if ($newLevel <= 400) {
                $updateQuery = "UPDATE students SET level = '$newLevel' WHERE studentRegno = '$studentRegno'";
                if (!mysqli_query($con, $updateQuery)) {
                    throw new Exception("Error updating student's level: " . mysqli_error($con));
                }
            }


            // Check if the student has reached level 00
            if ($newLevel == 500 ) {
            // Insert into graduation table
            $studentQuery = "SELECT * FROM students WHERE studentRegno = '$studentRegno'";
            $studentResult = mysqli_query($con, $studentQuery);
            $studentRow = mysqli_fetch_assoc($studentResult);
            $surname = $studentRow["surname"];
            $firstname = $studentRow["firstname"];
            $othername = $studentRow["othername"];
            
            $insertQuery = "INSERT INTO graduation (studentRegno, graduationDate, additionalInfo, surname, firstname, othername)
                VALUES ('$studentRegno', NOW(), 'Graduated from Level 400', '$surname', '$firstname', '$othername')";

            if (!mysqli_query($con, $insertQuery)) {
                throw new Exception("Error inserting into graduation table: " . mysqli_error($con));
            }

            // Set level to 0
            $updateLevelQuery = "UPDATE students SET level = 0 WHERE studentRegno = '$studentRegno'";
            if (!mysqli_query($con, $updateLevelQuery)) {
                throw new Exception("Error updating student's level to 0: " . mysqli_error($con));
            }

            // Delete student from students table
            $deleteQuery = "DELETE FROM students WHERE studentRegno = '$studentRegno'";
            if (!mysqli_query($con, $deleteQuery)) {
                throw new Exception("Error deleting student from students table: " . mysqli_error($con));
            }

            echo "Student has graduated!\n";
               }

               $promotionCount = getPromotionCount($con, $studentRegno);


            if ($promotionCount <= $promotionLimit) {
                  // Update promotion count
            $updatePromotionCountQuery = "UPDATE students SET promotionCount = promotionCount + 1 WHERE studentRegno = '$studentRegno'";
            if (!mysqli_query($con, $updatePromotionCountQuery)) {
                throw new Exception("Error updating promotion count: " . mysqli_error($con));
            }
                
            }
        }
    } catch (Exception $e) {
        // Handle exceptions
        echo "Error: " . $e->getMessage();
    }
}

function getPromotionCount($con, $studentRegno) {
    try {
        $result = mysqli_query($con, "SELECT promotionCount FROM students WHERE studentRegno = '$studentRegno'");
        if (!$result) {
            throw new Exception("Error getting promotion count: " . mysqli_error($con));
        }

        $row = mysqli_fetch_assoc($result);
        return $row['promotionCount'];
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return 0; 
    }
}
?>
