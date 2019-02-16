<?php

if(isset($_POST['login_button'])){

    $username=$_POST['login_username'];
    $password=$_POST['login_password'];

   $result= $account->login($username,$password);

   if($result){
       $_SESSION['userLoggedIn']=$username;
       header("Location:index.php");
   }

}

?>