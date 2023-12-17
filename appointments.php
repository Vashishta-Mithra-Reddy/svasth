<?php
$doctor_id = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : null;

if (!$doctor_id) {
    header("Location: login.php");
    exit();
}

require_once("db_connection.php");

$sql = "SELECT * FROM Appointments WHERE DID = $doctor_id";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Appointments Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            text-align: center;
        }

        section {
            display: flex;
            justify-content: center;
            margin: 20px;
        }

        .appointment-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 80%;
            max-width: 800px;
        }

        .appointment-header {
            background-color: #79b4b7;
            color: white;
            padding: 7px;
            height: 7px;
            text-align: center;
        }

        .appointment-row {
            border-bottom: 1px solid #e0e0e0;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .appointment-row:last-child {
            border-bottom: none;
        }

        .patient-info {
            display: flex;
            flex-direction: column;
        }

        .patient-info span {
            margin-bottom: 5px;
        }

        .appointment-details {
            text-align: left;
        }

        .status {
            font-weight: bold;
            color: #28a745;
        }

        .cancel-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
        }
        /* Additional style for dynamic appointment rows */
        .dynamic-appointment-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            padding: 20px;
        }

        .dynamic-appointment-row:last-child {
            border-bottom: none;
        }
    </style>
    <script>
    // JavaScript function to handle appointment cancellation
    function cancelAppointment(patientID) {
        // Make an AJAX request to update the status in the database
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // On successful cancellation, change the color of the status
                var statusElement = document.getElementById("status_" + patientID);
                if (statusElement) {
                    statusElement.style.color = "red";
                }
            }
        };

        // Replace 'cancel.php' with the actual path to your cancellation script
        xhr.open("GET", "cancel.php?patientID=" + patientID, true);
        xhr.send();
    }
</script>

</head>
<body>


    <section>
        <div class="appointment-container">
            <div class="appointment-header">
                
            </div>

            <?php
            // Loop through the appointments and create dynamic rows
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="dynamic-appointment-row">
    <div class="patient-info">
        <span>Patient ID: <?php echo $row['PID']; ?></span>
        <!-- Add more patient information as needed -->
    </div>
    <div class="appointment-details">
        <span>Appointment Date: <?php echo $row['AppointmentDate']; ?></span><br>
        <span>Appointment Time: <?php echo $row['AppointmentTime']; ?></span><br>
        <span id="status_<?php echo $row['PID']; ?>" class="status">Status: <?php echo $row['Status']; ?></span>
    </div>
    <button class="cancel-button" onClick="cancelAppointment(<?php echo $row['PID']; ?>);">Cancel</button>
</div>

                <?php
            }
            ?>


        </div>
    </section>

</body>
</html>