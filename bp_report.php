<?php
include ('include/bpstyle.php');
include ('include/bp_header.inc.php');
include ('include/bp_connect.inc.php');

// ---------- Fetch patients for dropdown ----------
$patients = $conn->query("SELECT patient_id, fname, lname FROM patient ORDER BY lname, fname");

// ---------- Get selected patient ----------
$selected_patient = $_GET['patient_id'] ?? '';
?>

<h2>Blood Pressure Report</h2>

<!-- Patient Selector Form -->
<form method="GET" style="text-align:center; margin-bottom:20px;">
    <label for="patient_id">Select Patient:</label>
    <select name="patient_id" id="patient_id" required onchange="this.form.submit()">
        <option value="">-- Select Patient --</option>
        <?php
        if ($patients && $patients->num_rows > 0) {
            while($row = $patients->fetch_assoc()) {
                $selected = ($row['patient_id'] == $selected_patient) ? 'selected' : '';
                echo "<option value='".$row['patient_id']."' $selected>".$row['lname'].", ".$row['fname']."</option>";
            }
        }
        ?>
    </select>
</form>

<?php
if(!empty($selected_patient)):

    // ---------- SQL query ----------
    $sql = "SELECT sys, dia, pulse, spo2, comments, ts AS Date
            FROM vitals
            WHERE pid = ".$conn->real_escape_string($selected_patient)."
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
        $result->data_seek(0);
    } else {
        echo "ERROR: " . $conn->error;
    }

    // Function to get BP category color
    function bp_color($systolic, $diastolic) {
        if($systolic < 120 && $diastolic < 80) return "green";            // Normal
        if($systolic >= 120 && $systolic <= 129 && $diastolic < 80) return "yellow"; // Elevated
        if(($systolic >= 130 && $systolic <= 139) || ($diastolic >= 80 && $diastolic <= 89)) return "orange"; // Stage 1
        if(($systolic >= 140 && $systolic <= 179) || ($diastolic >= 90 && $diastolic <= 119)) return "red"; // Stage 2
        if($systolic >= 180 || $diastolic >= 120) return "purple";       // Crisis
        return "white";
    }
?>

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
        $color = bp_color($row["sys"], $row["dia"]);
        echo "<tr>";
        echo "<td style='background-color: $color; color: black;'>".$row["sys"]."/".$row["dia"]."</td>";
        echo "<td>".$row["pulse"]."</td>";
        echo "<td>".$row["spo2"]."%</td>";
        echo "<td>".$row["comments"]."</td>";
        echo "<td>".$row["Date"]."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No readings found for this patient.</td></tr>";
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
        labels: labels.reverse(),
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
        scales: { y: { beginAtZero: false } }
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
        scales: { y: { beginAtZero: false } }
    }
});
</script>

<?php
endif; // end if patient selected
$conn->close();
include ('include/bp_footer.inc.php');
?>

