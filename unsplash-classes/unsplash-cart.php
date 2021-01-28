<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../unsplash-classes/unsplash-database.php'); 
include_once ($filepath.'/../unsplash-classes/unsplash-format.php'); 

?>

<?php

class Cart{
    
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new database();
        $this->fm = new Format();
    }
    
    public function addtocart($id){
        
        $productid = mysqli_real_escape_string($this->db->link, $id);
        $sid = session_id();
        
        $squery = "SELECT * FROM tbl_addpro WHERE productid = '$productid'";
        $result = $this->db->read($squery)->fetch_assoc();
        
        $productname = $result['productname'];
        $price = $result['price'];
        $image = $result['image'];
        
        $chkquery = "SELECT * FROM tbl_cart WHERE productid = '$productid' AND sid = '$sid' ";
        $getpro = $this->db->read($chkquery);
        
        if($getpro){
            
            $msg = 'product already added!';
            return $msg;
            
        }else{
            
         $query = "INSERT INTO 
          tbl_cart(sid, productid, productname, price, image)
          VALUES ('$sid','$productid','$productname','$price','$image')";  

          $inserted_row = $this->db->create($query);
          if ($inserted_row) {
    			 header("location:unsplash-cart.php");
    		}else {
    			$msg = "<span class='error'>Product Not Inserted .</span> ";
    			return $msg;
    		} 
    }
        
    }
    
    public function getcartproduct(){
        $sid = session_id();
        
    $query = "SELECT * FROM tbl_cart WHERE sid = '$sid' ";
     $result = $this->db->read($query);
     return $result;
    }
    
    public function checkCartTable(){
       $sid = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sid ='$sid' ";
       $result = $this->db->read($query);
       return $result;
   } 
    
    public function delproducbycart($delid){
    $delid = mysqli_real_escape_string($this->db->link, $delid);
    $query = "DELETE FROM tbl_cart WHERE  cartid = '$delid' ";
    $deldata = $this->db->delete($query);
    if($deldata){
         header("Location: unsplash-cart.php");
       
    }else{
        $msg = "cart not deleted";
        return $msg;
    }
    }
    
    public function delcuscart(){
        $sid = session_id();
        $query = "DELETE FROM tbl_cart WHERE sid ='$sid' ";
        $this->db->delete($query);
        
    }
    
    public function orderproduct($cmrid){
        
        $sid = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sid ='$sid' ";
        $getpro = $this->db->read($query);
       if($getpro){
           while($result = $getpro->fetch_assoc()){
               $productid = $result['productid'];
               $productname = $result['productname'];
               $price = $result['price'];
               $image = $result['image'];
               
        $query = "INSERT INTO 
          tbl_order(cmrid, productid, productname, price, image)
          VALUES ('$cmrid','$productid','$productname','$price','$image')";  

          $inserted_row = $this->db->create($query);
           }
       }
        
    }
    
    public function getorderedprod(){
        $query = "SELECT * FROM tbl_order ORDER BY date";
        $result = $this->db->read($query);
        return $result;
        
    }
    

    
}

?>