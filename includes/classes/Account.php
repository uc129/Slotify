<?php

class Account
{
    private $conn;
    private $errorArray;

    function __construct($conn)
    {
        $this->conn=$conn;
        $this->errorArray=array();
    }

    public function login($un,$pw){

        $pw=md5($pw);
        $query=mysqli_query($this->conn,"SELECT * FROM users WHERE username='$un' AND password='$pw' ");

        if(mysqli_num_rows($query)==1){
            return true;
        }else{
            array_push($this->errorArray,Constants::$loginFailed);
            return false;
        }

    }
    

    public function register($un,$fn,$ln,$em1,$em2,$pw1,$pw2){

        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmail($em1,$em2);
        $this->validatePassword($pw1,$pw2);

        if(empty($this->errorArray)){

            return $this->insertUserDetails($un,$fn,$ln,$em1,$pw1);

        }else{
            return false;
        }
        
    }

    private function insertUserDetails($un,$fn,$ln,$em,$pw){
        $encryptedPw=md5($pw);
        $profilePic="assets/images/profile-pics/default.jpg";
        $date=date("Y-m-d");

        $result=mysqli_query($this->conn,"INSERT INTO users VALUES('','$un','$fn','$ln','$em','$encryptedPw','$date','$profilePic')");

        return $result;

        
    }

    public function getError($error){

        if(!in_array($error, $this->errorArray)){
            $error="";
        }
        return ("<span class='errorMessage'>$error</span>");

    }

    private function validateUsername($un)
    {
        if (strlen($un)>25 || strlen($un)<5) {
           array_push($this->errorArray,Constants::$usernameLength);
           return;
        }

        $checkUserNameQuery=mysqli_query($this->conn,"SELECT username from users where username='$un'" );
        if(mysqli_num_rows($checkUserNameQuery)!=0){
            array_push($this->errorArray,Constants::$usernameTaken);
            return;
        }

    }

    private function validateFirstName($fn)
    {
        if (strlen($fn)>25 || strlen($fn)<2) {
            array_push($this->errorArray,Constants::$firstNameLength);
            return;
         }

    }

    private function validateLastName($ln)
    {
        if (strlen($ln)>25 || strlen($ln)<2) {
            array_push($this->errorArray,Constants::$lastNameLength);
            return;
         }

    }

    private function validateEmail($em1, $em2)
    {
        
        if(!filter_var($em1,FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray,Constants::$emailInvalid);
            return;
        }

        if ($em1!=$em2) {
            array_push($this->errorArray,Constants::$emailsDoNotMatch);
            return;
         }
       
        $checkEmailQuery=mysqli_query($this->conn,"SELECT email from users where email='$em1'" );
        if(mysqli_num_rows($checkEmailQuery)!=0){
            array_push($this->errorArray,Constants::$emailTaken);
            return;
        }
    }

    private function validatePassword($pw1, $pw2)
    {
        if ($pw1!=$pw2) {
            array_push($this->errorArray,Constants::$passwordsDoNotMatch);
            return;
         }

        if(strlen($pw1)<5 || strlen($pw1)>25){
            array_push($this->errorArray,Constants::$passwordLength );
            return;
        }
        
    }

}






?>