<?php 
include ('include/bpstyle.php');
include ('include/bp_header.inc.php'); 
include ('include/bp_connect.inc.php'); 

?>
<<<<<<< HEAD
<center>
<h2>Application Usage</h2>
<p>To record your vitals click the "Record" button at the top of the screen.</p>
<p>To see a report of the vitals you have already entered click the "Report" button at the top of the screen.</p>
<h2>AHA (American Heart Association) BP Ranges</h2>
<table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse; text-align:center;">
    <tr>
        <th>Category</th>
        <th>Systolic (mmHg)</th>
        <th>Diastolic (mmHg)</th>
    </tr>
    <tr>
        <td>Normal</td>
        <td>&lt;120</td>
        <td>&lt;80</td>
    </tr>
    <tr>
        <td>Elevated</td>
        <td>120–129</td>
        <td>&lt;80</td>
    </tr>
    <tr>
        <td>Stage 1 Hypertension</td>
        <td>130–139</td>
        <td>80–89</td>
    </tr>
    <tr>
        <td>Stage 2 Hypertension</td>
        <td>&ge;140</td>
        <td>&ge;90</td>
    </tr>
    <tr>
        <td>Hypertensive Crisis</td>
        <td>&ge;180</td>
        <td>&ge;120</td>
    </tr>
</table>
</center>
<?php include ('include/bp_footer.inc.php'); ?>
=======
<h2>Input Vitals</h2>
   <table align="center" class=shadow>
      <td vertical-align: middle>
         <form action="insert.php" method="post">
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
<p>
               <label for="sys">SYS:</label>
               <input type="text" name="sys" id="sys">
            </p>
<p>
               <label for="dia">DIA:</label>
               <input type="text" name="dia" id="dia">
            </p>
<p>
               <label for="pulse">Pulse:</label>
               <input type="text" name="pulse" id="pulse">
	    </p>
<p>
               <label for="spo2">SpO2:</label>
               <input type="text" name="spo2" id="spo2">
       </p>
<p>
   	       <label for="comments">Comments:</label>
	       <input type="text" name="comments" id="comments">	 
	    </p>            
            <center><input type="submit" value="Submit"  class="f_button"></center>
         </form>
      </td>   
   </table>
<br>
<?php include ('include/bp_footer.inc.php'); ?>
>>>>>>> 4560684fa9674d6bf41d1f5355beb95e07194826
