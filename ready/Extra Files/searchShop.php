<?php
// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch shops based on the location provided in the search form
if (isset($_GET['location'])) {
    $location = $_GET['location'];
    
    // SQL query to fetch shops based on location
    $sql = "SELECT * FROM shops WHERE location LIKE '%$location%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the list of shops
        echo "<h2>Shops in $location:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<a href='shop_home.php?shop_id=" . $row['id'] . "'>" . $row['name'] . "</a><br>";
        }
    } else {
        echo "No shops found in $location";
    }
}

// Close connection
$conn->close();
?>
