<?php
    include("includes/header.html");
    include("includes/db_config.php");
       if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn=$_SESSION['userLoggedIn'];
       }else{
           header("Location:register.php");
       }

?>
<script>
<?php include("assets/scripts/main.js") ?>
</script>

<style>
<?php include("assets/css/style.css") ?>
</style>



<div id="mainContainer">


    <div id="topContainer">

        <?php include("includes/navBarContainer.php")  ?>

        <div id="mainViewContainer">

            <div id="mainContent">