<?php
include 'connection.php';

$facilityName = $_POST['facilityName'];
$facilityType = $_POST['facilityType'];
$addressID = $_POST['FaddressID'];
$phoneNumber = $_POST['FphoneNumber'];
$emailAddress = $_POST['FemailAddress'];
$facilityCapacity = $_POST['facilityCapacity'];
$webAddress = $_POST['webAddress'];
$managerID = $_POST['managerID'];

$sql = "INSERT INTO Facility (FacilityName, FacilityType, AddressID, PhoneNumber, EmailAddress, FacilityCapacity, WebAddress, ManagerID)
        VALUES ('$facilityName', '$facilityType', $addressID, '$phoneNumber', '$emailAddress', $facilityCapacity, '$webAddress', $managerID)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
