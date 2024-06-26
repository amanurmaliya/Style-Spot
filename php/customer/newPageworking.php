<?php 
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "tutorial") or die("Couldn't Connect");  

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Details</title>
</head>
<body>

<?php
// Check if shop name is provided
if (isset($_GET['shopName'])) {
    $shopName = $_GET['shopName'];
    $sql = "SELECT * FROM shopservices WHERE Username = '$shopName'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h1>Shop Name: " . $shopName . "</h1>";
        // Display services as cards
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>";
            echo "<h3>" . $row['Username'] . "</h3>";
            echo "<p>Haircut: ₹" . $row['Haircut'] . "</p>";
            // Adjusted the button onclick event to properly invoke the JavaScript function
            echo "<button onclick='bookService(\"$shopName\", \"Haircut\", {$row['Haircut']})'>Book Haircut</button>";
            echo "<p>Beardcut: ₹" . $row['Beardcut'] . "</p>";
            echo "<button onclick='bookService(\"" . $row['Username'] . "\", \"Beardcut\", " . $row['Beardcut'] . ")'>Book Beardcut</button>";
            echo "<br>";
            echo "<p>Shaving: ₹" . $row['Shaving'] . "</p>";
            echo "<button onclick='bookService(\"" . $row['Username'] . "\", \"Shaving\", " . $row['Shaving'] . ")'>Book Shaving</button>";
            echo "<br>";
            echo "<p>Facial: ₹" . $row['Facial'] . "</p>";
            echo "<button onclick='bookService(\"" . $row['Username'] . "\", \"Facial\", " . $row['Facial'] . ")'>Book Facial</button>";
            echo "<br>";
            echo "<p>Haircoloring: ₹" . $row['Haircoloring'] . "</p>";
            echo "<button onclick='bookService(\"" . $row['Username'] . "\", \"Haircoloring\", " . $row['Haircoloring'] . ")'>Book Haircoloring</button>";
            echo "<br>";
            echo "<p>Facemasking: ₹" . $row['Facemasking'] . "</p>";
            echo "<button onclick='bookService(\"" . $row['Username'] . "\", \"Facemasking\", " . $row['Facemasking'] . ")'>Book Facemasking</button>";
            echo "<br>";
            // Add more service details here
            echo "</div>";
            // Add similar buttons for other services
            echo "</div>";
        }
    } else {
        echo "No services found for this shop";
    }
} else {
    echo "Shop name not provided";
}
?>

<script>
function bookService(shopName, serviceType, price) {
    <?php
    // Fetch balance from database
    $sql = "SELECT finalamount FROM customerwallet WHERE email = '{$_SESSION['valid']}'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $balance = $row['finalamount'];
        if ($balance < $price) {
            echo "alert('Low Balance! Please recharge.');";
            echo "return;"; // Exit the function if the balance is low
        }
    } else {
        echo 'window.location.href = "book.php?shopName=" + shopName + "&serviceType=" + serviceType + "&price=" + price;';
        echo "return;"; // Exit the function if there's an error
    }
    ?>
    // If balance is sufficient, proceed to book
    // window.location.href = "book.php?shopName=" + shopName + "&serviceType=" + serviceType + "&price=" + price;
}
</script>

</body>
</html>
