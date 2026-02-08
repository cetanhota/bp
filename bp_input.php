<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php'); 
include ('include/bp_connect.inc.php');

// Pull patients for dropdown
$patients = $conn->query("SELECT patient_id, fname, lname FROM patient ORDER BY lname, fname");
?>

<h2>Input Blood Pressure</h2>

<table align="center" class="shadow">
<td style="vertical-align: middle;">

<form action="insert.php" method="post">

<p>
<label for="patient_id">Patient:</label>
<select name="patient_id" id="patient_id" required>
<option value="">-- Select Patient --</option>
<?php
if ($patients && $patients->num_rows > 0) {
    while($row = $patients->fetch_assoc()) {
        echo "<option value='".$row["patient_id"]."'>".$row["lname"].", ".$row["fname"]."</option>";
    }
}
?>
</select>
</p>

<p>
<label for="sys">SYS:</label>
<input type="text" name="sys" id="sys" required>
</p>

<p>
<label for="dia">DIA:</label>
<input type="text" name="dia" id="dia" required>
</p>

<p>
<label for="pulse">Pulse:</label>
<input type="text" name="pulse" id="pulse">
</p>

<p>
<label for="spo2">Oxygen Saturation:</label>
<input type="text" name="spo2" id="spo2">
</p>

<p>
<label for="comments">Comments:</label>
<input type="text" name="comments" id="comments">
</p>

<center>
<input type="submit" value="Submit" class="f_button">
</center>

</form>

</td>
</table>

<br>

<?php
$conn->close();
include ('include/bp_footer.inc.php'); 
?>

