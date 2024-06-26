<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "tutorial";

$conn = mysqli_connect($server, $username, $password, $database);

if($conn -> connect_error)
{
    die("Could Not Connect! Please try again");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    // Ye wali main method tab kaam aayegi jab hame sirf kisi individual pe change karna hoga mtlb rate edit wale pe
    if(isset($_POST['hairCut'] && !empty($_POST['hairCut'])))
    {
        $hairCut = $_POST["hairCut"];

        // Individual ke liye yahi sql query likh lena update wali 
    }

    // baki sab ke liye ek saath yahi check laga deta hu halaki jarurat nahi hai qki maine pahle hi laga diya tha ki jo input lenge dhang ka lenge 
    if(isset($_POST['beardCut']) && isset($_POST['shaving']) && isset($_POST['facial']) && isset($_POST['faceMask']))
    {
        $breadCut = $_POST['breadCut'];
        $shaving = $_POST['shaving'];
        $facial = $_POST['facial'];
        $faceMask = $_POST['faceMask'];

        $sql = "INSERT INTO "
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="servicestyle.css">
</head>
<body>
   <header>
    <h1 class="animated-text">Your Services</h1>
  </header>
  <section class="portfolio" id="portfolio" data-scroll>
    <!-- portfolio content here -->

        <div class="portfolio-content">
            <div class="row">
                <img src="img/promo-1.jpg">
                <div class="layer">
                    <h5>Haircut</h5>
       
                    <input type="number" class="price-input" placeholder="Enter price" name="hairCut" id="hairCut" required>
                    <!-- <button class="submit-price">Submit</button> -->
                </div>
            </div>

          

            
            <div class="row">
                <img src="img/service-3.jpg">
                <div class="layer">
                    <h5>Beardcut</h5>
                    <!-- <input type="text" class="price-input" placeholder="Enter price"> -->
                    <input type="number" class="price-input" placeholder="Enter price" name="beardCut" id="beardCut" required>
                    <!-- <button class="submit-price">Submit</button> -->
                    <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>

        <div class="row">
            <img src="img/promo-2.jpg">
            <div class="layer">
                <h5>Shaving</h5>
                <!-- <input type="text" class="price-input" placeholder="Enter price"> -->
                <input type="number" class="price-input" placeholder="Enter price" name="shaving" id="shaving" required>
                <!-- <button class="submit-price">Submit</button> -->
                <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>

        <div class="row">
            <img src="img/facial.jpeg">
            <div class="layer">
                <h5>Facial</h5>
                <input type="number" class="price-input" placeholder="Enter price" name="facial" id="facial" required>
                <!-- <button class="submit-price">Submit</button> -->
                <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>
        
        <div class="row">
            <img src="img/post-2.jpg">
            <div class="layer">
                <h5>Haircoloring</h5>
                <!-- <input type="text" class="price-input" placeholder="Enter price"> -->
                <input type="number" class="price-input" placeholder="Enter price" name="hairColor" id="hairColor" required>
                <!-- <button class="submit-price">Submit</button> -->
                <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>

        <div class="row">
            <img src="img/face mask.webp">
            <div class="layer">
                <h5>Facemasking</h5>
                <!-- <input type="text" class="price-input" placeholder="Enter price"> -->
                <input type="number" class="price-input" placeholder="Enter price" name="faceMask" id="faceMask" required>
                <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>
    </div>
    
</section>
<button class="submit-price">Submit</button>
<script>const portfolioSection = document.querySelector('.portfolio');

  const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
          if (entry.isIntersecting) {
              portfolioSection.dataset.scroll = 'in-view';
          } else {
              portfolioSection.dataset.scroll = 'out-of-view';
          }
      });
  });
  
  observer.observe(portfolioSection);</script>
  
</body>
</html>
