<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Vitals Tracker</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #AD4029;
            margin-top: 30px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .f_button {
            background-color: #AD4029;
            border: none;
            color: #fff;
            padding: 10px 25px;
            margin: 10px 5px;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .f_button:hover {
            background-color: #ff7b5c;
            color: #000;
            transform: translateY(-2px);
        }

        hr {
            border: none;
            height: 2px;
            background-color: #AD4029;
            width: 80%;
            margin: 20px auto;
        }
    </style>
</head>
<body>

    <h1>Health Vitals Tracker</h1>

    <div>
        <a href="bp_input.php" class="f_button">Record</a>
        <a href="bp_report.php" class="f_button">Report</a>
        <a href="add_patient.php" class="f_button">Add Patient</a>
    </div>

    <hr>

</body>
</html>

