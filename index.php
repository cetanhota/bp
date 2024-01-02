<?php 
include ('include/bpstyle.php');
include ('include/bp_header.inc.php'); 
include ('include/bp_connect.inc.php'); 

?>
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