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
//elseif(isset($_SESSION['username']) && $account_status === '0'){
  //  redirect_to("inactive.php");
//}


else{
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
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>USER DASHBOARD</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->

        <link href="css/sb-admin.css" rel="stylesheet">

        <link href="css/mystyle.css" rel="stylesheet" type="text/css">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
         <link href="assets/css/style-wallet.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        
        
    <![endif]-->


        <script type="text/javascript">
            <!--
            function getConfirmation() {
                var retVal = confirm("Do you want to continue ?");
                if (retVal == true) {
                    document.write("User wants to continue!");
                    return true;
                } else {
                    document.write("User does not want to continue!");
                    return false;
                }
            }
            //-->

        </script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div style="background-color: #a73b39;" class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="index.php">Bitcoin Trade Invest</a>
                </div>
                <!-- Top Menu Items -->
                <ul style="background-color: #c58b27;" class="nav navbar-right top-nav">


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo $_SESSION['username']  ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="user_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>


                            <li class="divider"></li>
                            <li>
                                <a href="user_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul id="suraj-left-nav" class="nav navbar-nav side-nav">
                        <li style="background-color: #a94442;">
                            <a href="user_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li style="    background-color: #3c763d;">


                            <a href="user_profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>



                        </li>




                        <li>
                            <a href="package.php"><i class="fa fa-fw fa-desktop"></i> Packages</a>
                        </li>
                        <li style="background-color:#801a79;">
                            <a href="user_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>



                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

           <br> <br>
            
            
                        
 <div class="content-wrapper" style="background:#d9edf7;">
        <div class="container-fluid">
            
           
              
              
               
                               <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                
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
            

            <div class="footer">

                <p>&copy; Copyright 2018 BITCOIN TRADE INVEST</p>

            </div>
        </div>
        <!-- /#wrapper -->

        <!-- jquery
		============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/jquery.confirm.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
    <?php  }  ?>
