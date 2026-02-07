<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
<<<<<<< HEAD
include ('include/bp_connect.inc.php');

$sys = intval($_POST['sys']);
$dia = intval($_POST['dia']);
$pulse = intval($_POST['pulse']);
$spo2 = intval($_POST['spo2']);
$comments = trim($_POST['comments']);

$stmt = $conn->prepare(
    "INSERT INTO vitals (sys,dia,pulse,spo2,comments)
     VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param("iiiss", $sys, $dia, $pulse, $spo2, $comments);

if($stmt->execute()) {
    echo "<h2>Insert Complete</h2>";
    echo "<div style='text-align:center;'>";
    echo nl2br("SYS: $sys\n DIA: $dia\n Pulse: $pulse\n Oxygen Saturation: $spo2\n Comments: $comments");
    echo "</div>";
} else {
    echo "ERROR: " . $stmt->error;
=======
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
>>>>>>> 4560684fa9674d6bf41d1f5355beb95e07194826
}

$stmt->close();
$conn->close();

include ('include/bp_footer.inc.php');
?>

