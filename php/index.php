<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
              include("php/config.php");
              
              if(isset($_POST['submit'])){
                $table = '';
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);
                $userType = mysqli_real_escape_string($con,$_POST['userType']);

                if($userType == 'customer'){
                    $table = 'customer';
                } elseif ($userType == 'shopkeeper') {
                    $table = 'shopkeeper';
                }
                
                $result = mysqli_query($con,"SELECT * FROM $table WHERE Email='$email' AND Password='$password' ") or die(mysqli_error($con));

                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                    $_SESSION['table'] = $table;
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    if($table=='shopkeeper')
                    {
                        header("Location: barbar\project vi sem\shopkeeperhome.php");
                    }
                    else if($table =='customer')
                    {
                        header("Location: customer\home.php");
                    }
                    
                }
              }else{

            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="userType">Select User Type:</label>
                    <select id="userType" name="userType">
                    <option value="customer">Customer</option>
                    <option value="shopkeeper">Shopkeeper</option>
                    </select>
                </div>
                

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>