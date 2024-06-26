<?php
// Check if shop ID is provided in the URL
if (isset($_GET['shop_id'])) {
    $shop_id = $_GET['shop_id'];
    
    // Redirect to the shop home page based on the provided ID
    header("Location: shop_home_page.php?id=$shop_id");
    exit();
} else {
    // If no shop ID is provided, redirect to a default page or display an error message
    header("Location: default_page.php");
    exit();
}
?>
