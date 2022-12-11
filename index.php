<!DOCTYPE html>
<html lang="en">
   <head>
      <title>BP Tracker</title>
   </head>
   <body>
         <h1>Input Blood Pressure</h1>
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
            <input type="submit" value="Submit">
         </form>
       <?php include ('include/bp_footer.inc.php'); ?>
   </body>
</html>

