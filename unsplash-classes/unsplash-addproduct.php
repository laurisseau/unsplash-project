<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../unsplash-classes/unsplash-database.php'); 
include_once ($filepath.'/../unsplash-classes/unsplash-format.php'); 

?>

<?php

class addproduct{
    
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new database();
        $this->fm = new Format();
    }
    
    public function addproductcreate($data,$file){
        
 $productname=mysqli_real_escape_string($this->db->link, $data['productname'] );
    $catid =mysqli_real_escape_string($this->db->link, $data['catid'] );
    $proid=mysqli_real_escape_string($this->db->link, $data['proid'] );
    $body =mysqli_real_escape_string($this->db->link, $data['body'] );
    $price =mysqli_real_escape_string($this->db->link, $data['price'] );
    $type =mysqli_real_escape_string($this->db->link, $data['type'] );

     $permited = array('jpg','png','jpeg','gif');
        
    $file_name = $file['image']['name'];
     $file_size = $file['image']['size'];
     $file_temp = $file['image']['tmp_name'];
     
     $div = explode('.', $file_name);
     $file_ext = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image = "unsplash-uploads/".$unique_image;

        
     if ($productname == "" || $catid == "" || $proid == "" || $body == "" || $price == "" || $type == "" ) {
     	$msg = "<span class='error'>Field Must Not be empty .</span> ";
    			return $msg;
     }else{
         
          move_uploaded_file($file['image']['tmp_name'], $uploaded_image);
        
         
          $query = "INSERT INTO 
          tbl_addpro(productname, catid, proid, body, price, image, type)
          VALUES
 ('$productname','$catid','$proid','$body','$price','$uploaded_image','$type')";  

          $inserted_row = $this->db->create($query);
          if ($inserted_row) {
    			 header("location: unsplash-addproduct.php");
    		}else {
    			$msg = "<span class='error'>Product Not Inserted .</span> ";
    			return $msg;
    		} 
     }
        
        
        
    }
    
    
public function addproductread(){
    $query = "SELECT tbl_addpro.*, tbl_cat.catname, tbl_pro.proname
    FROM tbl_addpro
    INNER JOIN tbl_cat
    ON tbl_addpro.catid = tbl_cat.catid
    INNER JOIN tbl_pro
    ON tbl_addpro.proid = tbl_pro.proid
    ORDER BY tbl_addpro.productid DESC";
    $read = $this->db->read($query);
    return $read;

}
    
 public function getprobyid($id){
     $query = "SELECT * FROM tbl_addpro WHERE productid = '$id' ";
     $result = $this->db->read($query);
     return $result;
     
 }   
    
    
public function addproductupdate($data, $file, $id){
    
    $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
    $catid = mysqli_real_escape_string($this->db->link, $data['catid']);
    $brand = mysqli_real_escape_string($this->db->link, $data['proid']);
    $body = mysqli_real_escape_string($this->db->link, $data['body']);
    $price = mysqli_real_escape_string($this->db->link, $data['price']);
    $type = mysqli_real_escape_string($this->db->link, $data['type']);
    
    $permited = array('jpg','png','jpeg','gif');
    $file_name = $file['image']['name'];
    $file_temp = $file['image']['tmp_name'];
    $file_size = $file['image']['size'];
    
    $split_name = explode('.', $file_name)  ;
    $end_name = strtolower(end($split_name));
    $unique = substr(md5(time()), 0, 10).$end_name;
    $uploaded = "unsplash-uploads/".$unique;
    
    if(empty($productname) || empty($catid) || empty($brand) || empty($body)|| empty($price) || empty($type)){
        $msg = "Field must not be empty";
        return $msg;
        
    }if($file_size > 1054589){
        
        echo '<span> image to large </span>';
        
    }else{
        
        move_uploaded_file($file_temp,$uploaded);
        
        $query = "UPDATE tbl_addpro 
        SET
        productname = '$productname',
        catid = '$catid',
        proid = '$brand',
        body = '$body',
        price = '$price',
        image = '$uploaded',
        type = '$type' 
        WHERE
        productid = '$id' ";
        
        $update_row = $this->db->update($query);
        if($update_row){
           header("location: unsplash-addproduct.php");
        }else{
            $msg = "<span> update not successfull </span>";
            return $msg;
        }
        
    }
    
    
    
}
    
    public function delproaddbyid($id){
    
    $query = "SELECT * FROM tbl_addpro WHERE productid = '$id' ";
    $getdata = $this->db->read($query);
    if($getdata){
        while($delimg = $getdata->fetch_assoc()){
            $delink = $delimg['image'];
            unlink($delink);
        }
    }
    
    $query = "DELETE FROM tbl_addpro WHERE productid = '$id' ";
    $deldata = $this->db->delete($query);
    if($deldata){
        header("location: unsplash-addproduct.php");
    }else{
        $msg = "product not deleted";
        return $msg;
    }
    
    
}

    public function getGenralProducts(){
        $query = "SELECT * FROM tbl_addpro WHERE type='1' ORDER BY productid DESC LIMIT 3";
         $result = $this->db->read($query);
         return $result;
     
        
    }
    
    public function getNewProduct(){
	 $query = "SELECT * FROM tbl_addpro ORDER BY productId DESC LIMIT 3 ";
         $result = $this->db->read($query);
         return $result;
         }
    
    public function getproducts(){
        $query = "SELECT * FROM tbl_addpro";
        $read = $this->db->read($query);
        return $read;
    }
    
    public function getSingleProduct($id){
        $query = "SELECT tbl_addpro.*, tbl_cat.catname, tbl_pro.proname
        FROM tbl_addpro
        INNER JOIN tbl_cat
        ON tbl_addpro.catid = tbl_cat.catid
        INNER JOIN tbl_pro
        ON tbl_addpro.proid = tbl_pro.proid
        AND tbl_addpro.productid = $id
        ORDER BY tbl_addpro.productid DESC";
        $read = $this->db->read($query);
        return $read;
        
    }
    
    
    
    
    
    
    
    
    
}


?>