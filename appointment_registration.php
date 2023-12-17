<?php
// Establish connection to the database (Replace with your database credentials)
require_once("db_connection.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $patientID = $_POST['patientID'];
    $doctorName = $_POST['doctorName'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $status = $_POST['status'];

    // Fetch Doctor ID (DID) based on the selected Doctor Name
    $doctorQuery = "SELECT DID FROM doctors WHERE Name = ?";
    $stmt = $conn->prepare($doctorQuery);
    $stmt->bind_param("s", $doctorName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $doctorID = $row['DID'];

    // Generate a random Appointment ID
    $appointmentID = rand(10000, 99999);

    // Insert data into Appointment table
    $insertQuery = "INSERT INTO appointments (AppointmentID, PID, DID, AppointmentDate, AppointmentTime, Status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("iiisss", $appointmentID, $patientID, $doctorID, $appointmentDate, $appointmentTime, $status);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Appointment created successfully!";
    } else {
        echo "Error creating appointment: " . $conn->error;
    }
}

// Close the database connection

?>
