<?php include "unsplash-inc/unsplash-header.php"; ?>
<?php include '../unsplash-classes/unsplash-products.php'; ?>  


    
<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>
<?php

$product = new product;

if(isset($_POST['submit'])){
    
    $proname = $_POST['proname'];
    
    $createpro = $product->createpro($proname);
}

?>
 
            <div class = "grid-2">
                    
                    <form action="" method="post" class="real-form">
                         <p> Create Product</p>   
                    <?php
                        if(isset($createpro)){
                            return $createpro;
                        }
                    ?>
                    <div class= "form">

                        <input type="text" name= "proname" autocomplete="off" required>

                        <label for="Occupation" class="label-name">
                            <span class="content-name">Product</span>
                        </label> 

                    </div> 
<div class="sub-and-back">
                    <div class="buttons">
                    <button class="btn" type= "submit" name= "submit" value="submit" >Submit</button>  
                    </div>
                            
                     <btn class="btn back"> <a href="unsplash-products.php">go back</a> </btn>
</div> 
                </div>

                    </form>
                </div>
                
            </div>
            

            
        </div>
    </body>
    <footer>
    <p>© 2020 Dashboard - All rights reserved.</p>
    </footer>

</html>





























