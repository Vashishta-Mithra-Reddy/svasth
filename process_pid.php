<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection established
    require_once("db_connection.php");
    // Get patient ID from the form submission
    $patient_id = $_POST['patient_id'];

    // Redirect to records.php with encoded patient ID in the URL
    header("Location: all_records.php?patient_id=" . urlencode($patient_id));
    exit();
} else {
    echo "Invalid request";
}
?>
