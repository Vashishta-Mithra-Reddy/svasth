<!DOCTYPE html>
<html>
<head>
    <title>Appointment Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .card {
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            margin-top: 15px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        select {
            width: calc(100% - 20px);
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Appointment Form</h2>
        <form id="appointmentForm" action="appointment_registration.php" method="post">
            <label for="patientID">Patient ID:</label>
            <input type="text" id="patientID" name="patientID" required>

            <label for="doctorName">Doctor Name:</label>
            <select id="doctorName" name="doctorName" required>
            <?php
                // PHP code to fetch doctor names from the database and populate the dropdown
                // Replace with your database connection details
                require_once("db_connection.php");

                // Fetch doctor names from the Doctor table
                $sql = "SELECT Name FROM doctors";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
                    }
                } else {
                    echo '<option value="">No doctors available</option>';
                }

                // Close the database connection
               
            ?>
            </select>

            <label for="appointmentDate">Appointment Date:</label>
            <input type="date" id="appointmentDate" name="appointmentDate" required>

            <label for="appointmentTime">Appointment Time:</label>
            <input type="time" id="appointmentTime" name="appointmentTime" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Scheduled">Scheduled</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Completed">Completed</option>
            </select>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
