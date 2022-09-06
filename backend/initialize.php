<?php
ob_start();


date_default_timezone_set("Asia/Dhaka");

spl_autoload_register(function($class){
  require_once "classes/$class.php";  
    
});
define("DB_HOST" ,"localhost");
define("DB_NAME" ,"twirrer");
define("DB_USER" ,"twitter");
define("DB_PASS" ,"azhar&jewel");
//define("BASE_URL" ,"http://localhost/twitter/")
$public_end=strpos($_SERVER['SCRIPT_NAME'],'/frontend')+9;
$doc_root=substr($_SERVER['SCRIPT_NAME'],0,$public_end);
define("WWW_ROOT",$doc_root);



$account=new Account;
include 'functions.php';
?>
