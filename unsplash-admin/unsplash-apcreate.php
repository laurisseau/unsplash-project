<?php 
include 'unsplash-inc/unsplash-header.php'; 
include '../unsplash-classes/unsplash-category.php'; 
include '../unsplash-classes/unsplash-products.php'; 
include '../unsplash-classes/unsplash-addproduct.php';
?> 

<?php
    $apd = new addproduct();
    if(isset($_POST['submit'])){
        
        
        $insertproduct = $apd->addproductcreate($_POST,$_FILES);
        
    }


?>

    
<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>
            
            <div class = "grid-2">
                
                <?php
                
                if(isset($insertproduct)){
                    echo  $insertproduct;
                }
                
                
                ?>
                       
                    <form action="" method="post" enctype="multipart/form-data" class="real-form">
                       <p> Add Product</p>  
         
                    <div class= "form">
                        

                        <input type="text" name= "productname" autocomplete="off" required>

                        <label class="label-name">
                            <span class="content-name"> Product Name</span>
                        </label> 

                    </div> 
                        
                       
                        
                    <div>
                        <select name="catid">
                            <option>Select Category</option>
                            <?php
                            $cat = new category();
                            $getcat = $cat->readcat();
                            if($getcat){
                                while($result = $getcat->fetch_assoc()){
                            
                            ?>
                            
                            <option value="<?php echo $result['catid']; ?>"><?php echo $result['catname'];?></option>
                            
                            <?php } } ?>
                        </select>

                    </div>
                    
                   <div>
                        <select  name="proid">
                            <option>Select products</option>
                            <?php
                            $brand = new product();
                            $getpro = $brand->readpro();
                            if($getpro){
                                while($result = $getpro->fetch_assoc()){
                            
                            ?>
                            
                            <option value="<?php echo $result['proid']; ?>"><?php echo $result['proname'];?></option>
                            
                            <?php } } ?>
                        </select>

                    </div>
                    
                    <div>
                        <textarea class="txt-body" name="body"></textarea>
                    <div>
                        
                     <div>
                        <input type="file" name= 'image' /> 
                    </div>
                        
                     <div class= "form">
                        

                        <input type="text" name= "price" autocomplete="off" required>

                        <label  class="label-name">
                            <span class="content-name" name="price"> Price </span>
                        </label> 

                    </div> 
                        
                    
                         
           
                        
                   <div>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">General</option>
                        </select>

                    </div>


                    </div>    
<div class="sub-and-back">
                    <div class="buttons">
                    <button class="btn" type= "submit" name= "submit" value="save" >Submit</button>  
                    </div>
                        
                     <btn class="btn"> <a href="unsplash-addproduct.php">go back</a> </btn>
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





























