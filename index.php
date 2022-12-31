<?php 
include ('include/bpstyle.php');
include ('include/bp_header.inc.php'); 
?>
<h2>Input Blood Pressure</h2>
   <table align="center" class=shadow>
      <td vertical-align: middle>
         <form action="insert.php" method="post">
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
   	       <label for="comments">Comments:</label>
	       <input type="text" name="comments" id="comments">	 
	    </p>            
            <center><input type="submit" value="Submit"  class="f_button"></center>
         </form>
      </td>   
   </table>
<br>
<?php include ('include/bp_footer.inc.php'); ?>