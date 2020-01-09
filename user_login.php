

<?php
require_once "includes/dbconfig.php";
include_once "includes/functions.php";
session_start();
$result = '';
if (isset($_POST['login'])) {
	//obtain user input and sanitize
	
	$username = checkValues($_POST['username']);
	$password = checkValues($_POST['password']);
	$password = md5($password);

  $db_username = '1';
	//Query exe
	$user_login_query = "SELECT * FROM tp_users WHERE tp_username='{$username}'";
	$select_user_login_query = mysqli_query($con,$user_login_query);
	if(!$select_user_login_query){
		die("QUERY FAIED:".mysqli_error($con));
	}
  else{
           
            while ($row=mysqli_fetch_array($select_user_login_query)){
			$db_user_id=$row['tp_user_unique_id'];
			$db_username=$row['tp_username'];
			$db_user_password=$row['tp_user_password'];
            $db_user_momo_name = $row['tp_user_momo_name'];
           // $account_status = $row['tp_activated'];
		}
		
    
		if($username === $db_username   && $password === $db_user_password ){
            $_SESSION['tp_user_unique_id'] = $db_user_id;
            $_SESSION['username']= $db_username;
            $_SESSION['momo_name'] = $db_user_momo_name ;
            //$_SESSION['username']= $db_username;
  
                
                
            
         
            echo "<script>window.location='user_dashboard.php';</script>";
           }
            else{
                $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Username and Password do not match</div>';
                //"<script>window.location='user_login.php';</script>";
            }

           
		
		//else {
            
        //    $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Username and Password do not match</div>';
            
		}

}  // end of isset
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
s1.src='https://embed.tawk.to/5b5b349ae21878736ba260af/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
        
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
<body style="background: url(../images/bg.jpg) repeat-y center center fixed;">


<div id="signup" class="container center-block" align="center" style="margin-top: 70px;     ackground-color: #3c763d;">
        <!-- register -->
   
     
   
    
      



 <form class="form-signin" style="background-color: #3c763d;" method="post" id="log-form">

       
       <h2 class="form-signin-heading">USER LOGIN</h2><hr />

       
       
                
       <div id="login-error">
           <?php echo $result; ?>
       </div>
        
        
   
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control" placeholder="User name" name="username" id="username" required/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
            </div>
        </div>

        <hr />

     
     
     
        <div class="form-group">
             <button type="submit" class="btn btn-default product-button" name="login" id="btn-submit-login">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp;LOGIN
            </button>
            
           <!--ul class="actions">
            <li  style= "color:red;"><input type="submit"  name = "login" value="Login" class="special"></li>
            <!-- <li><input type="reset" value="Reset" /></li> 
        </ul-->
        </div>
        
           <a href ="submit_new_password.php" >FORGOT PASSWORD?</a> <br>   
		   <a href ="signup.php" >DO NOT HAVE ACCOUNT CLICK TO SIGNUP</a>



    </form>


            
                                                    

                  
</div>



</body>
</html>





