<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Details</title>
</head>
<body>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorial";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['shopName'])) {
    $shopName = $_GET['shopName'];
    $sql = "SELECT * FROM shopservices WHERE Username = '$shopName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Shop Name: " . $shopName . "</h1>";
        // Display services as cards
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<h3>" . $row['Username'] . "</h3>";
            echo "<p>Haircut: ₹" . $row['Haircut'] . "</p>";
            echo "<p>Beardcut: ₹" . $row['Beardcut'] . "</p>";
            echo "<p>Shaving: ₹" . $row['Shaving'] . "</p>";
            echo "<p>Facial: ₹" . $row['Facial'] . "</p>";
            echo "<p>Haircoloring: ₹" . $row['Haircoloring'] . "</p>";
            echo "<p>Facemasking: ₹" . $row['Facemasking'] . "</p>";
            // echo "<p>Beardcut: ₹" . $row['Beardcut'] . "</p>";
            // Add more service details here
            echo "<button onclick='bookService(\"" . $row['Username'] . "\", \"Haircut\", " . $row['Haircut'] . ")'>Book Now</button>";
            echo "</div>";
        }
    } else {
        echo "No services found for this shop";
    }
} else {
    echo "Shop name not provided";
}
$conn->close();
?>

<script>
    function bookService(shopName, serviceType, price) {
        // Redirect to booking page with parameters
        window.location.href = "booking.php?shopName=" + shopName + "&serviceType=" + serviceType + "&price=" + price;
    }
</script>

</body>
</html>
