<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php'); 

$pid = "select fname from patient where pid = 1;";
$pid_result = $conn->query($pid);
$row = $pid_result->fetch_assoc();
echo $row['fname'];

// Close connection
mysqli_close($conn);
include ('include/bp_footer.inc.php'); 
?>
