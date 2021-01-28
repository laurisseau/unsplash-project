<?php 
include 'unsplash-inc/unsplash-header.php'; 
include '../unsplash-classes/unsplash-category.php'; 
include '../unsplash-classes/unsplash-products.php'; 
include '../unsplash-classes/unsplash-addproduct.php';
?> 

<?php
    $apd = new addproduct();

$id = $_GET['productid'];

    if(isset($_POST['submit'])){
        
        
        
        $updateproduct = $apd->addproductupdate($_POST,$_FILES,$id);
        
        
    }


?>

    
<head>
     <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-form-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-css/unsplash-dash-style.css">
    <link rel="stylesheet" type="text/css" href="unsplash-inc/unsplash-header.php">
</head>

            <div class = "grid-2">
                
                <?php
                
                if(isset($updateproduct)){
                    echo  $updateproduct;
                }
                
                
                ?>
                    
                <?php
                    $getProd = $apd->getprobyid($id);
                if($getProd){
                    while($value = $getProd->fetch_assoc()){
                
                ?>
                    <form action="" method="post" enctype="multipart/form-data" class="real-form">
                       <p> Add Product</p>  
         
                    <div class= "form">
                        

                        <input type="text" value = "<?php echo $value['productname'] ?>" name= "productname" autocomplete="off" required>

                        <label class="label-name">
                            <span class="content-name"> Product Name</span>
                        </label> 

                    </div> 
                           
                    <div>
                        <select name="catid">
                        
                            <option> select category</option>
                            
                           
                            <?php
                            $cat = new category();
                            $getcat = $cat->readcat();
                            if($getcat){
                                while($result = $getcat->fetch_assoc()){
                            
                            ?>
                            
                            <option<?php
                            if($value['catid'] == $result['catid']){?>
                            selected = "selected"
                            <?php } ?>
                            value="<?php echo $value['catid']; ?>" ><?php echo $result['catname'];?></option>
                            
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
                            
                            <option<?php 
                            if($value['proid']==$result['proid']){ ?>
                            selected = "selected";
                            <?php } ?>
                            value="<?php echo $result['proid']; ?>"><?php echo $result['proname'];?></option>
                            
                            <?php } } ?>
                        </select>

                    </div>
                    
                    <div>
                        <textarea class="txt-body" name="body">
                        <?php echo $value['body']; ?>
                        </textarea>
                    <div>
                        
                     <div>
                         <img src = "<?php echo $value['image'];?>" height="40px"; width="60px;"><br/>
                        <input type="file" name= 'image' /> 
                    </div>
                        
                     <div class= "form">
                        

                        <input type="text" name= "price" autocomplete="off" value = "<?php echo $value['price']?>" required>
                         
                

                        <label  class="label-name">
                            <span class="content-name" name="price" > Price </span>
                        </label> 
             

                    </div> 
                        
                   <div>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            
                            <?php
                                if($value['type'] == 0){
                                
                            ?>
                             <option selected = "selected" value="0">Featured</option>
                            <option value="1">General</option>
                            
                                <?php } else {?>
                            
                            <option value="0">Featured</option>
                            <option selected = "selected" value="1">General</option>
                            
                            <?php  } ?>
                            
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
                
                <?php }} ?>
                </div>
                
            </div>
            

            
        </div>
    </body>
    <footer>
    <p>© 2020 Dashboard - All rights reserved.</p>
    </footer>

</html>





























