<?php

include 'unsplash-classes/unsplash-session.php';
session::start();

include 'unsplash-classes/unsplash-database.php';
include 'unsplash-classes/unsplash-format.php';
include_once ('unsplash-classes/unsplash-addproduct.php'); 
include_once ('unsplash-classes/unsplash-cart.php'); 
include_once ('unsplash-classes/unsplash-user.php'); 

$db = new database();
$fm = new Format();
$pf = new addproduct();
$ct = new Cart();
$cmr = new User();

?>

<?php

if(!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}

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
      <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-cart.css">
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

    <div class="container cart">

        <div class="cover">

            <h1>Your Profile</h1>
            
            <?php
            
            $id = session::get('cmrid');
            $getdata = $cmr->getcusdata($id);
            if($getdata){
                while($result = $getdata->fetch_assoc()){
            
            ?>


                <table>

                    <tr>
                        <td> Username  </td>
                        <td> : </td>
                        <td> <?php echo $result['username']; ?> </td>
                    </tr>

                    <tr>
                        <td> Full-Name  </td>
                        <td> : </td>
                        <td> <?php echo $result['name']; ?> </td>
                    </tr>
                    
                    <tr>
                        <td> Email Adress  </td>
                        <td> : </td>
                        <td> <?php echo $result['email']; ?> </td>
                    </tr>
                    
                    <tr>
                         <td><a href="unsplash-editprofile.php">Update Profile</a></td>
                    </tr>
                    
                <?php }  } ?>

                </table>

                <div class="cart-out">
                    
                    <?php 
                    
                        if(isset($_GET['cid'])) {
                            $deldata = $ct->delcuscart();
                            session::destroy();
                        }
                    
                    ?>
                    
                    <?php 
                    
                        $login = session::get('cuslogin');
                        if($login == true){
                    
                    ?>
                    
                    <a href="?cid=<?php session::get('cmrid');?>">Logout</a>
                    
                   
                    
                    <?php } ?>
                    
                </div>

            </div>
    </div>
    
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