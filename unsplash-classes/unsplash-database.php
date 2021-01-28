<?php


class database{
    
    public $link;
    public $error;
    
    public function __construct(){
        $this->data();
    }
    
    private function data(){
        $this->link = new mysqli("localhost", "root", "", "ecom");
        if(!$this->link){
            $this->error = "connection went wrong".$this->link->error.connect_error;
        }else{
            return false;
        }
    }
    
    public function read($query){
        $read= $this->link->query($query) or die($this->link->error.__LINE__);
        if($read->num_rows > 0){
            return $read;
        }else{
            return false;
        }
    }
    
    public function create($query){
        $create = $this->link->query($query);
        
        if($create){
            return $create;
            exit();
        }else{
            return false;
        }
    }
    
        public function update($query){
        $update = $this->link->query($query);
        
        if($update){
            return $update;
            exit();
        }else{
            return false;
        }
    }
       
        public function delete($query){
        $delete = $this->link->query($query);
        
        if($delete){
            return $delete;
            exit();
        }else{
            return false;
        }
    }
       
}



?>