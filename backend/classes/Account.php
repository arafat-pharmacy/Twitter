<?php

class Account{
        private $pdo;
        private $errorArray=array();
        

        public function __construct(){
            $this->pdo=Database::instance();
        }
        public function register($fn,$ln,$un,$em,$pw,$pw2){
            $this->validateFirstName($fn);
            $this->validateLastName($ln);

        }
        private function validateFirstName($fn){
            if($this->length($fn,2,25)){
                array_push($this->errorArray,Constants::$firstNameCharacters);
                return;
            }
        }
        private function validateLastName($ln){
            if($this->length($ln,2,25)){
                array_push($this->errorArray,Constants::$lastNameCharacters);
                return;
            }
        }

        public function generateUsername($fn,$ln){
            if(!empty($fn) && !empty($ln)){
                if(!in_array(Constants::$firstNameCharacters,$this->errorArray) && !in_array(Constants::$lastNameCharacters,$this->errorArray)){
                    $username=strtolower($fn."".$ln);
                    if($this->checkUsernameExist($username)){
                            $screenRand=rand();
                            $userLink=''.$username.''.$screenRand;
                    }else{
                        $userLink=$username;
                    }
                    return $userLink;
                }
            }
        }



        private function checkUsernameExist($username){
            $stmt= $this->pdo->prepare("SELECT username FROM users WHERE username=:username");
            $stmt->bindParam(":username",$username,PDO::PARAM_STR);
            $stmt->execute();
            $count=$stmt->rowCount();
            if($count >0){
                return true;
            }else{
                return false;
            }
        }
        private function length($input,$min,$max){
            if(strlen($input) <$min){
                return true;
            }else if(strlen($input) > $max){
                return true;
            }
        }
        public function getError($error){
            if(in_array($error,$this->errorArray)){
                return "<span class='errorMessage'>$error</span>";
            }
        }
    }