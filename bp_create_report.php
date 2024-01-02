<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php'); 

$fname = $_REQUEST['fname'];
$pid = "select pid from patient where fname = '$fname';";
$pid_result = $conn->query($pid);
$row = $pid_result->fetch_assoc();

$USERPID = $row['pid'];

$sql = "select dia,sys,pulse,comments,ts as 'Date' from vitals where pid = $USERPID order by ts desc limit 10;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql)) 
{
    echo "<h2>Vital Signs Report</h2>";
    echo "<h2>For $fname </h2>";
    //echo $row['pid'];
    echo "<table align=center class='shadow'>";
    echo "<tr>";
    echo "<th>SYS</th>";
    echo "<th>DIA</th>";
    echo "<th>Pulse</th>";
    echo "<th>Comments</th>";
    echo "<th>Date</th>";
    echo "</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["dia"]. "</td>
                  <td>" . $row["sys"]. "</td>
                  <td>" . $row["pulse"]. "</td>
                  <td>" . $row["comments"]. "</td>
                  <td>" . $row["Date"]. "</td>";
    }
    echo "</tr>";
    echo "</table>";
    echo "<br>";
}
else 
{
echo "ERROR: $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
$command = escapeshellcmd("/var/www/html/save-bp-graph.py $USERPID");
$output = shell_exec($command);
echo "<center><img src='bp.png' 'alt='bp-graph' class='shadow'></center>";
include ('include/bp_footer.inc.php'); 
?>