
<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../unsplash-classes/unsplash-session.php'); 
session::Glogin(); 
include_once ($filepath.'/../unsplash-classes/unsplash-database.php'); 
include_once ($filepath.'/../unsplash-classes/unsplash-format.php'); 

?>


<?php


class Adminlogin{
    
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new database();
        $this->fm = new format();
    }
    
    public function adminlogin($adminuser,$adminpass){
        
        $adminuser = $this->fm->validation($adminuser);
        $adminpass = $this->fm->validation($adminpass);
        
        $adminuser = mysqli_real_escape_string($this->db->link, $adminuser);
        $adminpass = mysqli_real_escape_string($this->db->link, $adminpass);
        

        
        if(empty($adminuser) || empty($adminpass)){
            $msg = "Field Must Not Be Empty";
            return $msg;
        }else{
$query = "SELECT * FROM tbl_admin WHERE adminuser = '$adminuser' AND adminpass = '$adminpass'";
            
            $read = $this->db->read($query);
            if($read == true){
                $result = $read->fetch_assoc();
                session::set('login',true);
                session::set('id',$result['id']);
                session::set('name',$result['name']);
                session::set('adminuser',$result['adminuser']);
                header("Location: unsplash-dashboard.php");
            }else{
                $msg = "Password And Username Do Not Match";
                return $msg;
            }
        }
    }
}
?>