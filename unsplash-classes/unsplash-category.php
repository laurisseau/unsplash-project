<?php 

include_once('../unsplash-classes/unsplash-database.php'); 
include_once('../unsplash-classes/unsplash-format.php'); 

?>


<?php

/* <?php 
-----------database create data------------

include '../classes/database.php'; 
include '../classes/format.php'; 

?>


<?php

class category{
    
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }   


public function catcreate($catname){
    
$catname = $this->fm->validation($catname);
$catname = mysqli_real_escape_string($this->db->link,$catname);
    
    if(empty($catname)){
        
        $msg = "feild must not be empty";
        return $msg;
        
    }else{
        
        $query = "INSERT INTO tbl_cat(catname) VALUES ('$catname')";
        $catcreate = $this->db->create($query);
        
        if($catcreate){
            
            $msg = "<span class = 'success'>Category inserted</span>";
            return $msg;
            
        }else{
            
            $msg = "<span class = 'error'>Category insert fail</span>";
            return $msg;
            
        }
        
    }
}
}
-------------create page---------

<?php
    
    $cat = new category();
    if(isset($_POST['submit'])){
        $catname = $_POST['catname'];
        
       $createcat = $cat->catcreate($catname);
    }


?>

<?php 
    if(isset($createcat)) {
        echo $createcat;
    }
?>

--------------------------------------------

?> */

class category{
    
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }   


public function catcreate($catname){
    
$catname = $this->fm->validation($catname);
$catname = mysqli_real_escape_string($this->db->link,$catname);
    
    if(empty($catname)){
        
        $msg = "feild must not be empty";
        return $msg;
        
    }else{
        
        $query = "INSERT INTO tbl_cat(catname) VALUES ('$catname')";
        $catcreate = $this->db->create($query);
        
        if($catcreate){
            
            header("Location: unsplash-category.php");
            
        }else{
            
            $msg = "<span class = 'error'>Category insert fail</span>";
            return $msg;
            
        }
        
    }
}
    
public function readcat(){
    $query = "SELECT * FROM tbl_cat ORDER BY catid DESC";
    $result = $this->db->read($query);
    return $result;
    /*  ----------------read cat-----------
    <?php
                    $getcat = $cat->readcat();
                    if($getcat){
                        $i = 0;
                        while ($result = $getcat->fetch_assoc()){
                            $i++;
                            
                ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['catname']?></td>
                        <td><a href="catedit.php?catid=<?php echo $result['catid'] ?>">edit</a> || <a href="#">delete</a></td>
                    </tr> 
                           <?php } } ?> */
}
    
public function getcatbyid($id){
    $query = "SELECT * FROM tbl_cat WHERE catid = '$id' ";
    $result = $this->db->read($query);
    return $result;
    /* --------edit cat--------
    <?php

if(!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script> window.location = 'catlist.php'; </script>";
    
}else{
    $id = $_GET['catid'];
}


?>


<?php
    
    $cat = new category();
    if(isset($_POST['submit'])){
        $catname = $_POST['catname'];
        
       $createcat = $cat->catcreate($catname);
    }


?>

---------form value--------
  <?php 
                    if(isset($createcat)) {
                        echo $createcat;
                    }
                ?>
                        
                <?php
                        $getcat = $cat->getcatbyid($id);
                        if($getcat){
                            while($result = $getcat->fetch_assoc()){
                                
                        
                ?>
                
                    <form action="create.php" method="post" class="real-form">
                        

                    <div class= "form">
                        

    <input type="text" name="catname" value="<?php echo $result['catname'] ?>" autocomplete="off" required>

                        <label for="catname" class="label-name">
                            <span class="content-name">Category</span>
                        </label> 
                        
                           

                    </div> 
                        
      

                    <div class="buttons">
                    <button class="btn" type= "submit" name= "submit" value="submit" >Submit</button>  
                    </div>
                        
                     <btn class="btn"> <a href="category.php">go back</a> </btn>
                </div>
                
             

                    </form>
            
                         <?php } } ?> 
            
    
    */
    
}
    
public function catupdate($catname, $id){
    $catname = $this->fm->validation($catname);
    $catname = mysqli_real_escape_string($this->db->link, $catname);
    $id = mysqli_real_escape_string($this->db->link, $id);
    
    if(empty($catname)){
        $msg = "field must not be empty";
        return $msg;
    }else{
        $query = "UPDATE tbl_cat 
                SET 
                catname ='$catname' 
                WHERE catid ='$id' ";
        
        $result = $this->db->update($query);
        
        if($result){
          header("Location: unsplash-category.php");
        }else{
           $msg = "<span class='success'>Category Not Updated Successfully.</span> ";
            return $msg;
            /* -----update-----
            <?php
    
    $cat = new category();
    if(isset($_POST['submit'])){
        $catname = $_POST['catname'];
        
       $update = $cat->catupdate($catname, $id);
    }
    
                    <?php 
                    if(isset($update)) {
                        echo $update;
                    }
                ?>


?>
            */
        }
    }
    
}
    
public function delcatbyid($id){
    $query = "DELETE FROM tbl_cat WHERE  catid = '$id' ";
    $deldata = $this->db->delete($query);
    if($deldata){
         header("Location: unsplash-category.php");
        return $msg;
    }else{
        $msg = "category not deleted";
        return $msg;
    }
}
    
}





?>