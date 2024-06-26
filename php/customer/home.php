<?php 
   session_start();

  //  include("php/config.php");
  $conn = mysqli_connect("localhost","root","","tutorial") or die("Couldn't Connect");  
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }


   //    Apne sessionvariable me itni values stored hain
   //    $_SESSION['valid'] = $row['Email'];
   //    $_SESSION['username'] = $row['Username'];
   //    $_SESSION['age'] = $row['Age'];
   //    $_SESSION['id'] = $row['Id'];
   //    $_SESSION['table'] = $table;
   
//    $customerName = '';
//    if(!isset($_SESSION['username']))
//    {
//     $customerName = $_SESSION['username'];
//    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br><br><nav>
        <a href="#">Home</a>
        <a href="../wallet/wallet.php">Wallet</a>
        <a href="services.html">Services</a>
        <a href="contact.html">Contact Us</a>
        <a href="../php/logout.php"> Log Out </a>
      </nav>
      <div>
        <h1 class="a"><span>Welcome</span><?php echo " ".ucfirst($_SESSION['username'])?></h1>
        <br><br>
        <form class="search-form" method="GET" action="">

          <label for="location" class="search-location">Location</label>
                    <select  id="location" name="location">

                        <option value="01">Ambedkar Ward</option>
                        <option value="02">Arjun Ward</option>
                        <option value="03">Chhatrasal Ward</option>
                        <option value="04">Lokmanya Tilak Ward</option>
                        <option value="05">Swami Purnanand Ward</option>
                        <option value="06">Sarojini Naidu Ward</option>
                        <option value="07">Brindaban Ward</option>
                        <option value="08">Rajendranath Thakur Ward</option>
                        <option value="09">Shrdhar Ward</option>
                        <option value="10">Acharya Narendra Ward</option>
                        <option value="11">Mahaveer Ward</option>
                        <option value="12">Abdul Kalam Azad Ward</option>
                        <option value="13">Ravisankar Shukla Ward</option>
                        <option value="14">Lal Bahadur Shastri Ward</option>
                        <option value="15">Archya Vinoba Bhave Ward</option>
                        <option value="16">Sahid Padamdhar Ward</option>
                        <option value="17">Jagjiban Ram Ward</option>
                        <option value="18">Sanjay Gandhi Ward</option>
                        <option value="19">Lal Lajpathrai Ward</option>
                        <option value="20">Sardar Patel Ward</option>
                        <option value="21">Sant Kanwar Ram Ward</option>
                        <option value="22">Shivaji Ward</option>
                        <option value="23">Rajiv Gandhi Ward</option>
                        <option value="24">Asok Ward</option>
                        <option value="25">Tulsiram Thapa Ward</option>
                        <option value="26">Netaji Subhash Ward</option>
                        <option value="27">Swami Vivekanand Ward</option>
                        <option value="28">Purusottamdas Tandan Ward</option>
                        <option value="29">Rafi Ahamad Kidwai Ward</option>
                        <option value="30">Dr. Ram Manohar Lohiya Ward</option>
                        <option value="31">Dr. Rajendra Prasad Ward</option>
                        <option value="32">Dr Radhakrishnan ward</option>
                        <option value="33">Sardar Bhagat Singh Ward</option>
                        <option value="34">Indira Gandhi Ward</option>
                        <option value="35">Thakur Ranmat Singh Ward</option>
                        <option value="36">Chandrasekhar Azad Ward</option>
                        <option value="37">Jai Prakas Narayan Ward</option>
                        <option value="38">Veer Sawarkar Ward</option>
                        <option value="39">Mahatma Gandhi Ward</option>
                        <option value="40">Viswas Rai Painter Ward</option>
                        <option value="41">Maharana Pratap Ward</option>
                        <option value="42">Maharani Laximibai Ward</option>
                        <option value="43">Thakkar Bapa Ward</option>
                        <option value="44">Jawahal Lal Nehru Ward</option>
                        <option value="45">Malviya Ward</option>
                        <option value="46">Satna Railway Colony (OG) - Ward No.46</option>
                    </select>
                </div>

          <button type="submit" class="search-button" >Search</button>
        </form>
      </div><br><br>
      <div>
        <!-- <form method="GET" action="">
          <label for="location">Enter Location:</label>
          <input type="text" id="location" name="location">
          <button type="submit">Search</button>
      </form> -->
      
      <?php
      // Database connection
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
      
      // Fetching data from database based on user input
      if (isset($_GET['location']) && !empty($_GET['location'])) {
          $location = $_GET['location'];
          $sql = "SELECT * FROM shopkeeper WHERE Location LIKE '%$location%'";
          $result = $conn->query($sql);
      
          if ($result->num_rows > 0) {
              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                  // echo "<div class='card'>";
                  // echo "<h3>" . $row['Username'] . "</h3>";
                  // echo "<p>Location: " . $row['Location'] . "</p>";
                  // // You can add more details here like opening hours, contact info, etc.
                  // echo "</div>";
                  echo "<a href='newPage.php?shopName=" . urlencode($row['Username']) . "' class='card'>";
                  echo "<h3>" . $row['Username'] . "</h3>";
                  echo "<p>Location: " . $row['Location'] . "</p>";
                  // You can add more details here like opening hours, contact info, etc.
                  echo "</a>";
              }
          } else {
              echo "No results found";
          }
      }
      
      $conn->close();
      ?>
      
      </div>
    <!-----------Portfolio Section--------------->
<section class="portfolio" id="portfolio">
	<div class="main-text">
		<h2><span>Our</span>Services</h2>
	</div>
	<div class="portfolio-content">
		<div class="row">
			<img src="https://substackcdn.com/image/fetch/f_auto,q_auto:good,fl_progressive:steep/https%3A%2F%2Fbucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com%2Fpublic%2Fimages%2F6f52479d-4f8e-46e1-ba1b-a246e286a51f_1000x500.jpeg" >
			<div class="layer">
				<h5>Haircut	</h5>
				<p>Check out 10 best Design's updates for the top web design & development compaines.</p>
				<a href="#"> <i class='bx bx-link-external'></i></a>
			</div>
		</div>

		<div class="row">
			<img src="https://grizzlyadam.co.uk/wp-content/uploads/2016/02/Kinds-of-Beard-Style-Names-1024x709.jpg" >
			<div class="layer">
				<h5>Beardcut</h5>
				<p>Check out 10 best Design's updates for the top web design & development compaines.</p>
				<a href="#"> <i class='bx bx-link-external'></i></a>
			</div>
		</div>

		<div class="row">
			<img src="https://www.shutterstock.com/image-photo/hipster-client-visiting-barber-shop-600nw-456453979.jpg" >
			<div class="layer">
				<h5>Shaving</h5>
				<p>Check out 10 best Design's updates for the top web design & development compaines.</p>
				<a href="#"> <i class='bx bx-link-external'></i></a>
			</div>
		</div>

		<div class="row">
			<img src="https://t4.ftcdn.net/jpg/02/53/83/31/360_F_253833180_MoWQh7guAIkZQeptSTpNMKfZgP7Yyx7B.jpg" >
			<div class="layer">
				<h5>Facial</h5>
				<p>Check out 10 best Design's updates for the top web design & development compaines.</p>
				<a href="#"> <i class='bx bx-link-external'></i></a>
			</div>
		</div>

		<div class="row">
			<img src="https://external-preview.redd.it/zQBlkD4RmkIKaN1wX8_77cTn2XiFaAioiqleQPTmfjA.jpg?auto=webp&s=1d1b2aac7605dde98df9905c288190eb45503dac" >
			<div class="layer">
				<h5>Haircoloring</h5>
				<p>Check out 10 best Design's updates for the top web design & development compaines.</p>
				<a href="#"> <i class='bx bx-link-external'></i></a>
			</div>
		</div>

		<div class="row">
			<img src="https://www.tiege.com/cdn/shop/articles/charcoal-mask-applied-to-guys-face.jpg?v=1563577409" >
			<div class="layer">
				<h5>Facemasking</h5>
				<p>Check out 10 best Design's updates for the top web design & development compaines.</p>
				<a href="#"> <i class='bx bx-link-external'></i></a>
			</div>
		</div>
	</div>

</section>
</body>
</html>