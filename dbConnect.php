<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amf";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
   // echo 'connection success';
}
$conn->set_charset("utf8");
?>