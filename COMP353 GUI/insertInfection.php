<?php
include 'connection.php';

$employeeID = $_POST['infectionEmployeeID'];
$personID = $_POST['infectionPersonID'];
$infectionType = $_POST['infectionType'];
$infectionDate = $_POST['infectionDate'];

$sql = "INSERT INTO Infection (EmployeeID, PersonID, InfectionType, InfectionDate)
        VALUES ('$employeeID', '$personID', '$infectionType', '$infectionDate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
