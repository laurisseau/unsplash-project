<?php 

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../unsplash-classes/unsplash-database.php'); 
include_once ($filepath.'/../unsplash-classes/unsplash-format.php'); 

?>

<?php

class User{
    
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new database();
        $this->fm = new Format();
    }
    
    public function customerRestration($data){

$username= mysqli_real_escape_string($this->db->link, $data['username']);
    $name = mysqli_real_escape_string($this->db->link, $data['fullname']); 
    $email = mysqli_real_escape_string($this->db->link, $data['email']);
    $pass = mysqli_real_escape_string($this->db->link, $data['pass']);    
        
        if (empty($username) || empty($name)  || empty($email) || empty($pass)){
            $msg = '<span> Feild Must Not Be Empty </span>';
            return $msg;
        }
        
    $mailquery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1 ";
    $mailchk = $this->db->read($mailquery);
        
    if($mailchk != False){
        $msg = '<span> Email Already Exist</span>';
        return $msg;
        
    }else{
        
        $query = "INSERT INTO tbl_customer(username, name, email, pass)
        VALUES('$username', '$name', '$email', '$pass')";
        
        $create = $this->db->create($query);
        
          if ($create) {
    			$msg = "<span class='success'>customer data Inserted Successfully.</span> ";
    			return $msg;
    		}else {
    			$msg = "<span class='error'>customer data Not Inserted .</span> ";
    			return $msg;
    		}  
        }
        
    }
    
    
    public function customerLogin($data){
             
$username = mysqli_real_escape_string($this->db->link, $data['username']);
    $pass  = mysqli_real_escape_string($this->db->link, $data['pass']); 
        
        if (empty($username) || empty($pass)){
            $msg = '<span> Feild Must Not Be Empty </span>';
            return $msg;
        }
        
        $query = "SELECT * FROM tbl_customer WHERE username = '$username' AND pass = '$pass' ";
        
        $result = $this->db->read($query);
        if($result != false){
            $value = $result->fetch_assoc();
            session::set('cuslogin', true);
            session::set('cmrid', $value['id']);
            session::set('cmrname', $value['name']);
            header('location:unsplash-cart.php');
            
        }else{
            $msg = "<span> Username or password incorrect </span>";
            return $msg;
        }
        
    }
    
    public function getcusdata($id){
        
    $query = "SELECT * FROM tbl_customer WHERE id ='$id' ";
       $result = $this->db->read($query);
       return $result;
    }
    
    public function customerUpdate($data, $cmrid){
        
$username= mysqli_real_escape_string($this->db->link, $data['username']);
$name = mysqli_real_escape_string($this->db->link, $data['name']); 
    $email = mysqli_real_escape_string($this->db->link, $data['email']);  
        
        if(empty($username) || empty($name)  || empty($email)){
            $msg = '<span> Feild Must Not Be Empty </span>';
            return $msg;
        }else{
        
        $query = "UPDATE tbl_customer
                SET 
                username ='$username',
                name = '$name',
                email = '$email'
                WHERE  id ='$cmrid' ";
        
        $result = $this->db->update($query);
        
        if($result){
            $msg = "<span class='success'>Category Updated Successfully.</span> ";
            return $msg;
        }else{
           $msg = "<span class='success'>Category Not Updated Successfully.</span> ";
            return $msg;
    		}  
        }
        
        
    }
    
}

?>