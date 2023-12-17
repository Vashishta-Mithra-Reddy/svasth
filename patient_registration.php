<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phoneNumber = $_POST['phno'];
    $emergencyContact = $_POST['emergency'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Generate a random PID (Patient ID)
    $pid = rand(1000, 9999); // You can adjust the range as needed

    // Database connection details
    require_once("db_connection.php");

    
    $sql = "INSERT INTO patients (PID, Name, Gender, Age, PhoneNumber, EmergencyContact, Email, Address) 
            VALUES ($pid, '$name', '$gender', $age, '$phoneNumber', '$emergencyContact', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
}
?>
