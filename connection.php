<?php

// $servername = "sql312.infinityfree.com";
// $username = "if0_38237240";
// $password = "Ornabbiswass95 ";
// $dbname = "if0_38237240_ims";


$servername = "localhost";
$username = "root";
$password = "2020";
$dbname = "ims";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>


