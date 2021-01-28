<?php

include 'unsplash-classes/unsplash-session.php';
session::start();
include 'unsplash-classes/unsplash-database.php';
include 'unsplash-classes/unsplash-format.php';

 
include_once ('unsplash-classes/unsplash-user.php'); 


$cmr = new User();

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
      
      <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-nav.css">
      <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-login.css">
      
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
        </ul>
    </nav>
</div> 
    

    
    <?php
    
    if(isset($_POST['login'])){
        
       $customerLogin = $cmr->customerLogin($_POST);
        
    }
    
    ?>
    
    
    <section class="Form" >
        <div class="container">
                <div class="px-5 pt-5 box">
    
                    <h4 >Sign Into Your Account</h4>
                    
                    <?php

                        if(isset($customerLogin)){
                            echo $customerLogin;
                        }

                    ?>
                    
                    <form action=" " method="post">
                        
                        <div>
                            <div class="col-lg-12">
                                <input type="Username" name="username" class="form-control my-3 p-3" placeholder="Username">
                            </div>
                        </div>
                        
                        <div>
                            <div class="col-lg-12">
                                <input type="password" name="pass" class="form-control my-3 p-3" placeholder="Password">
                            </div>
                        </div>
                        
                        <div >
                            <div class="col-lg-12">
                                <button name="login" class="btn-1 mt-3 mb-5">Login</button>
                            </div>
                        </div>
                        
                        <a href="#">Forgot Password</a>
                        
                        <p>Don't Have An Account?<a href="unsplash-register.php"> Register Here</a></p>
                        
                    </form>
                </div>
        </div> 
    </section>
    
</body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS-->
    
    
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