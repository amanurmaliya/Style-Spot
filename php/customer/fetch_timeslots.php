<?php
// Retrieve parameters from the URL
// session_start();

$customerId = isset($_SESSION['username']) ? $_SESSION['username']: 'Random Customer';

$shopName = isset($_GET['shopName']) ? $_GET['shopName'] : '';
$serviceType = isset($_GET['serviceType']) ? $_GET['serviceType'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointments";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $time = $_POST['time']; 

    $column = '';
    if ($time == '1') {
        $column = 'nineone';
        $time = '09:00';
    } elseif ($time == '2') {
        $column = 'ninetwo';
        $time = '09:30';
    } elseif ($time == '3') {
        $column = 'tenone';
        $time = '10:00';
    } elseif ($time == '4') {
        $column = 'tentwo';
        $time = '10:30';
    } elseif ($time == '5') {
        $column = 'elevenone';
        $time = '11:00';
    } elseif ($time == '6') {
        $column = 'eleventwo';
        $time = '11:30';
    } elseif ($time == '7') {
        $column = 'tweleveone';
        $time = '12:00';
    } elseif ($time == '8') {
        $column = 'twelevetwo';
        $time = '12:30';
    } elseif ($time == '9') {
        $column = 'oneone';
        $time = '01:00';
    } elseif ($time == '10') {
        $column = 'onetwo';
        $time = '01:30';
    } elseif ($time == '11') {
        $column = 'twoone';
        $time = '02:00';
    } elseif ($time == '12') {
        $column = 'twotwo';
        $time = '02:30';
    } elseif ($time == '13') {
        $column = 'threeone';
        $time = '03:00';
    } elseif ($time == '14') {
        $column = 'threetwo';
        $time = '03:30';
    } elseif ($time == '15') {
        $column = 'fourone';
        $time = '04:00';
    } elseif ($time == '16') {
        $column = 'fourtwo';
        $time = '04:30';
    } elseif ($time == '17') {
        $column = 'fiveone';
        $time = '05:00';
    } elseif ($time == '18') {
        $column = 'fivetwo';
        $time = '05:30';
    } elseif ($time == '19') {
        $column = 'sixone';
        $time = '06:00';
    } elseif ($time == '20') {
        $column = 'sixtwo';
        $time = '06:30';
    } else {
        echo "invalid time";
    }
    
    $sql = "INSERT INTO $shopName (Username, Appointmenttime, Servicetype, Amount) VALUES ('$customerId', '$time', '$serviceType','$price')";
    if ($conn->query($sql) === TRUE) {
        // Booking successful
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $connectionBarbartime = mysqli_connect('localhost', 'root','','tutorial') or die("Failed To Connect!");
    $sqlQuery = "UPDATE barbartiming SET $column = 1 WHERE name = '$shopName'";
    if (mysqli_query($connectionBarbartime, $sqlQuery)) {
        include("../php/configwallet.php");

        $query = "SELECT * FROM customerwallet WHERE email = '$customerId' ORDER BY dateandtime DESC LIMIT 1";
        $queryres = mysqli_query($conn, $query);
        $finalamount = 0;
        if(mysqli_num_rows($queryres) >= 1)
        {
            $currrow = mysqli_fetch_assoc($queryres);
            $finalamount += $currrow['finalamount'];
        }
        $finalamount -= $price;
        $updateQuery = "UPDATE customerwallet SET finalamount = $finalamount WHERE email ='$customerId'";
        $queryres = mysqli_query($conn, $updateQuery);

    
        echo "<script>alert('Appointment booked successfully.');</script>";
    } else {
        echo "Error: " . mysqli_error($connectionBarbartime);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homecss.css">
</head>
<body>
    <?php
    $connectionBarbartime = mysqli_connect('localhost', 'root','','tutorial') or die("Failed To Connect!");
    $sql = "SELECT * FROM barbartiming WHERE name = '$shopName'";
    $result = $connectionBarbartime->query($sql);
    $timeing = 9;
    $flag = true;
    $id = 1;

    if ($result) {
        echo "<form id='bookingForm' method='post'>";
        echo "<select name='time' id='time'>";
        while ($row = $result->fetch_assoc()) {
            foreach ($row as $columnName => $value) {
                if ($flag) {
                    $status = ($value == 0) ? "free" : "booked";
                    echo '<option value="'.$id++.'" class="' . $status . '" data-time="' . $timeing . ':00">' . $timeing . ':00' . '</option>';
                    $flag = false;
                } else {
                    $status = ($value == 0) ? "free" : "booked";
                    echo '<option value="'.$id++.'" class="' . $status . '" data-time="' . $timeing . ':30">' . $timeing++ . ':30' . '</option>';
                    $flag = true;    
                    if ($timeing > 12) {
                        $timeing = 1;   
                    }
                }
            }
        }
        echo "</select>";
        echo "<button type='submit'>Book Appointment</button>";
        echo "</form>";
    } else {
        echo "No results found for the specified name.";
    }
    ?>

    <script>
        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            var selectedOption = document.querySelector('#time option:checked');
            if (selectedOption.classList.contains('booked')) {
                event.preventDefault();
                alert('This time slot is already booked. Please select another one.');
            }
        });
    </script>
</body>
</html>
