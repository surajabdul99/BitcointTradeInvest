<?php
session_start();
require_once "includes/dbconfig.php";
include_once "includes/functions.php";

$session_username= $_SESSION['username'] ;
$session_user_id = $_SESSION['tp_user_unique_id'];

//$session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];

//$check_activate = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username = '$session_name' ");
//$activate_user = mysqli_fetch_array($check_activate);
//$account_status = $activate_user['tp_activated'];



if(!isset($_SESSION['username'])){
  redirect_to("user_login.php");
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>WISE CHOICE INVESTMENT</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style-wallet.css" rel="stylesheet" />
    
     <link rel="shortcut icon" type="image/x-icon" href="images/wcifav.png">
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  
                    <strong> <?php  echo $_SESSION['momo_name']  ?></strong>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="my_wallet.php">

                    <img src="assets/img/wci-logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="images/pro.png" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $session_username; ?> </h4>
                                      

                                    </div>
                                </div>
                                <hr />
                               
                               
                                <hr />
                                <a href="user_profile.php" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="user_logout.php" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="my_wallet.php">Dashboard</a></li>
                            <li><a href="user_profile.php">User Profile</a></li>
                           
                            <li><a href="user_logout.php">Logout</a></li>


                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
       <!-- MENU SECTION END-->
     
    <div style="background:#fff;" class="content-wrapper">
        <div class="container">
             
                    <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                  <marquee> <center><h3>WELCOME <?php  echo $session_momo_name ;?> KINDLY FOLLOW THE STEPS CAREFULLY TO SUBMIT YOUR INVESTMENT</h3></center></marquee>
                      <hr />
                     
                       
                                                   
                                                <?php
        include "submit_paid.php";
                       
if(isset($_POST['submit-momo']) && !empty($_POST['packages']) && !empty($_POST['amount-cedis']) ){
               
            $amount_cedis=checkValues($_POST['amount-cedis']);
            $package = checkValues($_POST['packages']);
            $amount_coin=checkValues($_POST['amount-coin']);
               //echo $amount_cedis;
     //echo    $package;
    if( $amount_cedis > 5000 || $amount_cedis < 100  ){
         echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Order cannot be processed! Out of Range</div>';
    }
    else{
      if($package == 'startup'){
        if($amount_cedis >= 100 && $amount_cedis <= 400 ){                    
           // echo 'yes';
           
                                     
$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username ='{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $mobile_money_name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $username = $profile['tp_username'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
   
    
   
               
            
                   
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$mobile_money_name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_username}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount_cedis,tp_amount_coin, tp_username,tp_mobile_money_name, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_package)
                            VALUES(' $tp_user_unique_id','$amount_cedis','$amount_coin','$username','$mobile_money_name','$mobile_number','$contact',1,'$package')");
                            if($insert){
                              
                                echo '<div class="alert alert-success alert-dismissible"><span class=""></span> An Order of '.$amount_cedis.' cedis received! click on the button below to make payments</div>';
                               
                                echo '<center><form method="post" action=""><button type="submit" name="submit-paid" class="btn btn-success">PROCEED TO MAKE PAYMENT</button>
                                      <input type="hidden" value='.$amount_cedis.' name="amount">
                                </form><center>';

                            }
                          
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Order to go through Thank You</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous Order</div>';
        }
        
        
    }
    else{
        echo "check error";
    }
    
            
      }else{echo 'user not found';}//end of num of user if 
            
            
            
            
        } //end of startup amount
          else{echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Order cannot be processed! Out of Startup Range</div>';}
      }// end of startup
    
      elseif($package == 'premium') {
          
          if($amount_cedis >= 500 && $amount_cedis <= 1500 ){                    
           // echo 'yes';
              
              
              
              
                                                   
$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username ='{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $mobile_money_name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $username = $profile['tp_username'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
   
    
   
               
            
                   
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$mobile_money_name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_username}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount_cedis,tp_amount_coin, tp_username,tp_mobile_money_name, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_package)
                            VALUES(' $tp_user_unique_id','$amount_cedis','$amount_coin','$username','$mobile_money_name','$mobile_number','$contact',1,'$package')");
                            if($insert){
                              
                                echo '<div class="alert alert-success alert-dismissible"><span class=""></span> An Order of '.$amount_cedis.' cedis received! click on the button below to make payments</div>';
                               
                                echo '<center><form method="post" action=""><button type="submit" name="submit-paid" class="btn btn-success">PROCEED TO MAKE PAYMENT</button>
                                      <input type="hidden" value='.$amount_cedis.' name="amount">
                                </form><center>';

                            }
                          
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Order to go through Thank You</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous Order</div>';
        }
        
        
    }
    else{
        echo "check error";
    }
    
            
      }else{echo 'user not found';}//end of num of user if 
              
              
            
            
        } //end of premium amount
          else{echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Order cannot be processed! Out of Premium Range</div>';}
          
      }//end of premium
        
        
     elseif($package == 'client') {
          
          if($amount_cedis >= 1600 && $amount_cedis <= 5000 ){                    
          
              
              //echo 'yes';
            
              
              
                                                   
$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username ='{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $mobile_money_name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $username = $profile['tp_username'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
   
    
   
               
            
                   
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$mobile_money_name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_username}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount_cedis,tp_amount_coin, tp_username,tp_mobile_money_name, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_package)
                            VALUES(' $tp_user_unique_id','$amount_cedis','$amount_coin','$username','$mobile_money_name','$mobile_number','$contact',1,'$package')");
                            if($insert){
                              
                                echo '<div class="alert alert-success alert-dismissible"><span class=""></span> An Order of '.$amount_cedis.' cedis received! click on the button below to make payments</div>';
                               
                                echo '<center><form method="post" action=""><button type="submit" name="submit-paid" class="btn btn-success">PROCEED TO MAKE PAYMENT</button>
                                      <input type="hidden" value='.$amount_cedis.' name="amount">
                                </form><center>';

                            }
                          
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Order to go through Thank You</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous Order</div>';
        }
        
        
    }
    else{
        echo "check error";
    }
    
            
      }else{echo 'user not found';}//end of num of user if 
              
              
              
            
        } //end of client amount
          else{echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Order cannot be processed! Out of Client Range</div>';}
          
      }//end ofclient premium    
        
        
    }//end of amount range 1500 t0 100 else
}//end of isset
       ?>
              
                       
                       
                     <center>  <form method="post" action="#">
                             <center><h3>CHOOSE INVESTMENT PACKAGE</h3></center>
                           <select  style="background:#d9edf;" class="form-control form-control-lg" name = "packages">
                             <option value="startup">Startup Package - GHC100 - GHC400 </option>
                             <option value="premium">Premium Package - GHC500 - GHC1500 </option>
                             <option value="client" disabled>Client Package - GHC1600 - GHC5000 </option>
                          </select>
                           
                             <center><h3>ENTER INVESTMENT AMOUNT IN GHANA CEDI</h3></center>
                         
                               
                               
                                <input style="background:#d9edf;" type="text" class="form-control" value=" 0" name = "amount-cedis" required/>
                                
                                <input type="hidden" class="form-control" value="0" name="amount-coin" />
                                <br>
     
                                
                                <button type="submit" name="submit-momo" class="btn btn-success">Submit</button>
                       </form></center>
                   </div>
               </div>
               
               
               
        </div>
    </div>
              

    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2018 WISE CHOICE INVESTMENT
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
</body>

</html>
