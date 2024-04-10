<?php
// Include your database connection file
include 'connection.php';

// Retrieve data from the POST request
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dateOfBirth = $_POST['dateOfBirth'];
$eSocialSecurityNumber = $_POST['eSocialSecurityNumber'];
$eMedicareCardNumber = $_POST['eMedicareCardNumber'];
$phoneNumber = $_POST['phoneNumber'];
$addressID = $_POST['addressID'];
$citizenship = $_POST['citizenship'];
$emailAddress = $_POST['emailAddress'];
$occupation = $_POST['occupation'];
$facilityID = $_POST['facilityID'];
$isManager = $_POST['isManager'];
$isPrimaryResidence = $_POST['isPrimaryResidence'];

// Prepare the SQL statement
$sql = "INSERT INTO Employee (FirstName, LastName, DateOfBirth, ESocialSecurityNumber, EMedicareCardNumber, PhoneNumber, AddressID, Citizenship, EmailAddress, Occupation, FacilityID, IsManager, IsPrimaryResidence) 
        VALUES ('$firstName', '$lastName', '$dateOfBirth', '$eSocialSecurityNumber', '$eMedicareCardNumber', '$phoneNumber', '$addressID', '$citizenship', '$emailAddress', '$occupation', '$facilityID', '$isManager', '$isPrimaryResidence')";

// Perform the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
