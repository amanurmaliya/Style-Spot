<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            width: 50%;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        .wallet-image {
            display: block;
            margin: 0 auto 20px auto;
            max-width: 100%;
            border-radius: 10px;
        }

        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .add-money-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .add-money-btn:hover {
            background-color: #45a049;
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    include ("../php/configwallet.php");
    $email = "user@example.com";
    ?>
    <div class="container">
        <img src="wallet.png" alt="Wallet" class="wallet-image">
        <div class="amount"><?php
        $sql = "SELECT * FROM customerwallet WHERE email = '$email' ORDER BY dateandtime DESC LIMIT 1";
        
        $query = mysqli_query($conn, $sql);
        
        /* This is just to see the number of rows present here
        if(mysqli_num_rows($query)>0)
        {
          
        }
        else{
          echo "no rows!";
        }
        */
        while($result = mysqli_fetch_assoc($query))
        {
          echo '₹'. $result['amount'];
          
        }
        ?></div>
        <a href="#" class="add-money-btn" id="addmoney" data-toggle="modal" data-target="#addMoneyModalLabel">Add Money</a>
    </div>
    <!-- <button type="button" data-toggle="modal" data-target="#exampleModal">Launch modal</button> -->

  
    <!-- Modal -->
    <!-- Add Money Modal -->
    <div class="modal fade" id="addMoneyModal" tabindex="-1" role="dialog" aria-labelledby="addMoneyModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addMoneyModalLabel">Add Money</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="addMoneyForm" method="post" action="process.php">
              <div class="form-group">
                <label for="amount">Amount (Rs)</label>
                <input type="number" class="form-control"  id="amount" name="amount" min="10" max="1500" placeholder="₹ 10 - ₹1500" required>
              </div>
              <div class="form-group">
                <label for="upi">UPI Reference No.</label>
                <input type="text" class="form-control"  id="upi" name="upi" pattern="\d{12}" placeholder="Please enter 12 digit upi transaction number" required>
              </div>
              <button type="submit" class="btn btn-primary">Add Money</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Transaction History Section -->
  <div class="transaction-history">
    <h2>Transaction History</h2>
    <ul id="transactionList">
      <!-- Transaction items will be added dynamically here -->
      <table class="table">
        <thead>
            <tr>
                <th>S. No</th>
                <th>Date</th>
                <th>Time</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to retrieve the last 10 transactions for the user
            $sql = "SELECT * FROM (SELECT * FROM customerwallet WHERE email='$email' ORDER BY dateandtime DESC LIMIT 10) AS recent_transactions ";

            // Execute the query
            $query = mysqli_query($conn, $sql);

            // Check if any rows are returned
            if (mysqli_num_rows($query) > 0) {
                // Counter variable for serial number
                $serial_no = 1;

                // Loop through each row of the result set
                while ($row = mysqli_fetch_assoc($query)) {
                    // Extract data from the row
                    $date = date("Y-m-d", strtotime($row['dateandtime']));
                    $time = date("H:i:s", strtotime($row['dateandtime']));
                    $amount = $row['amount'];

                    // Output row data
                    echo "<tr>";
                    echo "<td>$serial_no</td>";
                    echo "<td>$date</td>";
                    echo "<td>$time</td>";
                    echo "<td>₹$amount</td>";
                    echo "</tr>";

                    // Increment serial number
                    $serial_no++;
                }
            } else {
                // No transactions found
                echo "<tr><td colspan='4'>No transactions found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </ul>
  </div>
  
    <script src="script.js"></script>
</body>
</html>
