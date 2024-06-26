<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "appointments";

$conn = mysqli_connect($server, $username, $password, $database) or die("Connection Failed");

// if($conn->mysqli_error)
// {
//     echo "Connection Failed";
//     die
// }
?>