


<?php
require_once "includes/dbconfig.php";
include_once "includes/functions.php";
session_start();

$result = " ";
if(isset($_POST['submitnewpassword'])){
    
    $security_word=checkValues($_POST['secret']);
    $new_password=checkValues($_POST['newpassword']);
    $confirm_new_password=checkValues($_POST['confirm-password']);
    
  if($new_password != $confirm_new_password){
    $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Passwords do not match</div>';
            
}  else {
    $query = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_secret_word = '$security_word' ");
    $num_of_user = mysqli_num_rows($query );
    
    if($num_of_user == 1){
       $new_password = md5($new_password) ;
        
         
        $update_password=mysqli_query($con,"UPDATE tp_users SET tp_user_password = '$new_password' WHERE tp_secret_word = '$security_word' ");
        if($update_password){
             $result = '<div class="alert alert-success"><span class=""></span> NEW PASSWORD SUBMITTED SUCCESSFULLY <br> <a href="user_login.php">CLINK LINK TO LOGIN</a></div>';
        }
        else{
             $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Password change unsuccessful Please Try Again</div>';
        }
        
    }
      else{ 
            $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Your Security Word is wrong</div>';
      }
    
  }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b31f130d0b5a54796822d0d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> BITCOIN TRADE INVEST</title>
    
    <link rel="stylesheet" href="css/bootstrap.css" media="all" type="text/css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.css" media="all" type="text/css">
    <link rel="stylesheet" href="css/style.css" media="all" type="text/css">
    <link rel="stylesheet" href="css/mystyle.css" media="all" type="text/css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
     <link rel="stylesheet" href="assets/css/wickedcss.min.css">
     <link rel="stylesheet" href="assets/css/fakeLoader.css">
      <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
</head>
<body>


<div id="signup" class="container center-block" align="center" style="margin-top: 70px; ">
        <!-- register -->
   
   
     
   
    
      



 <form class="form-signin" style="background-color: #3c763d;" method="post" id="log-form">

       
    

        <h2 class="form-signin-heading">SUBMIT NEW PASSWORD</h2><hr />

       
       
                
       <div id="login-error">
           <?php echo $result; ?>
       </div>
        
        
   
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control" placeholder="Secret Word" name="secret" id="username" required/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control" placeholder="New Password" name="newpassword" id="password" required/>
            </div>
        </div>
         <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm-password" id="password" required/>
            </div>
        </div>

        <hr />

        <div class="form-group">
            <button type="submit" class="btn btn-default product-button" name="submitnewpassword" id="btn-submit-login">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp;SUBMIT NEW PASSWORD
            </button>
        </div>
        
            
		   <a href ="user_login.php" >REMEMBER PASSWORD CLICK TO LOGIN</a>
    </form>

                       
                                                    

                  
</div>



</body>
</html>





