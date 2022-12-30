<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php'); 
         
// Taking all 4 values from the form data(input)
$sys =  $_REQUEST['sys'];
$dia = $_REQUEST['dia'];
$pulse =  $_REQUEST['pulse'];
$comments = $_REQUEST['comments'];
         
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO bp (sys,dia,pulse,comments) VALUES ($sys,$dia,$pulse,'$comments')";

if(mysqli_query($conn, $sql)) 
{
    echo "<h2>Insert Complete</h2>";
    echo "<center>";
    echo nl2br("DIA: $sys\n SYS: $dia\n " . "Pulse: $pulse\n Comments: $comments");
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