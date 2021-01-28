<?php include "unsplash-inc/unsplash-header.php"; ?> 
<?php include '../unsplash-classes/unsplash-category.php'; ?> 

    
<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>


<?php
    
    $cat = new category();
    if(isset($_POST['submit'])){
        $catname = $_POST['catname'];
        
       $createcat = $cat->catcreate($catname);
    }


?>

            <div class = "grid-2">
                       
                    <form action="" method="post" class="real-form">
                       <p> Create Category</p>  
                <?php 
                    if(isset($createcat)) {
                        echo $createcat;
                    }
                ?>
                    <div class= "form">
                        

                        <input type="text" name= "catname" autocomplete="off" required>

                        <label for="Occupation" class="label-name">
                            <span class="content-name">Category</span>
                        </label> 

                    </div> 
<div class="sub-and-back">
                    <div class="buttons">
                    <button class="btn" type= "submit" name= "submit" value="submit" >Submit</button>  
                    </div>
                        
                     <btn class="btn"> <a href="unsplash-category.php">go back</a> </btn>
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





























