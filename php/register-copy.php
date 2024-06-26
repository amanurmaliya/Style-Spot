<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">

            <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];
            $userType = $_POST['userType'];
            
         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
            else {
                if ($userType == 'customer') {
                    // Save data for customer
                    mysqli_query($con, "INSERT INTO customer(Username, Email, Age, Password) VALUES('$username','$email','$age','$password')") or die("Error Occurred");
                } else if ($userType == 'shopkeeper') {
                    // Save data for shopkeeper with location
                    $location = $_POST['location'];
                    mysqli_query($con, "INSERT INTO shopkeeper(Username, Email, Age, Password, Location) VALUES('$username','$email','$age','$password','$location')") or die("Error Occurred");
                }

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="userType" name="userType">Select User Type:</label>
                    <select id="userType" name="userType" onchange="toggleLocation()">
                        <option value="customer">Customer</option>
                        <option value="shopkeeper">Shopkeeper</option>
                        
                    </select>
                </div>

                <div class="field input" id="locationField" style="display: none;">
                    <label for="location">Location</label>
                    <select id="location" name="location">

                        <option value="01">01 Ambedkar Ward</option>
                        <option value="02">02 Arjun Ward</option>
                        <option value="03">03 Chhatrasal Ward</option>
                        <option value="04">04 Lokmanya Tilak Ward</option>
                        <option value="05">05 Swami Purnanand Ward</option>
                        <option value="06">06 Sarojini Naidu Ward</option>
                        <option value="07">07 Brindaban Ward</option>
                        <option value="08">08 Rajendranath Thakur Ward</option>
                        <option value="09">09 Shrdhar Ward</option>
                        <option value="10">10 Acharya Narendra Ward</option>
                        <option value="11">11 Mahaveer Ward</option>
                        <option value="12">12 Abdul Kalam Azad Ward</option>
                        <option value="13">13 Ravisankar Shukla Ward</option>
                        <option value="14">14 Lal Bahadur Shastri Ward</option>
                        <option value="15">15 Archya Vinoba Bhave Ward</option>
                        <option value="16">16 Sahid Padamdhar Ward</option>
                        <option value="17">17 Jagjiban Ram Ward</option>
                        <option value="18">18 Sanjay Gandhi Ward</option>
                        <option value="19">19 Lal Lajpathrai Ward</option>
                        <option value="20">20 Sardar Patel Ward</option>
                        <option value="21">21 Sant Kanwar Ram Ward</option>
                        <option value="22">22 Shivaji Ward</option>
                        <option value="23">23 Rajiv Gandhi Ward</option>
                        <option value="24">24 Asok Ward</option>
                        <option value="25">25 Tulsiram Thapa Ward</option>
                        <option value="26">26 Netaji Subhash Ward</option>
                        <option value="27">27 Swami Vivekanand Ward</option>
                        <option value="28">28 Purusottamdas Tandan Ward</option>
                        <option value="29">29 Rafi Ahamad Kidwai Ward</option>
                        <option value="30">30 Dr. Ram Manohar Lohiya Ward</option>
                        <option value="31">31 Dr. Rajendra Prasad Ward</option>
                        <option value="32">32 Dr Radhakrishnan ward</option>
                        <option value="33">33 Sardar Bhagat Singh Ward</option>
                        <option value="34">34 Indira Gandhi Ward</option>
                        <option value="35">35 Thakur Ranmat Singh Ward</option>
                        <option value="36">36 Chandrasekhar Azad Ward</option>
                        <option value="37">37 Jai Prakas Narayan Ward</option>
                        <option value="38">38 Veer Sawarkar Ward</option>
                        <option value="39">39 Mahatma Gandhi Ward</option>
                        <option value="40">40 Viswas Rai Painter Ward</option>
                        <option value="41">41 Maharana Pratap Ward</option>
                        <option value="42">42 Maharani Laximibai Ward</option>
                        <option value="43">43 Thakkar Bapa Ward</option>
                        <option value="44">44 Jawahal Lal Nehru Ward</option>
                        <option value="45">45 Malviya Ward</option>
                        <option value="46">46 Satna Railway Colony (OG) - Ward No.46</option>
                    </select>
                </div>

                <div class="field">

                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

    <script>
    function toggleLocation() {
        var userType = document.getElementById('userType').value;
        var locationField = document.getElementById('locationField');
        if (userType === 'shopkeeper') {
            locationField.style.display = 'block';
        } else {
            locationField.style.display = 'none';
        }
    }
    </script>
</body>

</html>