<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber Shop Search</title>
    <style>
        /* Add your CSS styles here */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 300px;
            display: inline-block;
        }
    </style>
</head>
<body>

<h1>Barber Shop Search</h1>

<form method="GET" action="">
    <label for="location">Enter Location:</label>
    <input type="text" id="location" name="location">
    <button type="submit">Search</button>
</form>

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

// Fetching data from database based on user input
if (isset($_GET['location']) && !empty($_GET['location'])) {
    $location = $_GET['location'];
    $sql = "SELECT * FROM shopkeeper WHERE Location LIKE '%$location%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // echo "<div class='card'>";
            // echo "<h3>" . $row['Username'] . "</h3>";
            // echo "<p>Location: " . $row['Location'] . "</p>";
            // // You can add more details here like opening hours, contact info, etc.
            // echo "</div>";
            echo "<a href='newPage.php?shopName=" . urlencode($row['Username']) . "' class='card'>";
            echo "<h3>" . $row['Username'] . "</h3>";
            echo "<p>Location: " . $row['Location'] . "</p>";
            // You can add more details here like opening hours, contact info, etc.
            echo "</a>";
        }
    } else {
        echo "No results found";
    }
}

$conn->close();
?>

</body>
</html>
