<?php

$servername="wjc353.encs.concordia.ca";
$username= "wjc353_4";
$password= "db353";
$database= "wjc353_4";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully to database: \n", $database; 
  
  ?>