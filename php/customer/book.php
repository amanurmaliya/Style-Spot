<?php
session_start();
$username = $_SESSION['username'];

$shopName = isset($_GET['shopName']) ? $_GET['shopName'] : '';
$serviceType = isset($_GET['serviceType']) ? $_GET['serviceType'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <style>
        .free { background-color: green; color: white; }
        .booked { background-color: red; color: white; }
    </style>
</head>
<body>

<h1>Booking Details</h1>

<p>Shop Name: <?php echo htmlspecialchars($shopName); ?></p>
<p>Service Type: <?php echo htmlspecialchars($serviceType); ?></p>
<p>Price: ₹<?php echo htmlspecialchars($price); ?></p>

<div id="time-slots">
    <?php include 'fetch_timeslots.php'; ?>
</div>

</body>
</html>
