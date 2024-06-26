<?php
    $servername = "localhost";
    $username = "root";
    $password = " ";
    $database = "shop";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn)
    {
      die("Sorry!, Your connection Failed");
    }
    echo "Connection Successful";

    if($_SERVER['REQUEST_METHOD']=='POST') {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $shopname = $_POST['shopname'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $zip = $_POST['zip'];
  
      $sql = "INSERT INTO `barbarshop` (`sno`, `fname`, `sname`, `shopname`, `city`, `state`, `zip`) VALUES (NULL, '$fname', '$lname', '$shopname', '$city', '$state', '$zip')";
      
      $result = mysqli_query($conn, $sql);
      if($result) {
          echo "Inserted";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  ?>