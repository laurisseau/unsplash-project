<?php

include 'unsplash-classes/unsplash-session.php';
session::start();


include 'unsplash-classes/unsplash-database.php';
include 'unsplash-classes/unsplash-format.php';
include_once ('unsplash-classes/unsplash-addproduct.php'); 
include_once ('unsplash-classes/unsplash-cart.php'); 

$db = new database();
$fm = new Format();
$pd = new addproduct();
$ct = new Cart();


?>

<!doctype html>
<html lang="en">
  <head>
       <title> Ecom Website </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-icons-1.2.2/font/bootstrap-icons.css">

      <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-preview.css">
      <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-footer.css">
  </head>
    
    <body>
        
    
    <div class="container"> 
            <nav>
                <ul>
                    <li><a href="unsplash-home.php" class="home"> Home </a></li>
                    <li><a href="#">Photos <i class="bi bi-chevron-down"></i></a></li>
                    <li><a href="#">Videos <i class="bi bi-chevron-down"></i></a></li>
                    <li><a href="#">Music <i class="bi bi-chevron-down"></i></a></li>
                    <li><a href="unsplash-cart.php" class="cart"><i class="bi bi-cart"></i> Cart </a></li>
                    
                                        <?php 
                    
                    $login = session::get('cuslogin');
                    if($login == true){ ?>
                        <li><a class="cart" href="unsplash-profile.php">Profile</a></li>
                   <?php  } ?>
                    
                </ul>
            </nav>
        </div> 
        
        
    <div class="container preview">
        <div class="row">

            
    <?php
            
    $id = $_GET['proid'];
            
    if(isset($_POST['submit'])){
                        
    $addCart = $ct->addtocart($id);
        
    }       
            
        
    $getpd = $pd->getSingleProduct($id);
            if($getpd){
                while($result = $getpd->fetch_assoc()){
    ?>
  
            
            <div class="box col-7">
                <img src="unsplash-admin/<?php echo $result['image']?>">
                <p><?php echo $result['productname']; ?></p>
            </div>
        
            <div class="box-2 col-4">
                <p><?php echo $result['body']; ?></p>
                <p2> Price: $<?php echo $result['price']; ?> </p2>
                
             
                
                
                <form action=" " method="post">
                    <input type="submit" name="submit" value="Add To Cart">
                </form>
                
                <span style="color: red; font-size: 18px;">
                
                <?php 
                    
                if(isset($addCart)) {
                    echo $addCart;
                }    
                    
                ?>
                    
                </span>
                
            </div>
            <?php } } ?>
        </div>
    </div> 
            
    <footer>
        <div class="container">
            <p>© 2003-2021 Unchained, Inc.</p>
           
            <ul>
                <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
            </ul> 
        </div> 
    </footer>
        
    
    
    
   
    </body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="css/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <script>
        
    $(function(){
        $(".dropdown-item").click(function(){
            var icon_text =$(this).html();
            $(".dropdown-toggle").html(icon_text);
        });
    })    
        
        
    </script>
        
      
  </body>
</html>