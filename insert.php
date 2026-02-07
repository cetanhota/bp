<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
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
}

$stmt->close();
$conn->close();

include ('include/bp_footer.inc.php');
?>

