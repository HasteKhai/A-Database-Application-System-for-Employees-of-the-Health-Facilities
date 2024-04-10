<?php
// Include the database connection file
include 'connection.php';

        
        // Assign POST data to variables
        $employeeID = $_POST["employeeID"];
        $facilityID = $_POST["facilityID"];
        $scheduleDate = $_POST["scheduleDate"];
        $startTime = $_POST["startTime"];
        $endTime = $_POST["endTime"];

        // SQL query to insert the WorkSchedule record
        $sql = "INSERT INTO WorkSchedule (EmployeeID, FacilityID, ScheduleDate, StartTime, EndTime) 
                VALUES ('$employeeID', '$facilityID', '$scheduleDate', '$startTime', '$endTime')";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            // If insertion is successful, return success message
            echo "WorkSchedule inserted successfully";
        } else {
            // If there's an error, return error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

// Close the database connection
$conn->close();
?>
