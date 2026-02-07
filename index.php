<?php 
include ('include/bpstyle.php');
include ('include/bp_header.inc.php'); 
?>
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
