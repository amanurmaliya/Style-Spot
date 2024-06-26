<?php
// Retrieve parameters from the URL
session_start();

   //    Apne sessionvariable me itni values stored hain
   //    $_SESSION['valid'] = $row['Email'];
   //    $_SESSION['username'] = $row['Username'];
   //    $_SESSION['age'] = $row['Age'];
   //    $_SESSION['id'] = $row['Id'];
   //    $_SESSION['table'] = $table;
$shopName = isset($_SESSION['valid']) ? $_SESSION['valid'] : '';

$serviceType = isset($_GET['serviceType']) ? $_GET['serviceType'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
// Now you can use $shopName, $serviceType, and $price as needed in your booking.php page
?>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointments";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haircut form
        if (isset($_POST["hairCut"]) && !empty($_POST["hairCut"])) {
            $haircut = $_POST['hairCut'];

            $sql = "UPDATE shopservices SET Haircut = $haircut WHERE Username = '$shopName'";

            $res = mysqli_query($conn, $sql);
            if($res)
            {
                echo '<div class="alert alert-success" role="alert">
                Price updated successfully...!!
             </div>';
            }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Failed To Update...!!
            </div>';
        }
    }

    if (isset($_POST["beardcut"]) && !empty($_POST["beardcut"])) {
        $beardcut = $_POST['beardcut'];

        $sql = "UPDATE shopservices SET beardcut = $beardcut WHERE service_name = 'beardcut'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div class="alert alert-success" role="alert">
            Price updated successfully...!!
          </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Failed To Update...!!
            </div>';
        }
    }

    if (isset($_POST["shaving"]) && !empty($_POST["shaving"])) {
        $shaving = $_POST['shaving'];

        $sql = "UPDATE shopservices SET shaving = $shaving WHERE service_name = 'shaving'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div class="alert alert-success" role="alert">
            Price updated successfully...!!
          </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Failed To Update...!!
            </div>';
        }
    }

    // facial form
    if (isset($_POST["facial"]) && !empty($_POST["facial"])) {
        $facial = $_POST['facial'];

        $sql = "UPDATE shopservices SET facial = $facial WHERE service_name = 'facial'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div class="alert alert-success" role="alert">
            Price updated successfully...!!
          </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Failed To Update...!!
            </div>';
        }
    }

    if (isset($_POST["haircoloring"]) && !empty($_POST["haircoloring"])) {
        $haircoloring = $_POST['haircoloring'];

        $sql = "UPDATE shopservices SET haircoloring = $haircoloring WHERE service_name = 'haircoloring'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div class="alert alert-success" role="alert">
            Price updated successfully...!!
          </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Failed To Update...!!
            </div>';
        }
    }

    // facemasking form
    if (isset($_POST["facemasking"]) && !empty($_POST["facemasking"])) {
        $facemasking = $_POST['facemasking'];

        $sql = "UPDATE shopservices SET facemasking = $facemasking WHERE service_name = 'haircut'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div class="alert alert-success" role="alert">
            Price updated successfully...!!
          </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Failed To Update...!!
            </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

       * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }
        :root {
            --bg-color: #2a2a2a;
            --second-bg-color: #202020;
            --text-color: #fff;
            --second-color: #ccc;
            --main-color: #93ed0c;
            --big-font: 5rem;
            --h2-font: 3rem;
            --p-font: 1.1rem;
        }
        body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-image: url(img/bodybgimg.jpg);
    animation: color-change 10s infinite;
}

@keyframes color-change {
    0% { background-color: #f2f2f2; }
    50% { background-color: #e0e0e0; }
    100% { background-color: #f2f2f2; }
}

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .service_section {
            background-color: #f2f2f2;
            padding: 50px 0;
        }

        .section_heading h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .service_box {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(79, 59, 59, 0.1);
            margin-bottom: 20px;
        }

        .service_box img {
            width: 80px; /* Adjust as needed */
            height: auto;
            margin-bottom: 10px;
        }

        .service_box h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .service_box p {
            font-size: 16px;
            color: #24eefd;
        }

        /* -----------------------------------01 */

        img {
            width: 40px;
            height: 40px;
        }

        .main-container {
            background-image: url('bg.jpg');
        }

        .main-text {
            text-align: center;
        }

        .main-text p {
            color: var(--second-color);
            font-size: 15px;
            margin-bottom: 15px;
        }

        .main-text h2 {
            font-size: var(--h2-font);
            line-height: 1;
        }

        .services-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, auto));
            align-items: center;
            gap: 2.5rem;
            margin-top: 5rem;
        }

        .box {
            background: var(--bg-color);
            padding: 35px 45px;
            border-radius: 8px;
            transition: all .45s ease;
        }

        .s-icons i {
            font-size: 32px;
            margin-bottom: 20px;

        }

        .box h3 {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 15px;
        }

        .box p {
            color: var(--second-color);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .box:hover {
            transform: translateY(-8px);
            cursor: pointer;
        }

        .portfolio-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, auto));
            align-items: center;
            gap: 2.5rem;
            margin-top: 5rem;
        }

        .row {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
            color: #ccc;
            font-size: large;
        }

        .row img {
    width: 500px;
    border-radius: 10px;
    display:block;
    height: 300px;
    transition: transform 0.5s;
    animation: move-up 1s linear forwards;
}

@keyframes move-up {
    0% { transform: translateY(100px); }
    100% { transform: translateY(0); }
}

        .layer {
            width: 100%;
            height: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.1), #00a6ff);
            position: absolute;
            border-radius: 8px;
            left: 0;
            bottom: 0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 40px;
            transition: height 0.5s;
        }

        .layer h5 {
            font-size: 30px; 
            
            /* font-weight: 600; */
            font-weight: 900;
            margin-bottom: 15px;
        }

        .layer p {
            color: var(--second-color);
            font-size: 1rem;
            line-height: 1.8;

        }

        .layer i {
            color: var(--main-color);
            margin-top: 20px;
            font-size: 20px;
            background: var(--text-color);
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;

        }

        .row:hover img {
            transform: scale(1.1);

        }

        .row:hover .layer {
            height: 100%;
        }

        .price-input {
            width: 100px;
            padding: 5px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .submit-price {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-price:hover {
            background-color: #0056b3;
        }
      header {
      background-color: #ffffff; /* Set header background color to white */
      color: #000000; /* Set header text color to black */
      padding: 50px;
      text-align: center;
      border-bottom: 2px solid #ffffff; /* Remove header border */
      animation: fadeIn 1s ease-in-out;
      background-image: url(img/bgimg.png);
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }    .animated-text {
      font-size: 3rem;
      background: linear-gradient(to right, #ff9966, #ff5e62, #ff63e6);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: animate 5s linear infinite;
    }
    @keyframes animate {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }.portfolio[data-scroll] {
    transition: transform 0.5s;
}

.portfolio[data-scroll="in-view"] {
    transform: translateY(0);
}

.portfolio[data-scroll="out-of-view"] {
    transform: translateY(100px);
}
    </style>
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
                    <button class="submit-price">Submit</button>
                    <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>

        <div class="row">
            <img src="img/promo-2.jpg">
            <div class="layer">
                <h5>Shaving</h5>
                <!-- <input type="text" class="price-input" placeholder="Enter price"> -->
                <input type="number" class="price-input" placeholder="Enter price" name="shaving" id="shaving" required>
                <button class="submit-price">Submit</button>
                <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>

        <div class="row">
            <img src="img/facial.jpeg">
            <div class="layer">
                <h5>Facial</h5>
                <input type="number" class="price-input" placeholder="Enter price" name="facial" id="facial" required>
                <button class="submit-price">Submit</button>
                <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>
        
        <div class="row">
            <img src="img/post-2.jpg">
            <div class="layer">
                <h5>Haircoloring</h5>
                <!-- <input type="text" class="price-input" placeholder="Enter price"> -->
                <input type="number" class="price-input" placeholder="Enter price" name="hairColor" id="hairColor" required>
                <button class="submit-price">Submit</button>
                <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>

        <div class="row">
            <img src="img/face mask.webp">
            <div class="layer">
                <h5>Facemasking</h5>
                <input type="text" class="price-input" placeholder="Enter price">
                <input type="number" class="price-input" placeholder="Enter price" name="faceMask" id="faceMask" required>
                <a href="#"> <i class='bx bx-link-external'></i></a>
            </div>
        </div>
    </div>

</section>
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
