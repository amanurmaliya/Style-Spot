<?php
// script to reset appointments every 24 hours

// Function to reset appointments
function resetAppointments() {
    // Connect to your database
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

    // Perform necessary actions to reset appointments (e.g., update appointment status, delete expired appointments)
    $sql = "UPDATE appointments SET status = 'available' WHERE status = 'booked'";
    if ($conn->query($sql) === TRUE) {
        // echo "Appointments reset successfully";
    } else {
        // echo "Error resetting appointments: " . $conn->error;   (doing this because i don't have to print anything)
    }

    // Close connection
    $conn->close();
}

// Call the function to reset appointments
resetAppointments();
?>
