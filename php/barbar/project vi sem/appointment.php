<?php
session_start(); // Start the session

// Access the username from the session variable
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Appointment List</h1>
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Appointment Time</th>
                    <th>Service Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="appointment-list">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "appointments") or die("Could not connect!");

                    $sql = "SELECT * FROM `$username`"; // Use backticks for table names to avoid SQL syntax errors

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            // Fetch and display rows if there are any
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                <td>" . htmlspecialchars($row['Username']) . "</td>
                                <td>" . htmlspecialchars($row['Appointmenttime']) . "</td>
                                <td>" . htmlspecialchars($row['Servicetype']) . "</td>
                                <td>" . htmlspecialchars($row['Amount']) . "</td>
                                </tr>";
                            }
                        } else {
                            // Display a message if there are no appointments
                            echo "<tr><td colspan='4'>No appointments available</td></tr>";
                        }
                    } else {
                        // Display an error message if the query failed
                        echo "<tr><td colspan='4'>Error fetching appointments: " . htmlspecialchars(mysqli_error($conn)) . "</td></tr>";
                    }

                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
