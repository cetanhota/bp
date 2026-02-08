<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php');

// Get POST data
$patient_id = $_POST['patient_id'];
$sys        = $_POST['sys'];
$dia        = $_POST['dia'];
$pulse      = $_POST['pulse'];
$spo2       = $_POST['spo2'];
$comments   = $_POST['comments'];

// Validate required fields
if(empty($patient_id) || empty($sys) || empty($dia)){
    die("Error: Patient, SYS, and DIA are required.");
}

// Prepare statement
$stmt = $conn->prepare(
    "INSERT INTO vitals (pid, sys, dia, pulse, spo2, comments)
     VALUES (?,?,?,?,?,?)"
);

if(!$stmt){
    die("Prepare failed: ".$conn->error);
}

// Bind parameters: i = integer, s = string
$stmt->bind_param(
    "iiiiis",
    $patient_id,
    $sys,
    $dia,
    $pulse,
    $spo2,
    $comments
);

// Execute
if($stmt->execute()){
    echo "<h2>✅ Vitals Inserted Successfully</h2>";
}else{
    echo "ERROR: ".$stmt->error;
}

$stmt->close();
$conn->close();
?>

