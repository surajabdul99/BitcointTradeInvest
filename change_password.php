


<?php
require_once "includes/dbconfig.php";
include_once "includes/functions.php";
session_start();

if(!isset($_SESSION['admin_username'])){
    redirect_to("admin_login.php");
}

else{

$result = " ";
if(isset($_POST['submitnewpassword'])){
    
    $old_password=checkValues($_POST['oldpassword']);
    $new_password=checkValues($_POST['newpassword']);
    $confirm_new_password=checkValues($_POST['confirm-password']);
    
  if($new_password != $confirm_new_password){
    $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Passwords do not match</div>';
            
}  else {
      $old_pass  = md5($old_password);
    $query = mysqli_query($con,"SELECT * FROM pm_admin_tbl WHERE pm_admin_password = '$old_pass' ");
    $num_of_user = mysqli_num_rows($query );
    
    if($num_of_user == 1){
       $new_password = md5($new_password) ;
        
         
        $update_password=mysqli_query($con,"UPDATE pm_admin_tbl SET pm_admin_password = '$new_password' WHERE pm_admin_password = '$old_pass' ");
        if($update_password){
             $result = '<div class="alert alert-success"><span class=""></span> NEW PASSWORD SUBMITTED SUCCESSFULLY <br> <a href="admin_login.php">CLINK LINK TO LOGIN</a></div>';
        }
        else{
             $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Password change unsuccessful Please Try Again</div>';
        }
        
    }
      else{ 
            $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Old Password is wrong</div>';
      }
    
  }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BITCOIN TRADE INVEST</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
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
</head>
<body style="background:#8a6d3b;">


<div id="signup" class="container center-block" align="center" style="margin-top: 70px;     background-color: #3c763d;">
        <!-- register -->
   
    <h2 class="major">BITCOIN <span style="color:#FCD116;"><stong>TRADE INVEST</stong></span><span style="color:#92f224; padding-left:0;"><stong></stong></span><span style="color:#CE1126; "><stong></stong></span></h2>
    
     
   
    
      



 <form class="form-signin" method="post" id="log-form">

       
    

        <h2 class="form-signin-heading">SUBMIT NEW PASSWORD</h2><hr />

       
       
                
       <div id="login-error">
           <?php echo $result; ?>
       </div>
        
        
   
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control" placeholder=" Old Password" name="oldpassword" id="oldpassword" required/>
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
        
            
		  
    </form>

                       
                                                    

                  
</div>



</body>
</html>


<?php } ?>


