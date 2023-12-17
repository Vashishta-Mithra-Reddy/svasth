<!DOCTYPE html>
<html>
<head>
    <style>
        *{
            box-sizing:border-box;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        .cardx {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 30px;
            margin: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            background-color: #79b4b7;
            color: white;
            font-size: 20px;
        }

        .record {
            margin-bottom: 15px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
            display:flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .record:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .wrap{
            width: 120px;
            text-align: center;
        }

        .record p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<div class="cardx">
    <div class="record">

        <div class="wrap"><p><strong>Doctor Name</strong></p></div>
        <div class="wrap"><p><strong>Date</strong></p></div>
        <div class="wrap"><p><strong>Diagnosis</strong></p></div>
        <div class="wrap"><p><strong>Prescription</strong></p></div>
        <div class="wrap"><p><strong>Test Results</strong></p></div>
    </div>
</div>


<?php
// Assuming you have a database connection established
require_once("db_connection.php");

// Get the encoded patient ID from the URL
if (isset($_GET['patient_id'])) {
    $patient_id = urldecode($_GET['patient_id']);

    // Fetch patient records with doctor's name and date from the records and doctors table
    $sql = "SELECT r.*, d.Name AS DoctorName FROM medicalrecords r 
            INNER JOIN doctors d ON r.DID = d.DID 
            WHERE r.PID = $patient_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display patient records within a card
        echo '<div class="card">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="record">';
            // Display patient records along with doctor's name and date
            echo "<div class='wrap'><p>" . $row['DoctorName'] . "</p></div>";
            echo "<div class='wrap'><p>" . $row['Date'] . "</p></div>";
            echo "<div class='wrap'><p>" . $row['Diagnosis'] . "</p></div>";
            echo "<div class='wrap'><p>" . $row['Prescription'] . "</p></div>";
            echo "<div class='wrap'><p>" . $row['TestResults'] . "</p></div>";
            // Display other fields accordingly
            echo '</div>';
        }
        echo '</div>'; // Closing the card
    } else {
        echo "No records found for this patient.";
    }
} else {
    echo "Invalid patient ID.";
}

$conn->close();
?>


</body>
</html>
