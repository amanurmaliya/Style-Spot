<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  session_start(); // Start the session to access session variables
  include("../php/configwallet.php"); // Include the database configuration file
  // $_SESSION['email'] = "user@example.com"; // Replace with actual email
  
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Validate and sanitize inputs
      $amount = $_POST['amount'];
      $upi = $_POST['upi'];
  
      // Get the user's email from the session (assuming it's stored in a session variable)
      $email = $_SESSION['valid']; // Adjust this according to how you store the email in the session
  
      // Get the current date and time in Indian standard time
      date_default_timezone_set('Asia/Kolkata'); // Set the timezone to Indian Standard Time
      $dateandtime = date('Y-m-d H:i:s'); // Get the current date and time in the specified format
  
      // Insert the transaction into the database
      // $res = mysqli_query($conn, "INSERT INTO customerwallet (email, amount, dateandtime, upirefno) VALUES ('$email', '$amount', '$dateandtime', '$upi')");
      
      $query = "SELECT * FROM customerwallet WHERE email = '$email' ORDER BY dateandtime DESC LIMIT 1";
      $queryres = mysqli_query($conn, $query);
      $finalamount = 0;
      if(mysqli_num_rows($queryres) >= 1)
      {
        $currrow = mysqli_fetch_assoc($queryres);
        $finalamount += $currrow['finalamount'];
      }
      $finalamount += $amount;
      /* Ye query isliye likha tha taki check kar paye ki kahin same upi id toh nahi daal de rahe
      // lekin ab upi id ko hi humne primary key bana diya toh check karne ki jarurat hi nahi hai
      $query = "SELECT * FROM customerwallet WHERE email = '$email' LIMIT 5";
      $queryres = mysqli_query($conn, $query);
      
      while($currrow = mysqli_fetch_assoc($queryres))
      {
        echo $currrow['upirefno']; 
        echo $upi;

        // echo "$currrow['upirefno']==$upi";
        if($currrow['upirefno']==$upi)
        {
          echo '<div class="alert alert-danger" role="alert">
            Failed To Add Money! hi
            </div>';
            echo "hi";
      }
      }
      // $res = mysqli_query($conn, "INSERT INTO customerwallet (email, amount, dateandtime, upirefno) VALUES ('$email','$amount', '$dateandtime', '$upi')");
      */
      $res = mysqli_query($conn, "INSERT INTO customerwallet (email, amount, dateandtime, upirefno, finalamount) VALUES ('$email', '$amount', '$dateandtime', '$upi', $finalamount)");

      if($res){
      echo '<div class="alert alert-success" role="alert">
      Amount Added Successfully!!
    </div>';
    $conn = null;
    echo "
    <script>
    function redirect() {
      setTimeout(function() {
        window.location.href = 'wallet.php'; // Replace  with the URL of the page you want to redirect to
      }, 1000); // 1000 milliseconds = 1 second
  }

  // Call the redirect function when the page loads
  window.onload = redirect;
  </script>";
      }
      else 
      {
        // This will show that that query insertion failed
          echo '<div class="alert alert-danger" role="alert">
            Failed To Add Money!
            </div>'
        ;
        $conn = null;
        echo "
        <script>
        function redirect() {
          setTimeout(function() {
            window.location.href = 'wallet.php'; // Replace  with the URL of the page you want to redirect to
          }, 1000); // 1000 milliseconds = 1 second
      }
  
      // Call the redirect function when the page loads
      window.onload = redirect;
      </script>";
    }

      /* This is used to redirect to the homepage
      echo "
      <script>
      function redirect() {
        setTimeout(function() {
          window.location.href = 'wallet.php'; // Replace  with the URL of the page you want to redirect to
        }, 1000); // 1000 milliseconds = 1 second
    }

    // Call the redirect function when the page loads
    window.onload = redirect;
      </script>";
      */
      // Close the database connection
  
      // Redirect the user to the wallet page or any other page as needed
      // header("Location: wallet.php"); // Adjust the redirection URL as needed
      // exit();
  }
  ?>
  
</body>
</html>


