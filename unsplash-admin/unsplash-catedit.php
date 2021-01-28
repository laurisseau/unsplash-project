<?php include "unsplash-inc/unsplash-header.php"; ?>
<?php include '../unsplash-classes/unsplash-category.php'; ?>  

    
<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>

<?php

if(!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script> window.location = 'unsplash-catlist.php'; </script>";
    
}else{
    $id = $_GET['catid'];
}


?>


<?php
    
    $cat = new category();
    if(isset($_POST['submit'])){
        $catname = $_POST['catname'];
        
       $update = $cat->catupdate($catname, $id);
    }


?>
   
            <div class = "grid-2">
                   
                <?php 
                    if(isset($update)) {
                        echo $update;
                    }
                ?>
                        
                <?php
                        $getcat = $cat->getcatbyid($id);
                        if($getcat){
                            while($result = $getcat->fetch_assoc()){
                                
                        
                ?>
                
                    <form action="" method="post" class="real-form">
                         <p> Update Category</p>  

                    <div class= "form">
                        

    <input type="text" name="catname" value="<?php echo $result['catname'] ?>" autocomplete="off" required>

                        <label for="catname" class="label-name">
                            <span class="content-name">Category</span>
                        </label> 

                    </div> 
                        
      
<div class="sub-and-back">
                    <div class="buttons">
                    <button class="btn" type= "submit" name= "submit" value="submit" >update</button>  
                    </div>
                        
                     <btn class="btn"> <a href="unsplash-category.php">go back</a> </btn>
                </div>
</div>
                
             

                    </form>
            
                         <?php } } ?> 
            
                </div>
                
            </div>
            

            
        </div>
    </body>
    <footer>
    <p>© 2020 Dashboard - All rights reserved.</p>
    </footer>

</html>