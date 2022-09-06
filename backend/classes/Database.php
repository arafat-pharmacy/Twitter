<?php
class Database{
    public $pdo;
    public static $instance;
    public function _construct(){
        $this->pdo=new PDO("mysql:host".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);

    }
    public static function instance(){
        if(self::$instance===null){
            self::$instance=new self;
        }
        return self::$instance;
    }

 public function _call($method, $args){
   
       return call_user_func_array(array($this->pdo,$method),$args);
   }

      
   }
   



?>
