<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php');
<<<<<<< HEAD

// SQL query for latest 10 readings
$sql = "SELECT sys, dia, pulse, spo2, comments, ts AS Date
        FROM vitals
        ORDER BY id DESC
        LIMIT 10";

$result = $conn->query($sql);

// Prepare arrays for charts
$labels = [];
$sys = [];
$dia = [];
$pulse = [];

if ($result) {
    while($row = $result->fetch_assoc()) {
        $labels[] = $row["Date"];
        $sys[] = $row["sys"];
        $dia[] = $row["dia"];
        $pulse[] = $row["pulse"];
    }
    // Reset pointer for table output
    $result->data_seek(0);
} else {
    echo "ERROR: " . $conn->error;
}

?>

<h2>Blood Pressure Report</h2>

<!-- Table -->
<table align='center' class='shadow'>
<tr>
    <th>BP</th>
    <th>Pulse</th>
    <th>SpO2</th>
    <th>Comments</th>
    <th>Date</th>
</tr>

<?php
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["sys"]."/".$row["dia"]."</td>";
        echo "<td>".$row["pulse"]."</td>";
        echo "<td>".$row["spo2"]."%</td>";
        echo "<td>".$row["comments"]."</td>";
        echo "<td>".$row["Date"]."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No readings found.</td></tr>";
}
?>

</table>
<br>

<!-- Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<center>
<h3>Blood Pressure Trend</h3>
<div style="width: 900px; height: 500px; margin:auto;">
        <canvas id="bpChart"></canvas>
</div>

<h3>Pulse Trend</h3>
<div style="width: 900px; height: 500px; margin:auto;">
	<canvas id="pulseChart"></canvas>
</div>
</center>

<script>
const labels = <?php echo json_encode($labels); ?>;
const sysData = <?php echo json_encode($sys); ?>;
const diaData = <?php echo json_encode($dia); ?>;
const pulseData = <?php echo json_encode($pulse); ?>;

// Blood Pressure Chart
new Chart(document.getElementById('bpChart'), {
    type: 'line',
    data: {
        labels: labels.reverse(), // oldest on left
        datasets: [
            {
                label: 'Systolic',
                data: sysData.reverse(),
                borderColor: 'red',
                fill: false,
                tension: 0.1
            },
            {
                label: 'Diastolic',
                data: diaData.reverse(),
                borderColor: 'blue',
                fill: false,
                tension: 0.1
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        },
        scales: {
            y: { beginAtZero: false }
        }
    }
});

// Pulse Chart
new Chart(document.getElementById('pulseChart'), {
    type: 'line',
    data: {
        labels: labels.reverse(),
        datasets: [
            {
                label: 'Pulse',
                data: pulseData.reverse(),
                borderColor: 'green',
                fill: false,
                tension: 0.1
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        },
        scales: {
            y: { beginAtZero: false }
        }
    }
});
</script>
<br>
<?php
$conn->close();
include ('include/bp_footer.inc.php');
?>

=======
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
>>>>>>> 4560684fa9674d6bf41d1f5355beb95e07194826
