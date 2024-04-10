<?php
include 'connection.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dateOfBirth = $_POST['dateOfBirth'];
$pSocialSecurityNumber = $_POST['pSocialSecurityNumber'];
$pMedicareCardNumber = $_POST['pMedicareCardNumber'];
$phoneNumber = $_POST['phoneNumber'];
$addressID = $_POST['addressID'];
$citizenship = $_POST['citizenship'];
$emailAddress = $_POST['emailAddress'];
$occupation = $_POST['occupation'];
$isPrimaryResidence = $_POST['isPrimaryResidence'];

$isPrimaryResidence = isset($_POST['isPrimaryResidence']) ? 1 : 0;

$sql = "INSERT INTO Person (FirstName, LastName, DateOfBirth, PSocialSecurityNumber, PMedicareCardNumber, PhoneNumber, AddressID, Citizenship, EmailAddress, Occupation, IsPrimaryResidence)
        VALUES ('$firstName', '$lastName', '$dateOfBirth', '$pSocialSecurityNumber', '$pMedicareCardNumber', '$phoneNumber', $addressID, '$citizenship', '$emailAddress', '$occupation', $isPrimaryResidence)";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
