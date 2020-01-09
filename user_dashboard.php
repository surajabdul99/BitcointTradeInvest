<?php
session_start();
require_once "includes/dbconfig.php";
include_once "includes/functions.php";

$session_name= $_SESSION['username'] ;
$session_user_id = $_SESSION['tp_user_unique_id'];

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
s1.src='https://embed.tawk.to/5b5b349ae21878736ba260af/default';
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
         <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">

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
                            <a href="investment.php"><i class="fa fa-fw fa-desktop"></i> Invest</a>
                        </li>
                        <li style="background-color:#801a79;">
                            <a href="user_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>



                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            
            
                        
 <div class="content-wrapper" style="background:#a9444229;">
        <div class="container-fluid">
            
          
          
            
            
            <!--RECEIVE COIN QUERY-->
            <?php
                $total_cedis = 0;
                 $total_coin = 0;
                $receive_coin_query = mysqli_query($con,"SELECT * FROM tp_credited WHERE tp_user_unique_id = '$session_user_id' ");
                if($receive_coin_query ){
                     
                  while($receive_coin_row=mysqli_fetch_assoc($receive_coin_query)){
                      $received_coin = $receive_coin_row['tp_amount_coin'];
                      $received_cedis = $receive_coin_row['tp_amount_cedis'];
                      $received_time = $receive_coin_row['tp_credited_time'];
                      $total_received_coin[] = $received_coin;
                      $total_received_cedis[] = $received_cedis;
                      $total_cedis = array_sum($total_received_cedis);
                      $total_coin = array_sum($total_received_coin);
                      
        
                      
                  }  // end of while loop
                    
                   // $k = count($total_received_coin);
                    //echo $k;
                   // $count = 0;
                   // for($counter = 0;$counter < $k; $counter++){
                    
                   //     echo  $total_received_coin[$counter];
                        
                    //}
                    
                    
                } else{ echo '<div class="alert alert-danger">Query Failed</div>';}    //end of query if
              
            
            ?>
            
            
                    
                    
                    
                <?php
                   // Querying for investment Day.
             $day = ' ';
             $code = '';
                 $day_query = mysqli_query($con,"SELECT * FROM tp_merchant WHERE tp_activate = 1");
                 if($day_query){
                     $num_of_merchant = mysqli_num_rows($day_query);
                     if( $num_of_merchant == 1){
                         $day_row = mysqli_fetch_array( $day_query);
                         
                         $day =     $day_row['tp_merchant_name'];
                         $code = $day_row['tp_merchant_code'];
                         $success = 1;
                         
                     }elseif( $num_of_merchant == 0){ 
                        $success = 0;
                     }
                 }else {echo 'no query';}
                ?>    
                     
                       
                     <br> <br> <br>
                     
                     <div class="row">
                         <div class = "col-md-12 col-sm-12 col-xs-12">
                            <center><a href="payment_method.php" ><button class="btn-lg">CLICK TO INVEST</button></a></center>
                         </div>
                     </div>
                     
                     <br>
                      
                        <div class="row ">
               
               
                       <!-- INCLUDE first request --> 
                    <?php include "first_request.php" ; ?>
                     <!-- INCLUDE  first request --> 
                      
                       <!-- INCLUDE first request --> 
                    <?php include "first_request_btc.php" ; ?>
                     <!-- INCLUDE  first request --> 
                     
                      <!-- INCLUDE submit address --> 
                    <?php include "submit_address.php" ; ?>
                      <!-- INCLUDE submit address --> 
                     
                      <!-- INCLUDE second request --> 
                    <?php include "second_request.php" ; ?>
                     <!-- INCLUDE  second request --> 
                   
                      <!-- INCLUDE third request --> 
                    <?php include "third_request.php" ; ?>
                     <!-- INCLUDE third request --> 
                     
               
                  
               
               
               
              

            </div>

                      
                      
                      
                    <div class="row">
                  
                     <div class="col-md-12 col-sm-12 col-xs-12">
                     
                     
                     
                 
                     
                     
                     <hr />
                     <br>
                     
                     
                     
                     
                    <center><h3 style="color:#fff;">TRANSACTIONS</h3></center>
                    <div style="background-color: #4ac14c80;
    color: #000;" class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Ref. No.</th>
                                    <th>Amount Invested</th>
                                    <th>Amount to Receive</th>
                                  
                                    <th>Status</th>
                                    <th>Received On </th>
                                    <th>Matures On </th>
                                    <th>Maturity Status </th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                $total_cedis = '';
                 $total_coin = '';
                $receive_coin_query = mysqli_query($con,"SELECT * FROM tp_credited WHERE tp_user_unique_id = '$session_user_id' AND tp_paid = 0 ");
                if($receive_coin_query ){
                     
                  while($receive_coin_row=mysqli_fetch_assoc($receive_coin_query)){
                      $received_coin = $receive_coin_row['tp_amount_coin'];
                      $received_cedis = $receive_coin_row['tp_amount_cedis'];
                      $received_time = $receive_coin_row['tp_credited_time'];
                      $received_id =   $receive_coin_row['tp_credited_id'];
                      $payment_method =   $receive_coin_row['tp_payment_method'];
                      
                      $status = 'confirmed';
                      
                      date_default_timezone_get('Africa/Accra');
                      $matured_time = date('Y-m-d h:i:s A',strtotime($received_time)+3600*(24*7));
                      $current_time = time();
                    
                      $current_date = date('Y-m-d H:i:s A' , $current_time);
                      $day_1 = date('Y-m-d h:i:s A',strtotime($received_time)+3600*(24*1));
                      $day_2 = date('Y-m-d h:i:s A',strtotime($received_time)+3600*(24*2));
                      $day_3 = date('Y-m-d h:i:s A',strtotime($received_time)+3600*(24*3));
                      $day_4 = date('Y-m-d h:i:s A',strtotime($received_time)+3600*(24*4));
                      $day_5 = date('Y-m-d h:i:s A',strtotime($received_time)+3600*(24*5));
                      $day_6 = date('Y-m-d h:i:s A',strtotime($received_time)+3600*(24*6));
                      $day_7 = date('Y-m-d h:i:s A',strtotime($received_time)+3600*(24*7));
                            
                      //echo $payment_method ;
                      //echo $current_date;
                      // echo $day_2;
                      
               ?>
            
                                
                                <tr>
                                    <td><?php  echo  $received_id;  ?></td>
                                     <td><?php  echo  $received_cedis;  ?></td>
                                   
                                    <td>
                                        <label class="label label-info"><?php // echo   $received_cedis ;
                                         
                               
                                    if($payment_method === 'Mobile Money'){
                                           $amount_daily = 0;
                                               
                                         if($received_cedis == 400 || $received_cedis < 400 && $received_cedis > 100 || $received_cedis ==100 ){
                                             if($current_date < $day_1){
                                                  $amount_daily = $received_cedis;
                                                   echo $amount_daily ; 
                                             }
                                             elseif
                                             ($current_date >  $day_1 && $current_date <  $day_2 ){
                                               $amount_daily = 0.05*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_2 && $current_date <  $day_3){
                                                $amount_daily = 0.10*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_3 && $current_date <  $day_4){
                                                $amount_daily = 0.15*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_4 && $current_date <  $day_5){
                                                $amount_daily = 0.20*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_5 && $current_date <  $day_6){
                                                $amount_daily = 0.25*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_6 && $current_date <  $day_7){
                                                $amount_daily = 0.30*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_7 ){
                                                $amount_daily = 0.35*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }
                                             
                                          
                                             
                                           }elseif($received_cedis == 1500 || $received_cedis < 1500 && $received_cedis > 500 || $received_cedis == 500){
                                             
                                               if($current_date < $day_1){
                                                  $amount_daily = $received_cedis;
                                                   echo $amount_daily ; 
                                             }
                                             elseif($current_date >  $day_1 && $current_date <  $day_2 ){
                                               $amount_daily = 0.06*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_2 && $current_date <  $day_3){
                                                $amount_daily = 0.12*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_3 && $current_date <  $day_4){
                                                $amount_daily = 0.18*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_4 && $current_date <  $day_5){
                                                $amount_daily = 0.24*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_5 && $current_date <  $day_6){
                                                $amount_daily = 0.30*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_6 && $current_date <  $day_7){
                                                $amount_daily = 0.36*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_7  ){
                                                $amount_daily = 0.42*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }
                                             
                                        
                                         }elseif($received_cedis == 5000 || $received_cedis < 5000 && $received_cedis > 1600 || $received_cedis == 1600){
                                             
                                              if($current_date < $day_1){
                                                  $amount_daily = $received_cedis;
                                                   echo $amount_daily ; 
                                             }
                                             elseif($current_date >  $day_1 && $current_date <  $day_2 ){
                                               $amount_daily = 0.09*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_2 && $current_date <  $day_3){
                                                $amount_daily = 0.18*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_3 && $current_date <  $day_4){
                                                $amount_daily = 0.27*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_4 && $current_date <  $day_5){
                                                $amount_daily = 0.36*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_5 && $current_date <  $day_6){
                                                $amount_daily = 0.45*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_6 && $current_date <  $day_7){
                                                $amount_daily = 0.54*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_7  ){
                                                $amount_daily = 0.90*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }
                                             
                                           
                                         } 
                                      }   elseif( $payment_method ==='bitcoin') {
                                        
                                             
                                        
                                         $amount_daily = 0;
                                               
                                         if($received_cedis == 100 || $received_cedis < 100 && $received_cedis > 25 || $received_cedis ==25 ){
                                             if($current_date < $day_1){
                                                  $amount_daily = $received_cedis;
                                                   echo $amount_daily ; 
                                             }
                                             elseif
                                             ($current_date >  $day_1 && $current_date <  $day_2 ){
                                               $amount_daily = 0.05*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_2 && $current_date <  $day_3){
                                                $amount_daily = 0.10*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_3 && $current_date <  $day_4){
                                                $amount_daily = 0.15*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_4 && $current_date <  $day_5){
                                                $amount_daily = 0.20*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_5 && $current_date <  $day_6){
                                                $amount_daily = 0.25*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_6 && $current_date <  $day_7){
                                                $amount_daily = 0.30*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_7 ){
                                                $amount_daily = 0.35*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }
                                             
                                          
                                             
                                           }elseif($received_cedis == 1000 || $received_cedis < 1000 && $received_cedis > 120 || $received_cedis == 120){
                                             
                                               if($current_date < $day_1){
                                                  $amount_daily = $received_cedis;
                                                   echo $amount_daily ; 
                                             }
                                             elseif($current_date >  $day_1 && $current_date <  $day_2 ){
                                               $amount_daily = 0.06*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_2 && $current_date <  $day_3){
                                                $amount_daily = 0.12*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_3 && $current_date <  $day_4){
                                                $amount_daily = 0.18*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_4 && $current_date <  $day_5){
                                                $amount_daily = 0.24*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_5 && $current_date <  $day_6){
                                                $amount_daily = 0.30*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_6 && $current_date <  $day_7){
                                                $amount_daily = 0.36*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_7  ){
                                                $amount_daily = 0.42*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }
                                             
                                        
                                         }elseif($received_cedis == 2000 || $received_cedis < 2000 && $received_cedis > 1100 || $received_cedis == 1100){
                                             
                                              if($current_date < $day_1){
                                                  $amount_daily = $received_cedis;
                                                   echo $amount_daily ; 
                                             }
                                             elseif($current_date >  $day_1 && $current_date <  $day_2 ){
                                               $amount_daily = 0.09*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_2 && $current_date <  $day_3){
                                                $amount_daily = 0.18*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_3 && $current_date <  $day_4){
                                                $amount_daily = 0.27*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_4 && $current_date <  $day_5){
                                                $amount_daily = 0.36*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_5 && $current_date <  $day_6){
                                                $amount_daily = 0.45*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_6 && $current_date <  $day_7){
                                                $amount_daily = 0.54*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }elseif($current_date >  $day_7  ){
                                                $amount_daily = 0.90*$received_cedis + $received_cedis;
                                                echo $amount_daily ; 
                                             }
                                             
                                           
                                         } 
                                        
                                        
                                        
                                    }   // end of if bitcoin
                                          
                                            
                                            
                                            ?> </label>
                                    </td>
                                    
                                    <td>
                                        <label class="label label-success"> <?php  echo   $status;   ?> </label></td>
                                    <td><?php  echo  $received_time ;  ?> </td>
                                    
                                    <td><?php  echo   $matured_time ; echo '<br>'; ?> </td>
                                         
                                   <td><?php if( $current_date < $matured_time){
                                     if($payment_method === 'Mobile Money'){
                                    
                                             echo ' <label class="label label-info"> matured </label>'; echo '<br>';
                                             echo'<form method = "post" action=""> 
                                             <input type ="hidden" value="'.$received_id.'" name="seller">
                                             <button class="btn btn-success" type="submit" name=" sell_coin">REQUEST WITHDRAWAL</button></form> ';
                                                    
                                                }//end of momo money 
                                                elseif($payment_method === 'bitcoin'){
                                                    
                                                     echo ' <label class="label label-info"> matured </label>'; echo '<br>';
                                             echo'<form method = "post" action=""> 
                                             <input type ="hidden" value="'.$received_id.'" name="seller">
                                             <button class="btn btn-success" type="submit" name=" sell_coin_btc">REQUEST WITHDRAWAbb</button></form> ';
                                                }//end of bitcoin
                                                                                 } else{ echo 'not matured';} ?> </td>
                                </tr>
                                    
                                           
               <?php   }    // end of while loop
                    
                                    
                         } else{ echo '<div class="alert alert-danger">Query Failed</div>';}    //end of query if
                
            
                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            
            
            
            
            
           
            
             
        
            
            <!--QUERY-->
            
            <?php
               $total_invested = 0;
             $num_invest_in_system=0;
             
               $total_invested_amount_query = mysqli_query($con,"SELECT * FROM tp_credited WHERE tp_user_unique_id = '$session_user_id' AND tp_payment_method='Mobile Money' ");
                $num_invest_in_system = mysqli_num_rows($total_invested_amount_query);    
                 while($amount_invested_row = mysqli_fetch_assoc(  $total_invested_amount_query) ){
                              $amount_invested =$amount_invested_row ['tp_amount_cedis']; 
                              $total_amount_invested[] =   $amount_invested ;
                                  $total_invested = array_sum($total_amount_invested);
                              
                              }
     
     
      $total_invested_btc = 0;
             $num_invest_in_system_btc=0;
               $total_invested_amount_query_btc = mysqli_query($con,"SELECT * FROM tp_credited WHERE tp_user_unique_id = '$session_user_id' AND tp_payment_method='bitcoin' ");
                $num_invest_in_system_btc = mysqli_num_rows($total_invested_amount_query_btc);    
                 while($amount_invested_row_btc = mysqli_fetch_assoc(  $total_invested_amount_query_btc) ){
                              $amount_invested_btc =$amount_invested_row_btc ['tp_amount_cedis']; 
                              $total_amount_invested_btc[] =   $amount_invested_btc ;
                                  $total_invested_btc = array_sum($total_amount_invested_btc);
                              
                              }
     
                //first amount earned query
             $total_first = 0;
            $num_first_amount_earned=0;
            $first_amount_earned_query = mysqli_query($con,"SELECT * FROM tp_paid_orders WHERE 	tp_paid_order_unique_id = '$session_user_id' AND tp_payment_method = 'Mobile Money' ");
             $num_first_amount_earned  = mysqli_num_rows($first_amount_earned_query);
              while($first_earned_row = mysqli_fetch_assoc( $first_amount_earned_query) ){
                              $first_amount_earned =$first_earned_row  ['tp_amount_paid']; 
                              $total_first_amount_earned[] =   $first_amount_earned;
                                  $total_first = array_sum( $total_first_amount_earned);
                              
                              }
     
     
     
          //first amount earned query
             $total_first_btc = 0;
            $num_first_amount_earned_btc=0;
            $first_amount_earned_query_btc = mysqli_query($con,"SELECT * FROM tp_paid_orders WHERE 	tp_paid_order_unique_id = '$session_user_id' AND tp_payment_method = 'bitcoin'");
             $num_first_amount_earned_btc  = mysqli_num_rows($first_amount_earned_query_btc);
              while($first_earned_row_btc = mysqli_fetch_assoc( $first_amount_earned_query_btc) ){
                              $first_amount_earned_btc =$first_earned_row_btc  ['tp_amount_paid']; 
                              $total_first_amount_earned_btc[] =   $first_amount_earned_btc;
                                  $total_first_btc = array_sum( $total_first_amount_earned_btc);
                              
                              }
            
             //second amount earned query
            $total_second = 0;
             $num_second_amount_earned=0;
            $second_amount_earned_query = mysqli_query($con,"SELECT * FROM tp_second_paid_orders WHERE 	tp_s_paid_order_unique_id = '$session_user_id' ");
             $num_second_amount_earned  = mysqli_num_rows($second_amount_earned_query);
              while($second_earned_row = mysqli_fetch_assoc( $second_amount_earned_query) ){
                              $second_amount_earned =$second_earned_row  ['tp_s_amount_paid']; 
                              $total_second_amount_earned[] =   $second_amount_earned;
                                  $total_second = array_sum( $total_second_amount_earned);
                              
                              }
            
        
            //third amount earned query
             $total_third = 0;
                $num_third_amount_earned = 0;
            $third_amount_earned_query = mysqli_query($con,"SELECT * FROM tp_third_paid_orders WHERE tp_th_paid_order_unique_id = '$session_user_id' ");
             $num_third_amount_earned  = mysqli_num_rows($third_amount_earned_query);
              while($third_earned_row = mysqli_fetch_assoc( $third_amount_earned_query) ){
                              $third_amount_earned =$third_earned_row  ['tp_th_amount_paid']; 
                              $total_third_amount_earned[] =   $third_amount_earned;
                                  $total_third = array_sum( $total_third_amount_earned);
                              
                              }
            
           
             $total_earned  = 0;
            $total_earned = $total_first+$total_second+$total_third;
            ?>
            
            <br>
            

            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">

                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            </div>

                        </div>
                        <h4> TOTAL AMOUNT INVESTED </h4>
                        <hr />
                       
                        <h3>GHC <?php  echo $total_invested ; ?></h3>
                         <h3>$<?php  echo $total_invested_btc ; ?></h3>
                                         
                    </div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">

                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            </div>

                        </div>
                       <h4> TOTAL PROFIT EARNED </h4>
                        <hr />
                      
                        <h3> GHC <?php  echo $total_earned ; ?> </h3>
                         <h3> $ <?php  echo $total_first_btc ; ?> </h3>
                    </div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                     
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            </div>

                        </div>
                        <h4>TOTAL NUMBER OF INVESTMENT IN SYSTEM </h4>
                          <hr />
                         <h3> <?php echo $num_invest_in_system +  $num_invest_in_system_btc; ?></h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                      
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            </div>

                        </div>
                         <h4>TOTAL NUMBER OF EXPIRED INVESTMENT </h4>
                           <hr />
                         <h3><?php echo $num_third_amount_earned; ?></h3>
                    </div>
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
