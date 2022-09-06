<html>
    <body>

<?php
include_once "backend/initialize.php";
  $pageTitle="Login on Twitter| Twitter";
  ?>
<?php include 'backend/shared/header.php';?>
<section class="sign-container">
<?php include 'backend/shared/loginNav.php';?>
   
    <div class="form-container"> 
        <div class="form-content">
            <h2 class="header_form-content">
                Login To Twitter
            </h2>
            <form  class="formField" action="<?php echo h($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="form-group">
                    <label for="username" >Username or Email</label>
                    <input type="text" name ="username" id="username" autocomplete="off" required>
                </div>
               
                
                <div class="form-group">
                    <label for="password" >Password</label>
                    <input type="password" name ="password" id="password" autocomplete="off" required>
                </div>
                <div class="s-password">
                <input type="checkbox"class ="form-checkbox"  id="s-password" onclick="showloginPassword()">   
             <label for="s-password">Show Password</label>
                </div>
                
                <div class="form-btn-wrapper">
                   
            <button type="submit" class="btn-form">Log In</button>
            <input type="checkbox"class ="form-checkbox" name ="remember" id="check">   
             <label for="remember"> Remember me</label>
        </div>
            </form>
           
        </div>
        <footer class="form-footer">
                <p>New to Twitter?
                <a href="signUp.php">Sign Up to Twitter</a></p>
            </footer>
    </div>
</section>
<script src="frontend/assets/js/showPassword.js">
</script>
</body>
</html>
   