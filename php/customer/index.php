<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>
    <link rel="stylesheet" href="homecss.css">
    <link rel="stylesheet" href="time.css">
    <style>
        .notification {
            display: none; 
            position: fixed; 
            bottom: 100px; 
            left: 50%; 
            transform: translateX(-50%); 
            background-color: #89bfe6; 
            color: rgb(13, 12, 12); 
            text-align: center; 
            padding: 15px; 
            border-radius: 5px; 
            z-index: 1; 
        }
    </style>
</head>
<body>

<h1>Book an Appointment</h1>

<div class="notification">
    Your appointment is booked!
</div>

<div id="time-slots">
    <?php include 'fetch_timeslots.php'; ?>
</div>

<br><br>
<input onclick="bookAppointment()" type="submit" value="Book Appointment">

<script>
    // Function to toggle the status of a time slot
    function toggleTimeSlot(slot) {
        if (slot.classList.contains('free')) {
            slot.classList.remove('free');
            slot.classList.add('booked');
        } else if (slot.classList.contains('booked')) {
            slot.classList.remove('booked');
            slot.classList.add('free');
        }
    }

    // Function to select a time slot
    function selectTimeSlot(selectedSlot) {
        if (selectedSlot.classList.contains('free')) {
            var slots = document.querySelectorAll(".time-slot");
            var today = new Date().toLocaleDateString();
            var isBookedToday = false;
            slots.forEach(function (slot) {
                if (slot.classList.contains("booked") && slot.dataset.date === today) {
                    isBookedToday = true;
                }
            });
            if (!isBookedToday) {
                slots.forEach(function (slot) {
                    slot.classList.remove("selected");
                });
                selectedSlot.classList.add("selected");
            } else {
                alert("This time slot is already booked for today. Please select another one.");
            }
        } else {
            alert("This time slot is already booked. Please select another one.");
        }
    }

    // Function to show the notification and book the appointment
    function bookAppointment() {
        var selectedSlot = document.querySelector(".selected");
        if (selectedSlot) {
            toggleTimeSlot(selectedSlot);
            showNotification();
        } else {
            alert("Please select a time slot before booking.");
        }
    }

    // Function to show the notification
    function showNotification() {
        var notification = document.querySelector(".notification");
        notification.style.display = "block"; // Display the notification

        // Hide the notification after 3 seconds
        setTimeout(function(){
            notification.style.display = "none";
        }, 3000);
    }
</script>

</body>
</html>
