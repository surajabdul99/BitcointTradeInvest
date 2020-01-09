
<?php
require_once "includes/dbconfig.php";
include_once "includes/functions.php";

$result = '';
if(isset($_POST['Register'])){
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
            $password = md5($password);
            $insert = mysqli_query($con, "INSERT INTO tp_users( tp_user_unique_id,tp_username, tp_user_password, tp_user_momo_name, tp_user_momo_number, tp_user_contact_number,tp_secret_word,tp_user_email) 
                                                              VALUES ('$user_id','$username','$password','$mobile_name','$mobile_number','$contact_number','$security','$email')");
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
mysqli_close($con);


?>
