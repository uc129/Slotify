<?php
include("includes/db_config.php");

include("includes/header.html");

include("includes/classes/Account.php");
$account= new Account($conn);

include("includes/classes/Constants.php");

include("includes/handler/register_handler.php");
include("includes/handler/login_handler.php");

?>

<script>
<?php include("assets/scripts/register.js") ?>
</script>



<?php
//to remember the input values if error occurs
    function getInputValue($field_name){
        if(isset($_POST[$field_name])){
            echo($_POST[$field_name]);
        }
    }
?>

<?php

if(isset($_POST['signup_button'])){

    echo(  "<script>  

    $(document).ready(function () {
        $('#sign-up-form').show();
        $('#sign-in-form').hide();
    });
    </script>"  );

}else{
    echo(  "<script>  
    $(document).ready(function () {
        $('#sign-in-form').show();
        $('#sign-up-form').hide();
    });
    </script>"  );

}


?>
<div class="row">



    <div class="" id="wrapper">

        <!-- Login Form -->
        <div class="sign-in-form" id="sign-in-form">

            <h1 class="lead text-light text-center m-4 form-header">Log In To Your Account</h1>
            <center> <img src="assets/images/logo.png" alt="" class="logo"></center>
            <div>
                <form action="register.php" method="POST">
                    <?php echo($account->getError(Constants::$loginFailed)); ?>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="login_username" placeholder="eg: colt_steele"
                            value="<?php getInputValue("login_username") ?>">>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="login_password" placeholder="Your password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="form-control" name="login_button" id="login_button">LOG IN</button>
                    </div>
                </form>
                <p class="sign-link-text text-center">Don't have an account yet? <span class="sign-link"
                        id="sign-up-link">Sign Up here
                    </span> </p>

            </div>



        </div>



        <!-- SignUp Form -->

        <div class="sign-up-form" id="sign-up-form">

            <h1 class="lead text-light text-center m-4 form-header">Create Your Free Account</h1>
            <center> <img src="assets/images/logo.png" alt="" class="logo"></center>


            <div>

                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="">Username</label>

                        <input type="text" class="form-control" name="username" placeholder="eg: colt_steele"
                            value="<?php getInputValue("username") ?>">
                        <p class="lead"> <?php echo($account->getError(Constants::$usernameLength)); ?> </p>
                        <p class="lead"> <?php echo($account->getError(Constants::$usernameTaken)); ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="">First Name</label>

                        <input type="text" class="form-control" name="f_name" placeholder="eg: Colt"
                            value="<?php getInputValue("f_name") ?>">
                        <p class="lead"><?php echo($account->getError(Constants::$firstNameLength)); ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="">Last Name</label>

                        <input type="text" class="form-control" name="l_name" placeholder="eg: Steele"
                            value="<?php getInputValue("l_name") ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>

                        <input type="email" class="form-control" name="email1" placeholder="eg: coltsteele@gmail.com"
                            value="<?php getInputValue("email1") ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Email</label>

                        <input type="email" class="form-control" name="email2" placeholder="Re-Enter Email"
                            value="<?php getInputValue("email2") ?>">

                        <?php echo($account->getError(Constants::$emailsDoNotMatch)); ?>
                        <?php echo($account->getError(Constants::$emailInvalid)); ?>
                        <?php echo($account->getError(Constants::$emailTaken)); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>

                        <input type="password" class="form-control" name="password1" placeholder="Your Password">
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>

                        <input type="password" class="form-control" name="password2" placeholder="Re-Enter Password">
                        <?php echo($account->getError(Constants::$passwordsDoNotMatch)); ?>
                        <?php echo($account->getError(Constants::$passwordLength)); ?>
                    </div>

                    <button name="register_button" class="form-control" id="signup_button">SIGN UP</button>
                </form>

                <p class="sign-link-text text-center">Already have an account?<span id="sign-in-link"
                        class="sign-link">Sign
                        In
                    </span> </p>

            </div>

        </div>

    </div>

    <div class="col-6" id="right-hand-side">

        <h1 class="display-3 text-success">Get Great Music,<br> Right Now</h1>
        <h1 class="lead">Listen to loads of songs for free</h1>
        <li>
            <ul> <i class="fas fa-check text-success"></i> Discover Music You'll Fall In Love With</ul>
            <ul> <i class="fas fa-check text-success"></i> Create Your Own Playlists</ul>
            <ul> <i class="fas fa-check text-success"></i> Follow Your Favourite Artists To Keep Up To Date</ul>
        </li>
    </div>

</div>