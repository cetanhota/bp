<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php');
?>
<h2>Create report for:</h2>
<center><form action="bp_create_report.php" method="post">
         <select id="fname" name="fname">
         <?php
            echo "<option value='select'>Select a Patient</option>";
            $sql = "select pid,fname from patient";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
               echo "<option>" . $row['fname'] . "</option>";
            }
         ?>
         </select>
         <br><br><input type="submit" value="Submit"  class="f_button"></center>
         </form>
<?php include ('include/bp_footer.inc.php'); ?>