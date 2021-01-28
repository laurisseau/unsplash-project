<?php include_once('../unsplash-classes/unsplash-database.php'); ?> 
<?php include_once('../unsplash-classes/unsplash-format.php'); ?> 

<?php

class product{
    
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new database();
        $this->fm = new Format();
    }
    
    public function createpro($proname){
        
        $proname = $this->fm->validation($proname);
        $proname = mysqli_real_escape_string($this->db->link, $proname);
        
        if(empty($proname)){
            $msg = "field must not be empty";
            return $msg;
        }else{
            $query = "INSERT INTO tbl_pro(proname) VALUES ('$proname') ";
            
            $create = $this->db->create($query);
            
            if($create){
                return header("location: unsplash-products.php");
            }else{
                $msg = "insert fail";
            }
        }
    }
    
    public function readpro(){
        $query = "SELECT * FROM tbl_pro ";
        $read = $this->db->read($query);
        
        if($read){
            return $read;
        }
    }
    
    public function updatepro($proname, $id){
        if(empty($proname)){
            $msg = "field must not be empty";
            return $msg;
        }else{
            $query = "UPDATE tbl_pro 
            SET
            proname = '$proname'
            WHERE proid = '$id' ";
            
            $update = $this->db->update($query);
            
            if($update){
                header("location: unsplash-products.php");
            }else{
                $msg = "update failed";
                return $msg;
            }
        }
    }
    
    public function getprobyid($id){
        $query = "SELECT proname FROM tbl_pro WHERE proid = '$id' ";
        $read = $this->db->read($query);
        return $read;
    }


    public function deletepro($id){
        $query = "DELETE FROM tbl_pro WHERE proid = '$id' ";
        $delete = $this->db->delete($query);
        return $delete;
    }
    
}

?>