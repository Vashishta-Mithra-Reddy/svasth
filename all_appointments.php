<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .wrap{
            width: 120px;
            text-align: center;
        }

        .appointment {
            background-color: #fff;
            padding: 35px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .appointmentx{
            background-color: #fff;
            padding: 35px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #79b4b7;
            color: white;
        }

        .appointment p {
            margin: 8px 0;
        }

        .appointment hr {
            display:none;
        }

        
        .status-cancelled {
            color: red;
        }

        .status-completed {
            color: green;
        }

        .status-scheduled {
            color: #add8e6;
        }
    </style>
</head>
<body>
<div class="appointmentx">
    <div class="wrap"><p><strong>Appointment ID</strong></p></div>
    <div class="wrap"><p><strong>Patient Name</strong></p></div>
    <div class="wrap"><p><strong>Doctor Name</strong></p></div>
    <div class="wrap"><p><strong>Date</strong></p></div>
    <div class="wrap"><p><strong>Time</strong></p></div>
    <div class="wrap"><p><strong>Status</strong></p></div>
</div>


<?php
require_once("db_connection.php");

$sql = "SELECT a.AppointmentID, p.Name AS PatientName, d.Name AS DoctorName, a.AppointmentDate, a.AppointmentTime, a.Status 
        FROM Appointments a 
        INNER JOIN Patients p ON a.PID = p.PID 
        INNER JOIN Doctors d ON a.DID = d.DID";
$result = $conn->query($sql);

// Display the appointments with names
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Determine the CSS class based on status
        $statusClass = '';
        switch ($row['Status']) {
            case 'Cancelled':
                $statusClass = 'status-cancelled';
                break;
            case 'Completed':
                $statusClass = 'status-completed';
                break;
            case 'Scheduled':
                $statusClass = 'status-scheduled';
                break;
            default:
                $statusClass = '';
        }

        echo '<div class="appointment">';
        echo '<div class="wrap"><p><b>' . $row['AppointmentID'] . '</b></p></div>';
        echo '<div class="wrap"><p>' . $row['PatientName'] . '</p></div>';
        echo '<div class="wrap"><p>' . $row['DoctorName'] . '</p></div>';
        echo '<div class="wrap"><p>' . $row['AppointmentDate'] . '</p></div>';
        echo '<div class="wrap"><p>' . $row['AppointmentTime'] . '</p></div>';
        // Apply the appropriate status class to the status paragraph
        echo '<div class="wrap"><p class="' . $statusClass . '">' . $row['Status'] . '</p></div>';
        // Additional appointment details can be displayed as needed
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
