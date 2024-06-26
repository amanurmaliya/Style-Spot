<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber Shop Details</title>
</head>
<body>

<?php
if (isset($_GET['shopName'])) {
    $shopName = $_GET['shopName'];

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

    // Fetch shop details
    $sql_shop = "SELECT * FROM shopkeeper WHERE Username = '$shopName'";
    $result_shop = $conn->query($sql_shop);

    if ($result_shop->num_rows > 0) {
        $row_shop = $result_shop->fetch_assoc();
        echo "<h1>" . $row_shop['Username'] . "</h1>";
        // Display other shop details here
    } else {
        echo "Shop not found";
    }

    // Fetch services offered by the shop
    $sql_services = "SELECT * FROM serviceList WHERE ShopName = '$shopName'";
    $result_services = $conn->query($sql_services);

    if ($result_services->num_rows > 0) {
        echo "<h2>Services Offered:</h2>";
        echo "<ul>";
        while ($row_service = $result_services->fetch_assoc()) {
            echo "<li>" . $row_service['serviceType'] . " - $" . $row_service['price'] . " <button onclick='bookService(\"" . $row_service['serviceType'] . "\", " . $row_service['price'] . ")'>Book Now</button></li>";
        }
        echo "</ul>";
    } else {
        echo "No services found";
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>

<script>
    function bookService(serviceType, price) {
        // You can implement booking functionality here
        var serviceName = serviceType;
        var totalAmount = price;

        // Send AJAX request to save booking details to the database
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Booking successful!");
            }
        };
        xhttp.open("POST", "save_booking.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name=" + serviceName + "&totalAmount=" + totalAmount);
    }
</script>

</body>
</html>
