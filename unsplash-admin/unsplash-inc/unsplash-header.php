<?php 
include '../unsplash-classes/unsplash-session.php'; 
session::Blogin(); 
?>

<?php

    if(isset($_GET['action']) && $_GET['action']== 'logout'){
        session::destroy();
    }
    
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <title> Dashboard </title>
    
    
<link rel="stylesheet" type="text/css" href="unsplash-css/bootstrap/bootstrap-icons-1.2.2/font/bootstrap-icons.css">
    
<link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-header.css">
    
</head>

<header>
    <p>Hello <?php echo session::get('name'); ?>!</p>

</header>
    
      <body>
        <div class="body">
            <nav class = "grid-1">
                    <ul>
                        <li><a href="unsplash-dashboard.php">Dashboard</a></li>
                        <li><a href="unsplash-products.php">Brand</a></li>
                        <li><a href="unsplash-category.php">Category</a></li>
                        <li><a href="unsplash-adminorder.php">Orders</a></li>
                         <li><a href="unsplash-addproduct.php">Add Product</a></li>
                        <li><a href="unsplash-tasks.php">Tasks</a></li>
                    </ul>

                    <ul>
                        <li><a href="unsplash-profile.php">Profile</a></li>
                        
                        <li><a href="?action=logout">Logout</a></li>
                    </ul>
            </nav>
    
    