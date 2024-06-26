<?php
session_start();
$shopName = isset($_SESSION['username']) ? $_SESSION['username'] : '';

$server = "localhost";
$username = "root";
$password = "";
$database = "tutorial";

$conn = mysqli_connect($server, $username, $password, $database);

if($conn -> connect_error)
{
    die("Database in Unreachable!");
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if($_POST['hairCut'])
    {

        $hairCut = $_POST['hairCut'];
        $sql = "UPDATE shopservices SET Haircut = $hairCut WHERE Username = '$shopName'";
        $res = mysqli_query($conn, $sql);
    
        if($res)
        {
            echo '<div id="success-alert" class="alert alert-success" role="alert">
            Price updated successfully...!!
         </div>';
        }
        else
        {
            echo '<div id="success-alert" class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> Price Updation Failed..
         </div>';
        }
    }
    if (isset($_POST["beardcut"]) && !empty($_POST["beardcut"])) {
        $beardcut = $_POST['beardcut'];

        $sql = "UPDATE shopservices SET beardcut = $beardcut WHERE Username = '$shopName'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div id="success-alert" class="alert alert-success" role="alert">
            Price updated successfully...!!
         </div>';
        }
        else
        {
            echo '<div id="success-alert" class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> Price Updation Failed..
         </div>';
        }
    }

    if (isset($_POST["shaving"]) && !empty($_POST["shaving"])) {
        $shaving = $_POST['shaving'];

        $sql = "UPDATE shopservices SET shaving = $shaving WHERE Username = '$shopName'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div id="success-alert" class="alert alert-success" role="alert">
            Price updated successfully...!!
         </div>';
        }
        else
        {
            echo '<div id="success-alert" class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> Price Updation Failed..
         </div>';
        }
    }

    // facial form
    if (isset($_POST["facial"]) && !empty($_POST["facial"])) {
        $facial = $_POST['facial'];

        $sql = "UPDATE shopservices SET facial = $facial WHERE Username = '$shopName'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div id="success-alert" class="alert alert-success" role="alert">
            Price updated successfully...!!
         </div>';
        }
        else
        {
            echo '<div id="success-alert" class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> Price Updation Failed..
         </div>';
        }
    }

    if (isset($_POST["haircoloring"]) && !empty($_POST["haircoloring"])) {
        $haircoloring = $_POST['haircoloring'];

        $sql = "UPDATE shopservices SET haircoloring = $haircoloring WHERE Username = '$shopName'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div id="success-alert" class="alert alert-success" role="alert">
            Price updated successfully...!!
         </div>';
        }
        else
        {
            echo '<div id="success-alert" class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> Price Updation Failed..
         </div>';
        }
    }

    // facemasking form
    if (isset($_POST["facemasking"]) && !empty($_POST["facemasking"])) {
        $facemasking = $_POST['facemasking'];

        $sql = "UPDATE shopservices SET facemasking = $facemasking WHERE Username = '$shopName'";

        $res = mysqli_query($conn, $sql);
        if($res)
        {
            echo '<div id="success-alert" class="alert alert-success" role="alert">
            Price updated successfully...!!
         </div>';
        }
        else
        {
            echo '<div id="success-alert" class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> Price Updation Failed..
         </div>';
        }
    }

    echo '<script>
                setTimeout(function(){
                    document.getElementById("success-alert").style.display = "none";
                }, 2000);
                setTimeout(function(){
                    window.location.href = window.location.href;
                }, 2000);
            </script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .alert {
            padding: 15px;
            border: 1px solid #4CAF50;
            border-radius: 4px;
            background-color: #DFF2BF;
            color: #4F8A10;
            margin-bottom: 10px;
        }

        .alert-success {
            background-color: #DFF2BF;
            border-color: #4CAF50;
            color: #4F8A10;
        }

        .alert-danger {
            background-color: #FFBABA;
            border-color: #D8000C;
            color: #D8000C;
        }
        /* <link rel="stylesheet" href="servicestyle.css"> */
        </style>
</head>
<script>
    </script>
    
    
<body>
    
    <form action="" method="post">
        <?php
        $shopName = isset($_SESSION['username']) ? $_SESSION['username'] : '';

        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "tutorial";
        
        $conn = mysqli_connect($server, $username, $password, $database);
        
        if($conn -> connect_error)
        {
            die("Database in Unreachable!");
        }

        $sql = "select * from shopservices where username = '$shopName'";
        $res = mysqli_query($conn, $sql);
        $ans = mysqli_fetch_assoc($res);
        ?>
        <label for="hairCut" >hairCut</label>
        <input type="number" name="hairCut" id="hairCut" placeholder="<?php echo $ans['Haircut']; ?>">
        <br>
        <label for="beardcut" >beardcut</label>
        <input type="number" name="beardcut" id="beardcut" placeholder="<?php echo $ans['Beardcut']; ?>">
        <br>
        <label for="shaving" >shaving</label>
        <input type="number" name="shaving" id="shaving" placeholder="<?php echo $ans['Shaving']; ?>">
        <br>
        <label for="facial" >facial</label>
        <input type="number" name="facial" id="facial" placeholder="<?php echo $ans['Facial']; ?>">
        <br>
        <label for="haircoloring" >haircoloring</label>
        <input type="number" name="haircoloring" id="haircoloring" placeholder="<?php echo $ans['Haircoloring']; ?>">
        <br>
        <label for="facemasking">facemasking</label>
        <input type="number" name="facemasking" id="facemasking" placeholder="<?php echo $ans['Facemasking']; ?>">
        
        <br>
        <button type="submit">Save Changed Price</button>
        
    </form>
</body>
</html>

