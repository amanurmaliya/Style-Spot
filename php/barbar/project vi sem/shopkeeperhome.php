<?php 
   session_start();

  //  include("php/config.php");

   //    Apne sessionvariable me itni values stored hain
   //    $_SESSION['valid'] = $row['Email'];
   //    $_SESSION['username'] = $row['Username'];
   //    $_SESSION['age'] = $row['Age'];
   //    $_SESSION['id'] = $row['Id'];
   //    $_SESSION['table'] = $table;
  $conn = mysqli_connect("localhost","root","","tutorial") or die("Couldn't Connect");  
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopkeeper Home Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body> 
  <header>
    <h1 class="animated-text">Welcome to your Shop</h1>
  </header>
  <nav>
    <a href="#">Home</a>
    <a href="products.html">Products</a>
    <a href="editServices.php">Services</a>
    <a href="#">Contact Us</a>
    <a href="appointment.php">Customer Appointments</a>
    <a href="logout.php"> Log Out </a>
  </nav>
  <div class="content">
    <h1>Hello!! <?php echo " ".ucfirst($_SESSION['username'])?></h1>
  </div>

  <section><div class="gallery">
    <div class="image-box active">
      <img src="img//portfolio-2.jpg">
    </div>


    <div class="image-box">
      <img src="img//post-1.jpg">
    </div>
    <div class="image-box">
      <img src="img//post-2.jpg">
    </div>    <div class="image-box">
      <img src="img//post-3.jpg">
    </div>    <div class="image-box">
      <img src="img//post-5.jpg">
    </div>
  </div></section>
  <footer>
    <h2>About Us</h2>
    <p class="para">Welcome to your shop! We offer a wide range of products and services to meet your needs.</p><br>
    <p>&copy; 2024. All rights reserved.</p>
  </footer>
  <script>
window.addEventListener('scroll', () => {
  const img = document.querySelector('.feature_img');
  const positionFromTop = img.getBoundingClientRect().top;
  const screenHeight = window.innerHeight;

  if (positionFromTop < screenHeight) {
    img.style.opacity = 1;
    img.style.transform = 'translateY(0)';
  } else {
    img.style.opacity = 0;
    img.style.transform = 'translateY(30px)';
  }
});
</script>
</html>
</body>
