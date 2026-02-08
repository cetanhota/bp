<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php');

// ---------- INSERT PATIENT ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);

    if (!empty($fname) && !empty($lname)) {

        $stmt = $conn->prepare(
            "INSERT INTO patient (fname, lname) VALUES (?, ?)"
        );

        $stmt->bind_param("ss", $fname, $lname);

        if ($stmt->execute()) {
            echo "<h3>✅ Patient Added Successfully</h3>";
        } else {
            echo "ERROR: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "<h3>Please enter both first and last name</h3>";
    }
}
?>

<h2>Add New Patient</h2>

<table align="center" class="shadow">
<td style="vertical-align: middle;">

<form method="POST">

<p>
<label for="fname">First Name:</label>
<input type="text" name="fname" id="fname" required>
</p>

<p>
<label for="lname">Last Name:</label>
<input type="text" name="lname" id="lname" required>
</p>

<center>
<input type="submit" value="Add Patient" class="f_button">
</center>

</form>

</td>
</table>

<br>

<?php
$conn->close();
include ('include/bp_footer.inc.php');
?>
