<?php

class session{
    
    public static function start(){
        session_start();
    }
    
    public static function destroy(){
        session_destroy();
        header("Location:unsplash-login.php");
    }
    
   public  static function set($key,$val){
        $_SESSION[$key] = $val;
    }
    
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    
   public static function Glogin(){
        self::start();
        if(self::get('login') == true){
            header("location:unsplash-dashboard.php");
        
        }
    }
    
    public static function Blogin(){
        self::start();
        if(self::get('login') == false){
        self::destroy();
        header("Location:unsplash-login.php");
    }
        
    }
}









?>