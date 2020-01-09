

<?php
require_once "includes/dbconfig.php";
include_once "includes/functions.php";



$result = '';
if(isset($_POST['submit'])){
$mobile_name = checkValues($_POST['mobile_money_name']);
$mobile_number = checkValues($_POST['mobile_money_number']);
$contact_number = checkValues($_POST['contact_number']);
$username = checkValues($_POST['username']);
$password = checkValues($_POST['password']);
$con_password = checkValues($_POST['confirm_password']);
$security = checkValues($_POST['secret']) ; 
$email = checkValues($_POST['email']);  
$user_id=uniqid(rand(2332,30000));
$user_id=(int)$user_id;
$referral_id =uniqid(rand(1000,3000));
$referral_id = (int)$referral_id;    
$referral_id = 'bti'.$referral_id; 
   
//$user_id = checkValues($_POST['user_id']);
//$user_id = (int)$user_id;

if($password != $con_password){
    $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Username and Password do not match</div>';
            
}
else{
    $check_name = mysqli_query($con, "SELECT * FROM tp_users WHERE tp_username = '$username'");
    $total_users = mysqli_num_rows($check_name);

    if($total_users > 0){
        $result = '<div class="alert alert-danger"> Username already exist,Kindly choose a different name </div>';
            
    }
    else{
        $check_number = mysqli_query($con, "SELECT * FROM tp_users WHERE tp_user_momo_number = '$mobile_number'");
        $total_number = mysqli_num_rows($check_number);
        if($total_number > 0){
            
            $result = '<div class="alert alert-danger"> Mobile money number already exist </div>';
        }
        else{
            
        $check_security_word = mysqli_query($con, "SELECT * FROM tp_users WHERE tp_secret_word = '$security'");
        $total_secret = mysqli_num_rows( $check_security_word);
          if(  $total_secret > 0) {
               $result = '<div class="alert alert-danger"> Security word has already been taken,use another word </div>';
          } 
        else{
            $password = md5($password);
            $insert = mysqli_query($con, "INSERT INTO tp_users( tp_user_unique_id,tp_username, tp_user_password, tp_user_momo_name, tp_user_momo_number, tp_user_contact_number,tp_secret_word,tp_user_email,tp_referral_id) 
                                                              VALUES ('$user_id','$username','$password','$mobile_name','$mobile_number','$contact_number','$security','$email','$referral_id')");
            if($insert){
                
               
                
               
                 $result = '<div class="alert alert-success">successful Registration <br> <a href = "user_login.php">Click to Login</button></a> </div>';
            
            }
            else{
                 $result = '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Registration failed Please try again</div>';
            
            }
        }
        }
    }
}
}
mysqli_close($con);


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
    <title>BITCOIN TRADE INVEST || JOIN US AND LETS TRADE IN CRYPTO</title>
   <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
    <link rel="stylesheet" href="css/bootstrap.css" media="all" type="text/css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.css" media="all" type="text/css">
    <link rel="stylesheet" href="css/style.css" media="all" type="text/css">
    
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
    <link rel="stylesheet" href="css/mystyle.css" media="all" type="text/css">
</head>
<body>


<div id="signup" class="container center-block" align="center" style="margin-top: 70px; ">
        <!-- register -->
   
    
     
 <form class="form-signin" style="background-color: #3c763d;" method="post" id="log-form">

       
        <h2 class="form-signin-heading">REGISTER</h2>
     <hr />
   
   
         <div id="login-error">
           <?php echo $result; ?>
       </div>
        <br>
        
        <div class="">
            <label for="name">Username</label>
             <input type="text" class="form-control" placeholder="User name" name="username" id="user_name" required/>
        </div>

        <br>
        <div class="">
            <label for="email">Email</label>
            <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email"/>
        </div>
           <br>

        <div class="">
            <label for="phone">Phone number</label>
            <input type="text" class="form-control" placeholder="contact number" name="contact_number" id="contact_number" required/>
        </div>
       <br>
            
        <div class="field half first">
            <label for="password">Password</label>
             <input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
        </div>
    

        <div class="field half">
            <label for="email">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="password" required/>
        </div>
       <br>

        <div class="">
            <label for="security">Security Word</label>
             <input type="text" class="form-control" placeholder="Enter secret word for password reset " name="secret" id="password" required/>
        </div>
        <br>

        <div class="">
            <label for="name">Mobile money name</label>
             <input type="text" class="form-control" placeholder="mobile money name" name="mobile_money_name" id="mobile_money_name" required/>
        </div>
        
        <br>

        <div class="">
            <label for="name">Mobile money number</label>
            <input type="text" class="form-control" placeholder="mobile money number" name="mobile_money_number" id="mobile_money_number" required/>
        </div>

        
        
        <hr />

      <div class="form-group">
             <button type="submit" class="btn btn-default product-button" name="submit" id="btn-submit-register">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp;REGISTER
            </button>
          
        </div>
     
     
     <!--ul class="actions">
         
            <li><input type="submit"  name = "submit" value="Register" class="special"></li>
            <!-- <li><input type="reset" value="Reset" /></li>
        </ul-->
     
     
        <br>
       <a href ="user_login.php" >ALREADY HAVE ACCOUNT CLICK TO LOGIN</a>

         <!--button type="submit" class="btn btn-default product-button" name="submit" id="submit">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp;Submit
            </button-->



    </form>

          
                                                    

                  
</div>



</body>
</html>





