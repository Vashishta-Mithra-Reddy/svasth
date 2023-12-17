<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('db_connection.php');

    // Input values 
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation
    $query = "SELECT * FROM UserCredentials WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $accountType = $user['AccountType'];

        // Fetch PID or DID based on account type
        if ($accountType == 'patient') {
            $query = "SELECT PID FROM Patients WHERE Email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $patient = $result->fetch_assoc();
            $id = $patient['PID'];
            setcookie('user_id', $id, time() + (120), "/"); // Cookie valid for 2 minutes
            echo '<script type="text/javascript">';
            echo 'top.location.href = "patient_page.php?email=' . urlencode($email) . '";';
            echo '</script>';
            exit();
        } elseif ($accountType == 'doctor') {
            $query = "SELECT DID FROM Doctors WHERE Email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $doctor = $result->fetch_assoc();
            $id = $doctor['DID'];
            setcookie('user_id', $id, time() + (120), "/"); 
            echo '<script type="text/javascript">';
            echo 'top.location.href = "doctor_page.php?email=' . urlencode($email) . '";';
            echo '</script>';
            exit();
        } else {
            $query = "SELECT AdminID FROM Admins WHERE Email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $admin = $result->fetch_assoc();
            $id = $admin['AdminID'];
            setcookie('user_id', $id, time() + (120), "/"); 
            echo '<script type="text/javascript">';
            echo 'top.location.href = "admin_page.php?email=' . urlencode($email) . '";';
            echo '</script>';
            exit();
        }
    } else {
        header('Location: login_page.php?error=1');
        exit();
    }
} else {
    header('Location: login.html');
    exit();
}
?>