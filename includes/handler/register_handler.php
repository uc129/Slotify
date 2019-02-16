<?php

function sanitizeString($inputString)
{
    $inputString = strip_tags($inputString);
    $inputString = str_replace(" ", "", $inputString);
    return ($inputString);
}

function sanitizeName($inputString)
{
    $inputString = strip_tags($inputString);
    $inputString = str_replace(" ", "", $inputString);
    $inputString = ucfirst(strtolower($inputString));
    return ($inputString);
}

function sanitizePassword($inputString)
{
    $inputString = strip_tags($inputString);
    return ($inputString);
}


if (isset($_POST['register_button'])) {
    
    //receiving Data from Form
    $username = $_POST['username'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];

    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];

    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    //Sanitizing Data
    $username = sanitizeString($username);
    $email1 = sanitizeString($email1);
    $email2 = sanitizeString($email2);

    $f_name = sanitizeName($f_name);
    $l_name = sanitizeName($l_name);

    $password1 = sanitizePassword($password1);
    $password2 = sanitizePassword($password2);

   $wasSuccessful= $account->register($username,$f_name,$l_name,$email1,$email2,$password1,$password2);
   
   if($wasSuccessful){
       
        $_SESSION['userLoggedIn']=$username;
        header("Location:index.php");
   }

   
}

?>