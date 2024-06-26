<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a0d2eb; /* Ice Cold */
            color: #333; /* Dark Text */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #e5eaf5; /* Freeze Purple */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #8458B3; /* Purple Pain */
            text-align: center;
        }

        .card {
            background-color: #d0bdf4; /* Medium Purple */
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .card h3 {
            color: #8458B3; /* Purple Pain */
        }

        .card p {
            margin: 5px 0;
        }

        button {
            background-color: #a28089; /* Heavy Purple */
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #8458B3; /* Purple Pain */
        }

        .message {
            text-align: center;
            color: #8458B3; /* Purple Pain */
            font-style: italic;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "tutorial") or die("Couldn't Connect");

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit; // Stop further execution
}

// Check if shop name is provided
if (isset($_GET['shopName'])) {
    $shopName = $_GET['shopName'];
    $sql = "SELECT * FROM shopservices WHERE Username = '$shopName'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<div class='container'>";
        echo "<h1>Shop Name: " . $shopName . "</h1>";
        // Display services as cards
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>";
            // echo "<h3>" . $row['Username'] . "</h3>";
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
        }
        echo "</div>";
    } else {
        echo "<p class='message'>No services found for this shop</p>";
    }
} else {
    echo "<p class='message'>Shop name not provided</p>";
}

// Fetch user balance
$connectionWallet = mysqli_connect("localhost","root","","wallet") or die("could not connect");
$sql = "SELECT * FROM customerwallet WHERE email = '{$_SESSION['valid']}' ORDER BY dateandtime DESC LIMIT 1";
$result = mysqli_query($connectionWallet, $sql);
$row = mysqli_fetch_assoc($result);
$balance = ($row) ? $row['finalamount'] : 0;

?>

<script>
function bookService(shopName, serviceType, price) {
    var balance = <?php echo $balance; ?>;
    // Compare balance with price
    if (balance < price) {
        alert('Low Balance! Please recharge.');
    } else {
        // Redirect to the booking page with parameters
        window.location.href = 'book.php?shopName=' + shopName + '&serviceType=' + serviceType + '&price=' + price;
    }
}
</script>

</body>
</html>
