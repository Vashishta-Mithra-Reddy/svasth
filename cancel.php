<?php
// Assuming you have a database connection established

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['patientID'])) {
    $patientID = $_GET['patientID'];

    // Replace the database connection details with your actual values
    $servername = "localhost";
    $username = "root";
    $password = "svasth";
    $dbname = "svasth";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the status to 'Cancelled'
    $updateSql = "UPDATE Appointments SET Status = 'Cancelled' WHERE PID = $patientID";
    $conn->query($updateSql);

    // Close the database connection
    $conn->close();
}
?>