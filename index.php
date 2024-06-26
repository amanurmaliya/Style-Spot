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

<!doctype html>
<html lang="ar">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Barbar</title>
  </head>
  <body>

    <!-- This is the Navbar -->
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Barbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<div class="container my-5">
  <!-- Plase provide the whole path -->
<form action="\barbar\index.php" method="post" class="row g-3 needs-validation" novalidate>
<fieldset>
         <legend>Profile Information:</legend>
  <div class="col-md-4">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your First Name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your Last Name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="shopname" class="form-label">Shop Name</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="shopname">@</span>
      <input type="text" class="form-control" id="shopname" name="shopname" aria-describedby="inputGroupPrepend" placeholder="Enter the Your Shop Name" required>
      <div class="invalid-feedback">
        Please choose a Shop Name.
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">City</label>
    <select class="form-select" id="validationCustom04" name="city" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid City.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="validationCustom04" name="state" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Zip</label>
    <input type="text" class="form-control" id="validationCustom05" name="zip" placeholder="Postal Code / Pin Code" required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Create Shop</button>
  </div>
</fieldset>
</form>
</div>

<div class="container">
  <?php
    $sql = "select * from `barbarshop`;";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
      echo $row['sno'] ." ". $row['fname'] ." ". $row['sname'] ." ". $row['shopname'] ." ".$row['city'] ." ".$row['state']." ". $row['zip'];
      echo "<br>";
    }
  ?>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
  </body>
</html>

  