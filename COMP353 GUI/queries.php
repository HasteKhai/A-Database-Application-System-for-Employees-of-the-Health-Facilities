<?php
include 'connection.php';
$querry19 = "SELECT * FROM Employee";
$querry20 = "SELECT * FROM Address";
$querry21 = "SELECT * FROM Facility";
$querry22 = "SELECT * FROM EmailQueue";
$querry23 = "SELECT * FROM EmployeeAtFacility";
$querry24 = "SELECT * FROM Log";
$querry25 = "SELECT * FROM Person";
$querry26 = "SELECT * FROM PersonAtResidence";
$querry27 = "SELECT * FROM Residence";
$querry28 = "SELECT * FROM Vaccination";
$querry29 = "SELECT * FROM WorkSchedule";
$querry30 = "SELECT * FROM Infection";
$querry8 = "
SELECT 
    F.FacilityName,
    A.City,
    A.Province,
    A.PostalCode,
    F.PhoneNumber,
    F.WebAddress,
    F.FacilityType,
    F.FacilityCapacity,
    CONCAT(E.FirstName, ' ', E.LastName) AS General_Manager,
    COUNT(EF.EmployeeID) AS Num_Employees,
    SUM(CASE WHEN E.Occupation = 'Doctor' THEN 1 ELSE 0 END) AS Num_Doctors,
    SUM(CASE WHEN E.Occupation = 'Nurse' THEN 1 ELSE 0 END) AS Num_Nurses
FROM 
    Facility F
JOIN 
    Address A ON F.AddressID = A.AddressID
JOIN 
    Employee E ON F.ManagerID = E.EmployeeID
LEFT JOIN 
    EmployeeAtFacility EF ON F.FacilityID = EF.FacilityID
GROUP BY 
    F.FacilityID
ORDER BY 
    A.Province ASC, A.City ASC, F.FacilityType ASC, Num_Doctors ASC;
";

$querry9 = "SELECT 
E.FirstName,
   E.LastName,
   E.DateOfBirth,
   E.EMedicareCardNumber,
   E.PhoneNumber,
   E.AddressID,
   A.City,
   A.Province ,
   A.PostalCode,
   E.Citizenship,
   E.EmailAddress,
   (
   SELECT COUNT(*)
   FROM Employee er
   WHERE er.ESocialSecurityNumber = E.ESocialSecurityNumber
   AND er.IsPrimaryResidence = FALSE
 ) AS NumOfSecondaryResidences
FROM 
   Employee E
JOIN 
   EmployeeAtFacility EF ON E.EmployeeID = EF.EmployeeID
JOIN 
   Facility F ON EF.FacilityID = F.FacilityID
JOIN 
   Address A ON E.AddressID = A.AddressID
WHERE 
   F.FacilityID = 12 AND EndDate is NULL AND IsPrimaryResidence = TRUE
GROUP BY 
   E.EmployeeID,
   EF.StartDate
HAVING 
   NumOfSecondaryResidences >= 1
ORDER BY 
   EF.StartDate DESC,
   E.FirstName,
   E.LastName;";

$querry10 = "SELECT 
F.FacilityName,
S.ScheduleDate,
S.StartTime,
S.EndTime
FROM 
WorkSchedule S
JOIN 
Facility F ON S.FacilityID = F.FacilityID
JOIN 
Employee E ON S.EmployeeID = E.EmployeeID
WHERE 
E.EmployeeID = 74
AND S.ScheduleDate BETWEEN '2024-04-10' AND '2024-4-25' 
ORDER BY 
F.FacilityName ASC,
S.ScheduleDate,
S.StartTime;";

$querry11 = "-- Query 11
SELECT 
    E.FirstName AS EmployeeFirstName,
    E.LastName AS EmployeeLastName,
    A.City AS AddressCity,
    A.Province AS AddressProvince,
    A.PostalCode AS AddressPostalCode,
    R.ResidenceType,
    P.FirstName AS PersonFirstName,
    P.LastName AS PersonLastName,
    P.Occupation,
    PAR.Relationship,
    E.IsPrimaryResidence AS EmployeePrimaryResidence
FROM 
    Employee E
JOIN 
    Address A ON E.AddressID = A.AddressID
JOIN 
    Residence R ON A.AddressID = R.AddressID
JOIN 
    PersonAtResidence PAR ON R.ResidenceID = PAR.ResidenceID
JOIN 
    Person P ON PAR.PersonID = P.PersonID
WHERE 
    E.FirstName = 'Leah' AND E.LastName ='Castel'
ORDER BY 
    A.AddressID, 
    P.FirstName, 
    P.LastName;";

$querry12 = "SELECT 
E.FirstName,
E.LastName,
I.InfectionDate,
F.FacilityName,
(
    SELECT COUNT(*)
    FROM Employee er
    WHERE er.ESocialSecurityNumber = E.ESocialSecurityNumber
        AND er.IsPrimaryResidence = FALSE
) AS NumOfSecondaryResidences
FROM 
Infection I
JOIN 
Employee E ON I.EmployeeID = E.EmployeeID
JOIN 
EmployeeAtFacility EF ON E.EmployeeID = EF.EmployeeID
JOIN 
Facility F ON EF.FacilityID = F.FacilityID
WHERE 
E.Occupation = 'Doctor' AND I.InfectionType = 'COVID-19'
AND I.InfectionDate BETWEEN DATE_SUB(NOW(), INTERVAL 2 WEEK) AND NOW()
ORDER BY 
F.FacilityName ASC,
NumOfSecondaryResidences ASC;";

$querry13 = "SELECT *
FROM
    Log
WHERE
    EmailSubject LIKE 'Assignment Cancellation'
    AND Sender = 'info@maisonneuverosemonthospital.com'
    AND EmailDate BETWEEN '2024-04-10' AND '2024-04-12'
ORDER BY
    EmailDate DESC;";

$querry14 = "SELECT 
e.ESocialSecurityNumber, e.FirstName, e.LastName, e.Occupation,
(
  SELECT COUNT(*)
  FROM Employee er
  WHERE er.ESocialSecurityNumber = e.ESocialSecurityNumber
    AND er.IsPrimaryResidence = FALSE
) AS TotalNumOfSecondaryResidences
FROM Employee e
JOIN EmployeeAtFacility eaf ON eaf.EmployeeID = e.EmployeeID
JOIN WorkSchedule ws ON eaf.EmployeeID = ws.EmployeeID
WHERE eaf.FacilityID = 1
AND ws.ScheduleDate >= DATE_SUB(CURDATE(), INTERVAL 4 WEEK)
AND eaf.EndDate IS NULL
GROUP BY e.ESocialSecurityNumber, e.FirstName, e.LastName, e.Occupation, TotalNumOfSecondaryResidences
HAVING TotalNumOfSecondaryResidences >= 3
ORDER BY e.Occupation;";

$querry15 = "SELECT 
e.FirstName, 
e.LastName,
e.DateOfBirth,
e.EmailAddress,
infectionTotal.Total AS 'Total Number of Covid-19 Infections',
MIN(eaf.StartDate) AS 'First Day Worked',
v.DoseNumber AS 'Total Vaccines Received',
  (SELECT CONCAT(
    FLOOR(SUM(TIMESTAMPDIFF(MINUTE, StartTime, EndTime)) / 60), ' hour ',
    MOD(SUM(TIMESTAMPDIFF(MINUTE, StartTime, EndTime)), 60), ' minutes'
  )
  FROM WorkSchedule w 
  WHERE w.EmployeeID = e.EmployeeID
  ) AS 'Total Number of Hours Scheduled'
FROM Employee e
JOIN (
SELECT EmployeeID, COUNT(*) AS Total 
FROM Infection
WHERE InfectionType = 'Covid-19' AND InfectionDate >= DATE_SUB(CURDATE(), INTERVAL 2 WEEK)
GROUP BY EmployeeID
) infectionTotal ON e.EmployeeID = infectionTotal.EmployeeID
JOIN EmployeeAtFacility eaf ON e.EmployeeID = eaf.EmployeeID
JOIN WorkSchedule ws ON e.EmployeeID = ws.EmployeeID
JOIN Vaccination v ON e.EmployeeID = v.EmployeeID
WHERE e.Occupation = 'Nurse' AND eaf.EndDate IS NULL
GROUP BY e.EmployeeID, e.FirstName, e.LastName, v.DoseNumber
HAVING COUNT(DISTINCT eaf.FacilityID) >= 2
ORDER BY MIN(eaf.StartDate), e.FirstName, e.LastName;";

$querry16 = "SELECT e.Occupation,
COUNT(DISTINCT e.EmployeeID) AS 'Total Number of Employees Currently Working', 
COUNT(DISTINCT i.EmployeeID) AS 'Total Number of Employees That Currently Have Covid-19'
FROM Employee e
JOIN EmployeeAtFacility eaf ON e.EmployeeID = eaf.EmployeeID
LEFT JOIN Infection i ON e.EmployeeID = i.EmployeeID AND i.InfectionType IN ('Covid-19')
AND i.InfectionDate >= DATE_SUB(CURDATE(), INTERVAL 2 WEEK)
WHERE eaf.EndDate IS NULL
GROUP BY e.Occupation;";

$querry17 = "SELECT e.Occupation,
COUNT(DISTINCT e.EmployeeID) AS 'Total Number of Employees Currently Working', 
COUNT(DISTINCT i.EmployeeID) AS 'Total Number of Employees That Never Caught Covid-19'
FROM Employee e
JOIN EmployeeAtFacility eaf ON e.EmployeeID = eaf.EmployeeID
LEFT JOIN Infection i ON e.EmployeeID = i.EmployeeID AND i.InfectionType NOT IN ('Covid-19')
WHERE eaf.EndDate IS NULL
GROUP BY e.Occupation;";

$querry18 = "SELECT COUNT(DISTINCT f.FacilityID) AS 'total number of facilities', a.Province, COUNT(DISTINCT eaf.EmployeeID)
AS 'Total Number of Employees Currently Working',  COUNT(DISTINCT i.EmployeeID) AS 'Total Number of Working & Infected Employees by Covid-19',
  (SELECT SUM(f2.FacilityCapacity) 
   FROM Facility f2 
   JOIN Address a2 ON f2.AddressID = a2.AddressID
   WHERE a2.Province = a.Province) AS 'Max Capacity of Total Province Facility' ,
  (SELECT SUM(TIMESTAMPDIFF(HOUR, ws.StartTime, ws.EndTime))
   FROM WorkSchedule ws
    JOIN EmployeeAtFacility eaff ON ws.EmployeeID = eaff.EmployeeID
    JOIN Facility f3 ON eaff.FacilityID = f3.FacilityID
    JOIN Address a3 ON f3.AddressID = a3.AddressID
   WHERE a3.Province = a.Province
     AND ws.ScheduleDate = '2020-07-21'
     AND eaff.EndDate IS NULL)AS 'Total Hours Worked On 2020-07-21'
FROM Facility f
JOIN Address a ON a.AddressID = f.AddressID  -- AND f.FacilityID <=15
LEFT JOIN Employee e ON e.FacilityID = f.FacilityID
LEFT JOIN Infection i ON e.EmployeeID = i.EmployeeID AND i.InfectionType IN ('Covid-19') AND i.InfectionDate >= DATE_SUB(CURDATE(), INTERVAL 2 WEEK)
LEFT JOIN EmployeeAtFacility eaf ON eaf.EmployeeID = e.EmployeeID AND eaf.EndDate IS NULL
GROUP BY a.Province
ORDER BY a.Province ;";



// Get the query parameter
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Define SQL queries based on the query parameter
switch ($query) {
    case 'query8':
        $sql = $querry8;
        break;
    case 'query9':
        $sql = $querry9;
        break;
    case 'query10':
        $sql = $querry10;
        break;
    case 'query11':
        $sql = $querry11;
        break;
    case 'query12':
        $sql = $querry12;
        break;
    case 'query13':
        $sql = $querry13;
        break;
    case 'query14':
        $sql = $querry14;
        break;
    case 'query15':
        $sql = $querry15;
        break;
    case 'query16':
        $sql = $querry16;
        break;
    case 'query17':
        $sql = $querry17;
        break;
    case 'query18':
        $sql = $querry18;
        break;
    case 'query19':
        $sql = $querry19;
        break;
    case 'query20':
        $sql = $querry20;
        break;
    case 'query21':
        $sql = $querry21;
        break;
    case 'query22':
        $sql = $querry22;
        break;
    case 'query23':
        $sql = $querry23;
        break;
    case 'query24':
        $sql = $querry24;
        break;
    case 'query25':
        $sql = $querry25;
        break;
    case 'query26':
        $sql = $querry26;
        break;
    case 'query27':
        $sql = $querry27;
        break;
    case 'query28':
        $sql = $querry28;
        break;
    case 'query29':
        $sql = $querry29;
        break;
    case 'query30':
        $sql = $querry30;
        break;

    default:
        echo "Invalid query parameter";
        exit;
}

// Execute the query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data in a table format
    echo "<table border='1'>";
    // Output table headers based on the query
    switch ($query) {
        case 'query8':
            echo "<tr><th>Facility Name</th><th>City</th><th>Province</th><th>Postal Code</th><th>Phone Number</th><th>Web Address</th><th>Facility Type</th><th>Facility Capacity</th><th>General Manager</th><th>Number of Employees</th><th>Number of Doctors</th><th>Number of Nurses</th></tr>";
            break;
        case 'query9':
            echo "<tr><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>EMedicare Card Number</th><th>Phone Number</th><th>Address ID</th><th>City</th><th>Province</th><th>Postal Code</th><th>Citizenship</th><th>Email Address</th><th>Number of Secondary Residences</th></tr>";
            break;
        case 'query10':
            echo "<tr><th>Facility Name</th><th>Schedule Date</th><th>Start Time</th><th>End Time</th></tr>";
            break;
        case 'query11':
            echo "<tr><th>Employee First Name</th><th>Employee Last Name</th><th>Address City</th><th>Address Province</th><th>Address Postal Code</th><th>Residence Type</th><th>Person First Name</th><th>Person Last Name</th><th>Occupation</th><th>Relationship</th><th>Employee Primary Residence</th></tr>";
            break;
        case 'query12':
            echo "<tr><th>First Name</th><th>Last Name</th><th>Infection Date</th><th>Facility Name</th><th>Number of Secondary Residences</th></tr>";
            break;
        case 'query13':
            echo "<tr><th>LogID</th><th>EmailDate</th><th>Sender</th><th>Receiver</th><th>EmailSubject</th><th>BodyPreview</th></tr>";
            break;
        case 'query14':
            echo "<tr><th>ESocialSecurityNumber</th><th>FirstName</th><th>LastName</th><th>Occupation</th><th>TotalNumOfSecondaryResidences</th></tr>";
            break;
        case 'query15':
            echo "<tr><th>FirstName</th><th>LastName</th><th>DateOfBirth</th><th>EmailAddress</th><th>Total Number of Covid-19 Infections</th><th>First Day Worked</th><th>Total Vaccines Received</th><th>Total Number of Hours Scheduled</th></tr>";
            break;
        case 'query16':
            echo "<tr><th>Occupation</th><th>Total Number of Employees Currently Working</th><th>Total Number of Employees That Currently Have Covid-19</th></tr>";
            break;
        case 'query17':
            echo "<tr><th>Occupation</th><th>Total Number of Employees Currently Working</th><th>Total Number of Employees That Never Caught Covid-19</th></tr>";
            break;
        case 'query18':
            echo "<tr><th>Total Number of Facilities</th><th>Province</th><th>Total Number of Employees Currently Working</th><th>Total Number of Working & Infected Employees by Covid-19</th><th>Max Capacity of Total Province Facility</th><th>Total Hours Worked On 2020-07-21</th></tr>";
            break;
        case 'query21':
            // Display Facility
            echo "<tr><th>Facility ID</th><th>Facility Name</th><th>Facility Type</th><th>Address ID</th><th>Phone Number</th><th>Email Address</th><th>Facility Capacity</th><th>Web Address</th><th>Manager ID</th></tr>";
            break;

        case 'query20':
            // Display Address
            echo "<tr><th>Address ID</th><th>Street Address</th><th>City</th><th>Province</th><th>Postal Code</th></tr>";
            break;

        case 'query24':
            // Display Log
            echo "<tr><th>Log ID</th><th>Email Date</th><th>Sender</th><th>Receiver</th><th>Email Subject</th><th>Body Preview</th></tr>";
            break;

        case 'query23':
            // Display EmployeeAtFacility
            echo "<tr><th>Employee ID</th><th>Facility ID</th><th>Start Date</th><th>End Date</th></tr>";
            break;

        case 'query25':
            // Display Person
            echo "<tr><th>Person ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Social Security Number</th><th>Medicare Card Number</th><th>Phone Number</th><th>Address ID</th><th>Citizenship</th><th>Email Address</th><th>Occupation</th><th>Primary Residence</th></tr>";
            break;

        case 'query26':
            // Display PersonAtResidence
            echo "<tr><th>Person At Residence ID</th><th>Person ID</th><th>Residence ID</th><th>Relationship</th><th>Primary Residence</th></tr>";
            break;

        case 'query27':
            // Display Residence
            echo "<tr><th>Residence ID</th><th>Address ID</th><th>Phone Number</th><th>Number of Bedrooms</th><th>Residence Type</th></tr>";
            break;

        case 'query28':
            // Display Vaccination
            echo "<tr><th>Vaccination ID</th><th>Employee ID</th><th>Vaccine Type</th><th>Dose Number</th><th>Vaccination Date</th></tr>";
            break;

        case 'query29':
            // Display WorkSchedule
            echo "<tr><th>Schedule ID</th><th>Employee ID</th><th>Facility ID</th><th>Schedule Date</th><th>Start Time</th><th>End Time</th></tr>";
            break;

        case 'query19':
            // Display Employee
            echo "<tr><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Social Security Number</th><th>Medicare Card Number</th><th>Phone Number</th><th>Address ID</th><th>Email Address</th><th>Occupation</th><th>Facility ID</th><th>Is Manager</th><th>Is Primary Residence</th><th>Citizenship</th></tr>";
            break;

        case 'query22':
            // Display Infection
            echo "<tr><th>Email ID</th><th>Email Address</th><th>Subject</th><th>Body</th></tr>";
            break;
        case 'query30':
            // Display Email Queue
            echo "<tr><th>Infection ID</th><th>Employee ID</th><th>Person ID</th><th>Infection Type</th><th>Infection Date</th></tr>";
            break;
    }
    while ($row = $result->fetch_assoc()) {
        // Output table rows based on the query
        switch ($query) {
            case 'query8':
                echo "<tr><td>" . $row["FacilityName"] . "</td><td>" . $row["City"] . "</td><td>" . $row["Province"] . "</td><td>" . $row["PostalCode"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["WebAddress"] . "</td><td>" . $row["FacilityType"] . "</td><td>" . $row["FacilityCapacity"] . "</td><td>" . $row["General_Manager"] . "</td><td>" . $row["Num_Employees"] . "</td><td>" . $row["Num_Doctors"] . "</td><td>" . $row["Num_Nurses"] . "</td></tr>";
                break;
            case 'query9':
                echo "<tr><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["EMedicareCardNumber"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["AddressID"] . "</td><td>" . $row["City"] . "</td><td>" . $row["Province"] . "</td><td>" . $row["PostalCode"] . "</td><td>" . $row["Citizenship"] . "</td><td>" . $row["EmailAddress"] . "</td><td>" . $row["NumOfSecondaryResidences"] . "</td></tr>";
                break;
            case 'query10':
                echo "<tr><td>" . $row["FacilityName"] . "</td><td>" . $row["ScheduleDate"] . "</td><td>" . $row["StartTime"] . "</td><td>" . $row["EndTime"] . "</td></tr>";
                break;
            case 'query11':
                echo "<tr><td>" . $row["EmployeeFirstName"] . "</td><td>" . $row["EmployeeLastName"] . "</td><td>" . $row["AddressCity"] . "</td><td>" . $row["AddressProvince"] . "</td><td>" . $row["AddressPostalCode"] . "</td><td>" . $row["ResidenceType"] . "</td><td>" . $row["PersonFirstName"] . "</td><td>" . $row["PersonLastName"] . "</td><td>" . $row["Occupation"] . "</td><td>" . $row["Relationship"] . "</td><td>" . $row["EmployeePrimaryResidence"] . "</td></tr>";
                break;
            case 'query12':
                echo "<tr><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["InfectionDate"] . "</td><td>" . $row["FacilityName"] . "</td><td>" . $row["NumOfSecondaryResidences"] . "</td></tr>";
                break;
            case 'query13':
                echo "<tr><td>" . $row["LogID"] . "</td><td>" . $row["EmailDate"] . "</td><td>" . $row["Sender"] . "</td><td>" . $row["Receiver"] . "</td><td>" . $row["EmailSubject"] . "</td><td>" . $row["BodyPreview"] . "</td></tr>";
                break;
            case 'query14':
                echo "<tr><td>" . $row["ESocialSecurityNumber"] . "</td><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["Occupation"] . "</td><td>" . $row["TotalNumOfSecondaryResidences"] . "</td></tr>";
                break;
            case 'query15':
                echo "<tr><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["EmailAddress"] . "</td><td>" . $row["Total Number of Covid-19 Infections"] . "</td><td>" . $row["First Day Worked"] . "</td><td>" . $row["Total Vaccines Received"] . "</td><td>" . $row["Total Number of Hours Scheduled"] . "</td></tr>";
                break;
            case 'query16':
                echo "<tr><td>" . $row["Occupation"] . "</td><td>" . $row["Total Number of Employees Currently Working"] . "</td><td>" . $row["Total Number of Employees That Currently Have Covid-19"] . "</td></tr>";
                break;
            case 'query17':
                echo "<tr><td>" . $row["Occupation"] . "</td><td>" . $row["Total Number of Employees Currently Working"] . "</td><td>" . $row["Total Number of Employees That Never Caught Covid-19"] . "</td></tr>";
                break;
            case 'query18':
                echo "<tr><td>" . $row["total number of facilities"] . "</td><td>" . $row["Province"] . "</td><td>" . $row["Total Number of Employees Currently Working"] . "</td><td>" . $row["Total Number of Working & Infected Employees by Covid-19"] . "</td><td>" . $row["Max Capacity of Total Province Facility"] . "</td><td>" . $row["Total Hours Worked On 2020-07-21"] . "</td></tr>";
                break;
            case 'query21':
                // Display Facility
                echo "<tr><td>" . $row["FacilityID"] . "</td><td>" . $row["FacilityName"] . "</td><td>" . $row["FacilityType"] . "</td><td>" . $row["AddressID"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["EmailAddress"] . "</td><td>" . $row["FacilityCapacity"] . "</td><td>" . $row["WebAddress"] . "</td><td>" . $row["ManagerID"] . "</td></tr>";
                break;
            case 'query20':
                // Display Address
                echo "<tr><td>" . $row["AddressID"] . "</td><td>" . $row["StreetAddress"] . "</td><td>" . $row["City"] . "</td><td>" . $row["Province"] . "</td><td>" . $row["PostalCode"] . "</td></tr>";
                break;
            case 'query24':
                // Display Log
                echo "<tr><td>" . $row["LogID"] . "</td><td>" . $row["EmailDate"] . "</td><td>" . $row["Sender"] . "</td><td>" . $row["Receiver"] . "</td><td>" . $row["EmailSubject"] . "</td><td>" . $row["BodyPreview"] . "</td></tr>";
                break;
            case 'query23':
                // Display EmployeeAtFacility
                echo "<tr><td>" . $row["EmployeeID"] . "</td><td>" . $row["FacilityID"] . "</td><td>" . $row["StartDate"] . "</td><td>" . $row["EndDate"] . "</td></tr>";
                break;
            case 'query25':
                // Display Person
                echo "<tr><td>" . $row["PersonID"] . "</td><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["PSocialSecurityNumber"] . "</td><td>" . $row["PMedicareCardNumber"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["AddressID"] . "</td><td>" . $row["Citizenship"] . "</td><td>" . $row["EmailAddress"] . "</td><td>" . $row["Occupation"] . "</td><td>" . $row["IsPrimaryResidence"] . "</td></tr>";
                break;
            case 'query26':
                // Display PersonAtResidence
                echo "<tr><td>" . $row["PersonAtResidenceID"] . "</td><td>" . $row["PersonID"] . "</td><td>" . $row["ResidenceID"] . "</td><td>" . $row["Relationship"] . "</td><td>" . $row["IsPrimaryResidence"] . "</td></tr>";
                break;
            case 'query27':
                // Display Residence
                echo "<tr><td>" . $row["ResidenceID"] . "</td><td>" . $row["AddressID"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["NumberOfBedrooms"] . "</td><td>" . $row["ResidenceType"] . "</td></tr>";
                break;
            case 'query28':
                // Display Vaccination
                echo "<tr><td>" . $row["VaccinationID"] . "</td><td>" . $row["EmployeeID"] . "</td><td>" . $row["VaccineType"] . "</td><td>" . $row["DoseNumber"] . "</td><td>" . $row["VaccinationDate"] . "</td></tr>";
                break;
            case 'query29':
                // Display WorkSchedule
                echo "<tr><td>" . $row["ScheduleID"] . "</td><td>" . $row["EmployeeID"] . "</td><td>" . $row["FacilityID"] . "</td><td>" . $row["ScheduleDate"] . "</td><td>" . $row["StartTime"] . "</td><td>" . $row["EndTime"] . "</td></tr>";
                break;
            case 'query19':
                //Display Employee
                echo "<tr><td>" . $row["EmployeeID"] . "</td><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["DateOfBirth"] . "</td><td>" . $row["ESocialSecurityNumber"] . "</td><td>" . $row["EMedicareCardNumber"] . "</td><td>" . $row["PhoneNumber"] . "</td><td>" . $row["AddressID"] . "</td><td>" . $row["EmailAddress"] . "</td><td>" . $row["Occupation"] . "</td><td>" . $row["FacilityID"] . "</td><td>" . $row["ISManager"] . "</td><td>" . $row["ISPrimaryResidence"] . "</td><td>" . $row["Citizenship"] . "</td></tr>";
                break;
            case 'query22':
                //Display Email Queue
                echo "<tr><td>" . $row["EmailID"] . "</td><td>" . $row["EmailAddress"] . "</td><td>" . $row["Subject"] . "</td><td>" . $row["Body"] . "</td></tr>";
                break;

            case 'query30':
                //Display Infection
                echo "<tr><td>" . $row["InfectionID"] . "</td><td>" . $row["EmployeeID"] . "</td><td>" . $row["PersonID"] . "</td><td>" . $row["InfectionType"] . "</td><td>" . $row["InfectionDate"] . "</td></tr>";
                break;
        }
    }
    echo "</table>";
} else {
    echo "0 results";
}


// Close the database connection
$conn->close();
