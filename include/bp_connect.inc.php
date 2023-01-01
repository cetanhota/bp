<?php
include ('include/private.inc.php');
$servername = "pi8gb.local";
$username = "";
$dbname = "health";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
?>
