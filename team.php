<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');

        ::-webkit-scrollbar {
    width: 7px;
  }
  ::-webkit-scrollbar-track {
    background: #f1f1f1;
  }
  ::-webkit-scrollbar-thumb {
    background: #d4d4d4; 
  }
  ::-webkit-scrollbar-thumb:hover {
    background: #a9a9a9;
  }

        body {
            overflow-x: hidden;
            padding: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background-color: #fff;
        }

        img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 10px;
            object-fit: cover;
            background-color: black;
        }

        .title {
            font-weight: bold;
            margin-bottom: 8px;
            font-family: 'Montserrat';
            font-size: 25px;
            font-weight: 600;
            
        }

        .description {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
            font-family: 'Roboto';
            font-size: 15px;
        }

        .select {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            background-color: black;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        h1{
            text-align:center;
            margin-bottom: 65px;
            font-size: 50px;   
            font-family: 'Noto Sans'; 
        }

        .select:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h1>Our Warriors</h1>
    
<?php
require_once("db_connection.php");

$sql = "SELECT DID, Name, Gender, Qualifications, Specialization, Experience, ContactNumber, Email FROM Doctors";
$result = $conn->query($sql);

// Display the items
if ($result->num_rows > 0) {
    echo '<div class="card-container">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<img src="graphics/doctors/' . $row['Name'] . '.jpg" alt="' . $row['Name'] . '">';
        echo '<p class="title">' . $row['Name'] . '</p>';
        echo '<p class="description">'. $row['Qualifications'] .'<br>'. $row['Specialization'] . '<br>';
        echo '' . $row['Email'] . '</p>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "0 results";
}
?>

</body>
</html>
