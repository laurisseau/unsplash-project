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

    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-header.css">
      <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-products.css">
      <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-footer.css">
      
  </head>
    
    
    <body>
        

    
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        
        
        <div class="carousel-inner">
            
            
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>
            
            <div class="carousel-item active" >
                
            <div class="overlay-image sect-1" style="background-image: url(unsplash-images/header-1.jpg)"></div> 
                
                
                
            <div class="container section-1">
        
            <nav>
                <ul>
                    <li><a href="unsplash-home.php" class="home"> Home </a></li>
                    <li><a href="#" class="photos">Photos <i class="bi bi-chevron-down"></i></a></li>
                    <li><a href="#" class="videos">Videos <i class="bi bi-chevron-down"></i></a></li>
                    <li><a href="#" class="music">Music <i class="bi bi-chevron-down"></i></a></li>
                    
                    <?php
                    
                        $chkcart = $ct->checkCartTable();
                        if(isset($chkcart)){ ?>
                            
                             <li><a href="unsplash-cart.php" class="cart"><i class="bi bi-cart"></i> Cart </a></li>
                            
                        <?php } ?>
                    
                    
                    
                    
                    
                   
                    
                    <?php 
                    
                    $login = session::get('cuslogin');
                    if($login == true){ ?>
                        <li><a class="cart" href="unsplash-profile.php">Profile</a></li>
                   <?php  } ?>
                    
                    
                    
                    
                </ul>
            </nav>    

                    <h1>Get 10 free images now</h1>
                    <p>Start your risk-free trial today and design eye-catching websites, emails, social posts, and more.</p>
                    
                    <ul>
                        <li> 
                           
                            
                                <?php 
        
                                    $login = session::get("cuslogin");

                                if($login == false){ ?>
                                    <a class="cbtn" href="unsplash-login.php">Log In</a>
                            
                                     <a class="cbtn" href="unsplash-register.php">Sign Up</a>
                            
                                <?php }else{ ?>
                                    
                                      <a class="cbtn" href="">Start your free trial</a>
                                    
                               <?php } ?>
                            
                            
                        </li>
                        
                        
                    </ul>
                    
                </div>
                
            </div>
            
            <div class="carousel-item">
                
            <div class="overlay-image sect-1" style="background-image: url(unsplash-images/header-2.jpg)"></div>
                
            <div class="container section-1">

                       <nav>
        <ul>
            <li><a href="unsplash-home.php" class="home"> Home </a></li>
            <li><a href="#" class="photos">Photos <i class="bi bi-chevron-down"></i></a></li>
            <li><a href="#" class="videos">Videos <i class="bi bi-chevron-down"></i></a></li>
            <li><a href="#" class="music">Music <i class="bi bi-chevron-down"></i></a></li>
            
            
            <?php
                    
                        $chkcart = $ct->checkCartTable();
                        if(isset($chkcart)){ ?>
                            
                             <li><a href="unsplash-cart.php" class="cart"><i class="bi bi-cart"></i> Cart </a></li>
                            
                        <?php } ?>
                    
                    
                    
                    
                    
                   
                    
                    <?php 
                    
                    $login = session::get('cuslogin');
                    if($login == true){ ?>
                        <li><a class="cart" href="unsplash-profile.php">Profile</a></li>
                   <?php  } ?>
            
        </ul>
    </nav>

                        <h1>Get 10 free images now</h1>
                        <p>Start your risk-free trial today and design eye-catching websites, emails, social posts, and more.</p>

                        <ul class="btnh">
                            <li> 
                           
                            
                                <?php 
        
                                    $login = session::get("cuslogin");

                                if($login == false){ ?>
                                    <a class="cbtn" href="unsplash-login.php">Log In</a>
                            
                                     <a class="cbtn" href="unsplash-register.php">Sign Up</a>
                            
                                <?php }else{ ?>
                                    
                                      <a class="cbtn" href="">Start your free trial</a>
                                    
                               <?php } ?>
                            
                            
                        </li>
                        </ul>
                </div>
                
            </div> 
            
        </div>
        
        <a href="#myCarousel" class="carousel-control-prev" data-slide="prev">
            <span class="sr-only">Previous</span>
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        
        <a href="#myCarousel" class="carousel-control-next" data-slide="prev">
            <span class="sr-only">Previous</span>
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
        
    </div> 
    
    <div class="container product">
            

        
        <h1>Products</h1>
        
        <div class="gallery">
            <div class="row">
         	<?php 
            $getpd = $pd->getproducts(); 
            if ($getpd) {
            	while ($result = $getpd->fetch_assoc()) {
            	 
              ?>
                
                
            <div class="pic col-lg-4 col-md-4 col-sm-12">
                <img src="unsplash-admin/<?php echo $result['image']; ?>" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       
                    <a href="unsplash-preview.php?proid=<?php echo $result['productid'] ?>"><p><?php echo $result['productname']; ?>  </p></a>
                    </div>
                </div>
            </div>
            
                <?php }  } ?>
                
        
            </div>
            
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS

            <div class="pic">
                <img src="images/valentine.jpg" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       <a href="preview.php"><i class="bi bi-cart-plus"></i></a>
                        <p> ectronic typesetting, remaining essentially unchanged.  </p>
                    </div>
                </div>
            </div>
            
            <div class="pic">
                <img src="images/valentine.jpg" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       <a href="preview.php"><i class="bi bi-cart-plus"></i></a>
                        <p> ectronic typesetting, remaining essentially unchanged.  </p>
                    </div>
                </div>
            </div>
            
            <div class="pic">
                <img src="images/valentine.jpg" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       <a href="preview.php"><i class="bi bi-cart-plus"></i></a>
                        <p> ectronic typesetting, remaining essentially unchanged.  </p>
                    </div>
                </div>
            </div>
            
            <div class="pic">
                <img src="images/valentine.jpg" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       <a href="preview.php"><i class="bi bi-cart-plus"></i></a>
                        <p> ectronic typesetting, remaining essentially unchanged.  </p>
                    </div>
                </div>
            </div>
            
            <div class="pic">
                <img src="images/valentine.jpg" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       <a href="preview.php"><i class="bi bi-cart-plus"></i></a>
                        <p> ectronic typesetting, remaining essentially unchanged.  </p>
                    </div>
                </div>
            </div>
            
            <div class="pic">
                <img src="images/valentine.jpg" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       <a href="preview.php"><i class="bi bi-cart-plus"></i></a>
                        <p> ectronic typesetting, remaining essentially unchanged.  </p>
                    </div>
                </div>
            </div>
            
            <div class="pic">
                <img src="images/valentine.jpg" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       <a href="preview.php"><i class="bi bi-cart-plus"></i></a>
                        <p> ectronic typesetting, remaining essentially unchanged.  </p>
                    </div>
                </div>
            </div>
            
            <div class="pic">
                <img src="images/valentine.jpg" class="gal-img">
                
                <div class="overlay">
                    <div class="content">
                       <a href="preview.php"><i class="bi bi-cart-plus"></i></a>
                        <p> ectronic typesetting, remaining essentially unchanged.  </p>
                    </div>
                </div>
            </div>


-->
    
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