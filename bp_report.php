<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php'); 

$sql = "select dia,sys,pulse,comments,ts as 'Date' from bp order by id desc limit 10;";
$result = $conn->query($sql);

if(mysqli_query($conn, $sql)) 
{
    echo "<h2>Blood Pressure Report</h2>";
    echo "<table align=center>";
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
                  <td>" . $row["Date"]. "</td>
             </tr>";
    }
    echo "</table>";
    echo "<br>";
}
else 
{
echo "ERROR: $sql. " . mysqli_error($conn);
}


// Close connection
mysqli_close($conn);
include ('include/bp_footer.inc.php'); 
?>