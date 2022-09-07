<html>
   

<body>
<?php
  include_once "backend/initialize.php";
  function formSanitizer($input){
    $input=trim(strip_tags($input));
    $input=htmlspecialchars($input);
    return $input;
  }
  if(is_post_request()){
   if(isset($_POST['firstName'])&& !empty($_POST['firstName'])){
     $fname=FormSanitizer::formSanitizerName($_POST['firstName']);
     $lname=FormSanitizer::formSanitizerName($_POST['lastName']);
     $email=FormSanitizer::formSanitizerString($_POST['email']);
     $pass=FormSanitizer::formSanitizerString($_POST['password']);
     $pass2=FormSanitizer::formSanitizerString($_POST['password2']);
     $username=$account->generateUsername($fname,$lname);
  
     echo  $username;
 
    $account->register($fname,$lname,$username,$email, $pass,$pass2);
   }
  }
  $pageTitle="SignUp | Twitter";
  ?>
<?php include 'backend/shared/header.php';?>
<section class="sign-container">
<?php include 'backend/shared/loginNav.php';?>
    <div class="form-container"> 
        <div class="form-content">
            <h2 class="header_form-content">
                Create your account
            </h2>
            <form  class="formField" action="<?php echo h($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="form-group">
                    <?php echo $account->getError(Constants::$firstNameCharacters);?>
                    <label for="firstName" >Firstname</label>
                    <input type="text" name ="firstName" id="firstName" autocomplete="off" required>
                </div>
                <div class="form-group">
                <?php echo $account->getError(Constants::$lastNameCharacters);?>
                    <label for="lastName" >Lastname</label>
                    <input type="text" name ="lastName" id="lastName" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email" >Email</label>
                    <input type="email" name ="email" id="email" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="password" >Password</label>
                    <input type="password" name ="password" id="password" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="password" > Confirm Password</label>
                    <input type="password" name ="password2" id="password2" autocomplete="off" required>
                </div>
                <div class="s-password">
                <input type="checkbox"class ="form-checkbox"  id="s-password" onclick="showPassword()">   
             <label for="s-password">Show Password</label>
                </div>
                <div class="form-btn-wrapper">
                   
            <button type="submit" class="btn-form">Signup</button>
            <input type="checkbox"class ="form-checkbox" name ="remember" id="check">   
             <label for="remember"> Remember me</label>
        </div>
            </form>
           
        </div>
        <footer class="form-footer">
                <p>Already have an account?
                <a href="login.php"> Login now</a></p>
            </footer>
    </div>
</section>
<script src="  frontend/assets/js/showPassword.js">

</script>
</body>
</html
