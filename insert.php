<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php'); 
         
// Taking all 4 values from the form data(input)
$sys =  $_REQUEST['sys'];
$dia = $_REQUEST['dia'];
$pulse =  $_REQUEST['pulse'];
$spo2 = $_REQUEST['spo2'];
$comments = $_REQUEST['comments'];
$fname = $_REQUEST['fname'];

$sql = "select pid from patient where fname = '$fname';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$pid = $row['pid'];
         
// Performing insert query execution
// here our table name is college 

$sql = "INSERT INTO vitals (pid,sys,dia,pulse,spo2,comments) VALUES ($pid,$sys,$dia,$pulse,$spo2,'$comments')";

if(mysqli_query($conn, $sql)) 
{
    echo "<h2>Vitals updated complete for: $fname</h2>";
    echo "<center>";
    echo nl2br("DIA: $sys\n SYS: $dia\n " . "SpO2: $spo2\n Pulse: $pulse\n Comments: $comments");
}
else 
{
    echo "ERROR: $sql. " . mysqli_error($conn);
    echo "</center>";
}
echo "<br><br>";

// Close connection
mysqli_close($conn);
include ('include/bp_footer.inc.php'); 
?>