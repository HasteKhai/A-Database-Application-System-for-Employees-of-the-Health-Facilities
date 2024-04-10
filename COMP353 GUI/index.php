<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP 353 - Database application system for employees of the health facilities </title>
</head>

<body>

    <h1>Database application system for employees of the health facilities</h1>

    <h2>Insert new Facility</h2>
    <form id="insertForm">
        <label for="facilityName">Facility Name:</label>
        <input type="text" id="facilityName" name="facilityName"><br><br>

        <label for="facilityType">Facility Type:</label>
        <input type="text" id="facilityType" name="facilityType"><br><br>

        <label for="addressID">Address ID:</label>
        <input type="text" id="FaddressID" name="FaddressID"><br><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="FphoneNumber" name="FphoneNumber"><br><br>

        <label for="emailAddress">Email Address:</label>
        <input type="text" id="FemailAddress" name="FemailAddress"><br><br>

        <label for="facilityCapacity">Facility Capacity:</label>
        <input type="text" id="facilityCapacity" name="facilityCapacity"><br><br>

        <label for="webAddress">Web Address:</label>
        <input type="text" id="webAddress" name="webAddress"><br><br>

        <label for="managerID">Manager ID:</label>
        <input type="text" id="managerID" name="managerID"><br><br>

        <div id="errorMessage1" style="color: red;"></div><br>
        <button type="button" id="insertDataBtn">Insert Data</button>
    </form>
    <button class="fetchDataBtn" data-query="query21">Display Facility Table</button>

    <h2>Insert new Employee</h2>
    <form id="insertEmployeeForm">
        <label for="employeeFirstName">First Name:</label>
        <input type="text" id="employeeFirstName" name="employeeFirstName"><br><br>

        <label for="employeeLastName">Last Name:</label>
        <input type="text" id="employeeLastName" name="employeeLastName"><br><br>

        <label for="employeeDateOfBirth">Date of Birth:</label>
        <input type="text" id="employeeDateOfBirth" name="employeeDateOfBirth"><br><br>

        <label for="employeeSocialSecurityNumber">Social Security Number:</label>
        <input type="text" id="employeeSocialSecurityNumber" name="employeeSocialSecurityNumber"><br><br>

        <label for="employeeMedicareCardNumber">Medicare Card Number:</label>
        <input type="text" id="employeeMedicareCardNumber" name="employeeMedicareCardNumber"><br><br>

        <label for="employeePhoneNumber">Phone Number:</label>
        <input type="text" id="employeePhoneNumber" name="employeePhoneNumber"><br><br>

        <label for="employeeAddressID">Address ID:</label>
        <input type="text" id="employeeAddressID" name="employeeAddressID"><br><br>

        <label for="employeeEmailAddress">Email Address:</label>
        <input type="text" id="employeeEmailAddress" name="employeeEmailAddress"><br><br>

        <label for="employeeOccupation">Occupation:</label>
        <input type="text" id="employeeOccupation" name="employeeOccupation"><br><br>

        <label for="employeeFacilityID">Facility ID:</label>
        <input type="text" id="employeeFacilityID" name="employeeFacilityID"><br><br>

        <label for="isEmployeeManager">Is Manager:</label>
        <input type="checkbox" id="isEmployeeManager" name="isEmployeeManager"><br><br>

        <label for="isEmployeePrimaryResidence">Is Primary Residence:</label>
        <input type="checkbox" id="isEmployeePrimaryResidence" name="isEmployeePrimaryResidence"><br><br>

        <label for="employeeCitizenship">Citizenship:</label>
        <input type="text" id="employeeCitizenship" name="employeeCitizenship"><br><br>


        <button type="button" id="insertEmployeeBtn">Insert Employee</button>
    </form>
    <div id="errorMessage2" style="color: red;"></div> <!-- Error message display -->
    <button class="fetchDataBtn" data-query="query19">Display Employee Table</button>

    <h2>Insert new Person</h2>
    <form id="insertPersonForm">
        <label for="personFirstName">First Name:</label>
        <input type="text" id="personFirstName" name="personFirstName"><br><br>

        <label for="personLastName">Last Name:</label>
        <input type="text" id="personLastName" name="personLastName"><br><br>

        <label for="personDateOfBirth">Date of Birth:</label>
        <input type="text" id="personDateOfBirth" name="personDateOfBirth"><br><br>

        <label for="personSocialSecurityNumber">Social Security Number:</label>
        <input type="text" id="personSocialSecurityNumber" name="personSocialSecurityNumber"><br><br>

        <label for="personMedicareCardNumber">Medicare Card Number:</label>
        <input type="text" id="personMedicareCardNumber" name="personMedicareCardNumber"><br><br>

        <label for="personPhoneNumber">Phone Number:</label>
        <input type="text" id="personPhoneNumber" name="personPhoneNumber"><br><br>

        <label for="personAddressID">Address ID:</label>
        <input type="text" id="personAddressID" name="personAddressID"><br><br>

        <label for="personCitizenship">Citizenship:</label>
        <input type="text" id="personCitizenship" name="personCitizenship"><br><br>

        <label for="personEmailAddress">Email Address:</label>
        <input type="text" id="personEmailAddress" name="personEmailAddress"><br><br>

        <label for="personOccupation">Occupation:</label>
        <input type="text" id="personOccupation" name="personOccupation"><br><br>

        <label for="isPersonPrimaryResidence">Is Primary Residence:</label>
        <input type="checkbox" id="isPersonPrimaryResidence" name="isPersonPrimaryResidence"><br><br>

        <button type="button" id="insertPersonBtn">Insert Person</button>
    </form>
    <button class="fetchDataBtn" data-query="query25">Display Person Table</button>
    <h2>Insert new EmployeeAtFacility</h2>

    <h2>Insert new PersonAtResidence</h2>
    <form id="insertPersonAtResidenceForm">
        <label for="personID">Person ID:</label>
        <input type="text" id="personID" name="personID"><br><br>

        <label for="residenceID">Residence ID:</label>
        <input type="text" id="residenceID" name="residenceID"><br><br>

        <label for="relationship">Relationship:</label>
        <input type="text" id="relationship" name="relationship"><br><br>

        <label for="isPrimaryResidence">Is Primary Residence:</label>
        <input type="checkbox" id="isPrimaryResidence" name="isPrimaryResidence"><br><br>

        <button type="button" id="insertPersonAtResidenceBtn">Insert PersonAtResidence</button>
    </form>
    <button class="fetchDataBtn" data-query="query23">Display PersonAtResidence Table</button>

    <h2>Insert new Vaccination</h2>
    <form id="insertVaccinationForm">
        <label for="vaccinationEmployeeID">Employee ID:</label>
        <input type="text" id="vaccinationEmployeeID" name="vaccinationEmployeeID"><br><br>

        <label for="vaccinationPersonID">Person ID:</label>
        <input type="text" id="vaccinationPersonID" name="vaccinationPersonID"><br><br>

        <label for="vaccineType">Vaccine Type:</label>
        <input type="text" id="vaccineType" name="vaccineType"><br><br>

        <label for="doseNumber">Dose Number:</label>
        <input type="text" id="doseNumber" name="doseNumber"><br><br>

        <label for="vaccinationDate">Vaccination Date:</label>
        <input type="text" id="vaccinationDate" name="vaccinationDate"><br><br>

        <label for="vaccinationFacilityID">Facility ID:</label>
        <input type="text" id="vaccinationFacilityID" name="vaccinationFacilityID"><br><br>

        <button type="button" id="insertVaccinationBtn">Insert Vaccination</button>
    </form>
    <button class="fetchDataBtn" data-query="query28">Display Vaccination Table</button>

    <h2>Insert new Infection</h2>
    <form id="insertInfectionForm">
        <label for="infectionEmployeeID">Employee ID:</label>
        <input type="text" id="infectionEmployeeID" name="infectionEmployeeID"><br><br>

        <label for="infectionPersonID">Person ID:</label>
        <input type="text" id="infectionPersonID" name="infectionPersonID"><br><br>

        <label for="infectionType">Infection Type:</label>
        <input type="text" id="infectionType" name="infectionType"><br><br>

        <label for="infectionDate">Infection Date:</label>
        <input type="text" id="infectionDate" name="infectionDate"><br><br>

        <button type="button" id="insertInfectionBtn">Insert Infection</button>
    </form>
    <button class="fetchDataBtn" data-query="query30">Display Infection Table</button>

    <h2>Insert new WorkSchedule</h2>
    <form id="insertWorkScheduleForm">
        <label for="scheduleEmployeeID">Employee ID:</label>
        <input type="text" id="scheduleEmployeeID" name="scheduleEmployeeID"><br><br>

        <label for="scheduleFacilityID">Facility ID:</label>
        <input type="text" id="scheduleFacilityID" name="scheduleFacilityID"><br><br>

        <label for="scheduleDate">Schedule Date:</label>
        <input type="text" id="scheduleDate" name="scheduleDate"><br><br>

        <label for="startTime">Start Time:</label>
        <input type="text" id="startTime" name="startTime"><br><br>

        <label for="endTime">End Time:</label>
        <input type="text" id="endTime" name="endTime"><br><br>

        <button type="button" id="insertScheduleBtn">Insert Schedule</button>
    </form>
    <button class="fetchDataBtn" data-query="query29">Display Work Schedule Table</button>

    <h2>Insert new Residence</h2>
    <form id="insertResidenceForm">
        <label for="residenceAddressID">Address ID:</label>
        <input type="text" id="residenceAddressID" name="residenceAddressID"><br><br>

        <label for="residencePhoneNumber">Phone Number:</label>
        <input type="text" id="residencePhoneNumber" name="residencePhoneNumber"><br><br>

        <label for="residenceNumberOfBedrooms">Number of Bedrooms:</label>
        <input type="text" id="residenceNumberOfBedrooms" name="residenceNumberOfBedrooms"><br><br>

        <label for="residenceType">Residence Type:</label>
        <input type="text" id="residenceType" name="residenceType"><br><br>

        <button type="button" id="insertResidenceBtn">Insert Residence</button>
    </form>
    <button class="fetchDataBtn" data-query="query27">Display Residence Table</button>

    <h2>Insert new Log</h2>
    <form id="insertLogForm">
        <label for="logEmailDate">Email Date:</label>
        <input type="text" id="logEmailDate" name="logEmailDate"><br><br>

        <label for="logSender">Sender:</label>
        <input type="text" id="logSender" name="logSender"><br><br>

        <label for="logReceiver">Receiver:</label>
        <input type="text" id="logReceiver" name="logReceiver"><br><br>

        <label for="logEmailSubject">Email Subject:</label>
        <input type="text" id="logEmailSubject" name="logEmailSubject"><br><br>

        <label for="logBodyPreview">Body Preview:</label>
        <input type="text" id="logBodyPreview" name="logBodyPreview"><br><br>

        <button type="button" id="insertLogBtn">Insert Log</button>
    </form>
    <button class="fetchDataBtn" data-query="query24">Display Log Table</button>

    <h2>Insert new EmailQueue</h2>
    <form id="insertEmailQueueForm">
        <label for="emailAddress">Email Address:</label>
        <input type="text" id="emailAddress" name="emailAddress"><br><br>

        <label for="emailSubject">Subject:</label>
        <input type="text" id="emailSubject" name="emailSubject"><br><br>

        <label for="emailBody">Body:</label>
        <input type="text" id="emailBody" name="emailBody"><br><br>

        <button type="button" id="insertEmailQueueBtn">Insert Email</button>
    </form>
    <button class="fetchDataBtn" data-query="query22">Display EmailQueue Table</button>


    <h2>Insert new Address</h2>
    <form id="insertAddressForm">
        <label for="addressCity">City:</label>
        <input type="text" id="addressCity" name="addressCity"><br><br>

        <label for="addressProvince">Province:</label>
        <input type="text" id="addressProvince" name="addressProvince"><br><br>

        <label for="addressPostalCode">Postal Code:</label>
        <input type="text" id="addressPostalCode" name="addressPostalCode"><br><br>

        <button type="button" id="insertAddressBtn">Insert Address</button>
    </form>
    <button class="fetchDataBtn" data-query="query20">Display Address Table</button>


    <h2>Test Queries</h2>

    <!-- Button to fetch data -->
    <button class="fetchDataBtn" data-query="query8">Execute Querry 8</button>
    <button class="fetchDataBtn" data-query="query9">Execute Querry 9</button>
    <button class="fetchDataBtn" data-query="query10">Execute Querry 10</button>
    <button class="fetchDataBtn" data-query="query11">Execute Querry 11</button>
    <button class="fetchDataBtn" data-query="query12">Execute Querry 12</button>
    <button class="fetchDataBtn" data-query="query13">Execute Querry 13</button>
    <button class="fetchDataBtn" data-query="query14">Execute Querry 14</button>
    <button class="fetchDataBtn" data-query="query15">Execute Querry 15</button>
    <button class="fetchDataBtn" data-query="query16">Execute Querry 16</button>
    <button class="fetchDataBtn" data-query="query17">Execute Querry 17</button>
    <button class="fetchDataBtn" data-query="query18">Execute Querry 18</button>



    <!-- Container to display data -->
    <div id="dataContainer"></div>


    <script>
        // For Queries 8 to 18 + Displaying
        var fetchDataBtns = document.querySelectorAll(".fetchDataBtn");
        fetchDataBtns.forEach(function(btn) {
            btn.addEventListener("click", function() {

                var query = this.getAttribute("data-query");

                // Make an AJAX request to fetch data from your PHP script
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "queries.php?query=" + query, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Display the fetched data in the data container
                        document.getElementById("dataContainer").innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            });
        });

        //For Facility Insertion
        document.getElementById("insertDataBtn").addEventListener("click", function() {

            var facilityName = document.getElementById("facilityName").value;
            var facilityType = document.getElementById("facilityType").value;
            var addressID = document.getElementById("FaddressID").value;
            var phoneNumber = document.getElementById("FphoneNumber").value;
            var emailAddress = document.getElementById("FemailAddress").value;
            var facilityCapacity = document.getElementById("facilityCapacity").value;
            var webAddress = document.getElementById("webAddress").value;
            var managerID = document.getElementById("managerID").value;


            // Make an AJAX request to insert data into the table
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insertFacility.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText.startsWith("Error")) {
                        // Display the error message next to the insert button
                        var errorMessage = xhr.responseText.substring(6);
                        document.getElementById("errorMessage1").innerText = errorMessage;
                    } else {
                        // Clear any previous error messages
                        document.getElementById("errorMessage1").innerText = "";
                        // Log success message to console
                        console.log(xhr.responseText);
                    }
                }
            };

            xhr.send(
                "facilityName=" + encodeURIComponent(facilityName) +
                "&facilityType=" + encodeURIComponent(facilityType) +
                "&FaddressID=" + encodeURIComponent(addressID) +
                "&FphoneNumber=" + encodeURIComponent(phoneNumber) +
                "&FemailAddress=" + encodeURIComponent(emailAddress) +
                "&facilityCapacity=" + encodeURIComponent(facilityCapacity) +
                "&webAddress=" + encodeURIComponent(webAddress) +
                "&managerID=" + encodeURIComponent(managerID)
            );
        });

        //For Person Insertion
        document.getElementById("insertPersonBtn").addEventListener("click", function() {
            var firstName = document.getElementById("personFirstName").value;
            var lastName = document.getElementById("personLastName").value;
            var dateOfBirth = document.getElementById("personDateOfBirth").value;
            var socialSecurityNumber = document.getElementById("personSocialSecurityNumber").value;
            var medicareCardNumber = document.getElementById("personMedicareCardNumber").value;
            var phoneNumber = document.getElementById("personPhoneNumber").value;
            var addressID = document.getElementById("personAddressID").value;
            var citizenship = document.getElementById("personCitizenship").value;
            var emailAddress = document.getElementById("personEmailAddress").value;
            var occupation = document.getElementById("personOccupation").value;
            var isPrimaryResidence = document.getElementById("isPersonPrimaryResidence").checked ? 1 : 0;

            // Make an AJAX request to insert data into the table
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insertPerson.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);

                }
            };

            xhr.send(
                "firstName=" + encodeURIComponent(firstName) +
                "&lastName=" + encodeURIComponent(lastName) +
                "&dateOfBirth=" + encodeURIComponent(dateOfBirth) +
                "&socialSecurityNumber=" + encodeURIComponent(socialSecurityNumber) +
                "&medicareCardNumber=" + encodeURIComponent(medicareCardNumber) +
                "&phoneNumber=" + encodeURIComponent(phoneNumber) +
                "&addressID=" + encodeURIComponent(addressID) +
                "&citizenship=" + encodeURIComponent(citizenship) +
                "&emailAddress=" + encodeURIComponent(emailAddress) +
                "&occupation=" + encodeURIComponent(occupation) +
                "&isPrimaryResidence=" + encodeURIComponent(isPrimaryResidence)
            );
        });

        // For the insertion of an Employee
        document.getElementById("insertEmployeeBtn").addEventListener("click", function() {
            var firstName = document.getElementById("employeeFirstName").value;
            var lastName = document.getElementById("employeeLastName").value;
            var dateOfBirth = document.getElementById("employeeDateOfBirth").value;
            var eSocialSecurityNumber = document.getElementById("employeeSocialSecurityNumber").value;
            var eMedicareCardNumber = document.getElementById("employeeMedicareCardNumber").value;
            var phoneNumber = document.getElementById("employeePhoneNumber").value;
            var addressID = document.getElementById("employeeAddressID").value;
            var citizenship = document.getElementById("employeeCitizenship").value;
            var emailAddress = document.getElementById("employeeEmailAddress").value;
            var occupation = document.getElementById("employeeOccupation").value;
            var facilityID = document.getElementById("employeeFacilityID").value;
            var isManager = document.getElementById("isEmployeeManager").checked ? 1 : 0;
            var isPrimaryResidence = document.getElementById("isEmployeePrimaryResidence").checked ? 1 : 0;

            // Make an AJAX request to insert data into the table
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insertEmployee.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText.startsWith("Error")) {
                        // Display the error message next to the insert button
                        document.getElementById("errorMessage2").innerText = xhr.responseText; 
                    } else {
                        // Clear any previous error messages
                        document.getElementById("errorMessage2").innerText = "";
                        // Log success message to console
                        console.log(xhr.responseText);
                    }
                }
            };

            xhr.send(
                "firstName=" + encodeURIComponent(firstName) +
                "&lastName=" + encodeURIComponent(lastName) +
                "&dateOfBirth=" + encodeURIComponent(dateOfBirth) +
                "&eSocialSecurityNumber=" + encodeURIComponent(eSocialSecurityNumber) +
                "&eMedicareCardNumber=" + encodeURIComponent(eMedicareCardNumber) +
                "&phoneNumber=" + encodeURIComponent(phoneNumber) +
                "&addressID=" + encodeURIComponent(addressID) +
                "&citizenship=" + encodeURIComponent(citizenship) +
                "&emailAddress=" + encodeURIComponent(emailAddress) +
                "&occupation=" + encodeURIComponent(occupation) +
                "&facilityID=" + encodeURIComponent(facilityID) +
                "&isManager=" + encodeURIComponent(isManager) +
                "&isPrimaryResidence=" + encodeURIComponent(isPrimaryResidence)
            );
        });


        // For infection insertion
        document.getElementById("insertInfectionBtn").addEventListener("click", function() {
            var infectionEmployeeID = document.getElementById("infectionEmployeeID").value;
            var infectionPersonID = document.getElementById("infectionPersonID").value;
            var infectionType = document.getElementById("infectionType").value;
            var infectionDate = document.getElementById("infectionDate").value;

            // Make an AJAX request to insert data into the table
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insertInfection.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                    // Display any response from the server
                }
            };

            xhr.send(
                "infectionEmployeeID=" + encodeURIComponent(infectionEmployeeID) +
                "&infectionPersonID=" + encodeURIComponent(infectionPersonID) +
                "&infectionType=" + encodeURIComponent(infectionType) +
                "&infectionDate=" + encodeURIComponent(infectionDate)
            );
        });


        //For WorkSchedule Insertion
        document.getElementById("insertScheduleBtn").addEventListener("click", function() {
            var employeeID = document.getElementById("scheduleEmployeeID").value;
            var facilityID = document.getElementById("scheduleFacilityID").value;
            var scheduleDate = document.getElementById("scheduleDate").value;
            var startTime = document.getElementById("startTime").value;
            var endTime = document.getElementById("endTime").value;

            // Make an AJAX request to insert data into the table
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insertWorkSchedule.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText.startsWith("Error")) {
                        // Display the error message next to the insert button
                        var errorMessage = xhr.responseText.substring(6);
                        document.getElementById("errorMessage").innerText = errorMessage;
                    } else {
                        // Clear any previous error messages
                        document.getElementById("errorMessage").innerText = "";
                        // Log success message to console
                        console.log(xhr.responseText);
                    }
                }
            };

            xhr.send(
                "employeeID=" + encodeURIComponent(employeeID) +
                "&facilityID=" + encodeURIComponent(facilityID) +
                "&scheduleDate=" + encodeURIComponent(scheduleDate) +
                "&startTime=" + encodeURIComponent(startTime) +
                "&endTime=" + encodeURIComponent(endTime)
            );
        });
    </script>

</body>

</html>