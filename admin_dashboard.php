<?php
session_start();
require_once "includes/dbconfig.php";
include_once "includes/functions.php";
if(!isset($_SESSION['admin_username'])){
    redirect_to("admin_login.php");
}


?>





    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ADMIN DASHBOARD</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
        <!-- Custom CSS -->

        <link href="css/sb-admin.css" rel="stylesheet">

        <link href="css/mystyle.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <script src="js/bootstrap.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="admin_dashboard.php">ADMIN DASHBOARD</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">




                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo $_SESSION['admin_username']  ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            
                            <li>
                                <a href="admin_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul id="suraj-left-nav" class="nav navbar-nav side-nav">
                        <li>
                            <a href="admin_dashboard.php"><i class="fa fa-fw fa-home"></i> Homepage</a>
                        </li>
                       
                        <li>
                            <a href="users.php"><i class="fa fa-fw fa-user"></i> Registered Users</a>
                        </li>
                       
                        <li>
                            <a href="change_password.php"><i class="fa fa-fw fa-key"></i>Change Password</a>
                        </li>
                       
                        
                       
                        

                        <li>
                            <a href="admin_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>









                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <marquee> Welcome
                                    <?php  echo $_SESSION['admin_username']  ?> </marquee>

                            </h1>
                            <?php
                            $num_of_registered_users = 0;
                            $registered_users_query = mysqli_query($con,'SELECT * FROM tp_users');
                            $num_of_registered_users=mysqli_num_rows($registered_users_query);
                            
                            
                             $num_of_uncredited =0;
                           $uncredited_query = mysqli_query($con,'SELECT * FROM tp_pledges WHERE tp_matched = 0 AND tp_paid = 1');
                            $num_of_uncredited = mysqli_num_rows( $uncredited_query);
                            
                              $num_of_credited =0;
                           $credited_query = mysqli_query($con,'SELECT * FROM tp_pledges WHERE tp_matched = 1 AND tp_paid = 1');
                            $num_of_credited = mysqli_num_rows( $credited_query);
                           
                             $num_first_matured = 0;
                           $matured_query = mysqli_query($con,'SELECT * FROM tp_matured WHERE tp_matured_paid =0');
                             $num_first_matured = mysqli_num_rows($matured_query);
                            
                             $num_of_second_matured=0;
                          $second_matured_query = mysqli_query($con,'SELECT * FROM tp_second_matured WHERE tp_s_matured_paid =0');
                             $num_of_second_matured = mysqli_num_rows( $second_matured_query );
                           
                              $num_of_third_matured =0;
                          $third_matured_query = mysqli_query($con,'SELECT * FROM tp_third_matured WHERE tp_th_matured_paid=0');
                             $num_of_third_matured  = mysqli_num_rows( $third_matured_query);
                          
                            // total amount invested momo
                          $total_amount_invested_query = mysqli_query($con,"SELECT * FROM tp_credited WHERE tp_payment_method ='Mobile Money' ");
                             $total_invested=0;
                            $num_of_amount_invested = mysqli_num_rows($total_amount_invested_query);
                              while($amount_invested_row = mysqli_fetch_assoc( $total_amount_invested_query) ){
                              $amount_invested =$amount_invested_row ['tp_amount_cedis']; 
                              $total_amount_invested[] =   $amount_invested ;
                                  $total_invested = array_sum($total_amount_invested);
                              
                              }
                            
                            // total amount invested bitcoin
                            $total_amount_invested_query_btc = mysqli_query($con,"SELECT * FROM tp_credited WHERE tp_payment_method = 'bitcoin' ");
                             $total_invested_btc=0;
                            $num_of_amount_invested_btc = mysqli_num_rows($total_amount_invested_query_btc);
                              while($amount_invested_row_btc = mysqli_fetch_assoc( $total_amount_invested_query_btc) ){
                              $amount_invested_btc =$amount_invested_row_btc ['tp_amount_cedis']; 
                              $total_amount_invested_btc[] =   $amount_invested_btc ;
                                  $total_invested_btc = array_sum($total_amount_invested_btc);
                              
                              }
                           
                         
                                //first amount earned query
             $total_first = 0;
            $first_amount_earned_query = mysqli_query($con,"SELECT * FROM tp_paid_orders WHERE tp_payment_method ='Mobile Money' ");
             $num_first_amount_earned  = mysqli_num_rows($first_amount_earned_query);
              while($first_earned_row = mysqli_fetch_assoc( $first_amount_earned_query) ){
                              $first_amount_earned =$first_earned_row  ['tp_amount_paid']; 
                              $total_first_amount_earned[] =   $first_amount_earned;
                                  $total_first = array_sum( $total_first_amount_earned);
                              
                              }
                            // with btc                           
                    $total_first_btc = 0;
            $first_amount_earned_query_btc = mysqli_query($con,"SELECT * FROM tp_paid_orders WHERE tp_payment_method ='bitcoin' ");
             $num_first_amount_earned_btc  = mysqli_num_rows($first_amount_earned_query_btc);
              while($first_earned_row_btc = mysqli_fetch_assoc( $first_amount_earned_query_btc )){
                              $first_amount_earned_btc =$first_earned_row_btc['tp_amount_paid']; 
                              $total_first_amount_earned_btc[] =   $first_amount_earned_btc;
                                  $total_first_btc = array_sum( $total_first_amount_earned_btc);
                              
                              }        
                            
                            
            
             //second amount earned query
            $total_second = 0;
            $second_amount_earned_query = mysqli_query($con,"SELECT * FROM tp_second_paid_orders  ");
             $num_second_amount_earned  = mysqli_num_rows($second_amount_earned_query);
              while($second_earned_row = mysqli_fetch_assoc( $second_amount_earned_query) ){
                              $second_amount_earned =$second_earned_row  ['tp_s_amount_paid']; 
                              $total_second_amount_earned[] =   $second_amount_earned;
                                  $total_second = array_sum( $total_second_amount_earned);
                              
                              }
            
        
            //third amount earned query
             $total_third = 0;
            $third_amount_earned_query = mysqli_query($con,"SELECT * FROM tp_third_paid_orders  ");
             $num_third_amount_earned  = mysqli_num_rows($third_amount_earned_query);
              while($third_earned_row = mysqli_fetch_assoc( $third_amount_earned_query) ){
                              $third_amount_earned =$third_earned_row  ['tp_th_amount_paid']; 
                              $total_third_amount_earned[] =   $third_amount_earned;
                                  $total_third = array_sum( $total_third_amount_earned);
                              
                              }
            
           
             $total_earned  = 0;
            $total_earned = $total_first+$total_second+$total_third;
                             
                            
                              
    ?>
                                <!-- /.row -->

                                <div class="row">
                                   
                                          <!-- start first pay order  -->
                                          <?php include "first_pay_order.php" ?>
                                            <!-- end first pay order  -->
                                            
                                             <!-- start second pay order  -->
                                          <?php include "second_pay_order.php" ?>
                                            <!-- end second pay order  -->
                                            
                                              <!-- start third pay order  -->
                                          <?php include "third_pay_order.php" ?>
                                            <!-- end third pay order  -->
                                            
                                            
                                        <!-- start send coin  -->
                                              <?php include "send_coin.php";  ?>
                                         <!--end send coin  -->  
                     
                          <!-------------------------------------------------------->  
                       
                              
                                   
                                        
                                   
                               <?php
                                   
                                  /*  if(isset($_POST['set-monday']) && !empty($_POST['monday'])){
    
    $monday = $_POST['monday'];
     
  
    $mon_query =mysqli_query($con,"SELECT * FROM tp_merchant WHERE tp_merchant_name = '$monday' ");
  
    if($mon_query){
    $num_mon = mysqli_num_rows( $mon_query);
    if( $num_mon == 1){
    $mon_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 1 WHERE tp_merchant_id = 1 ");
     $mon_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 2 ");
         $mon_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 3 ");
         $mon_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 4 ");
         $mon_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 5 ");
         $mon_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 6 ");
        
        if( $mon_activate){
             echo '<div class ="alert alert-success "> activated</div>';
        }else{echo 'no';}
        
    }else{echo 'error';}
    }
    

}

         
                                    
    //tuesday
                                    
                                     if(isset($_POST['set-tuesday']) && !empty($_POST['tuesday'])){
    
    $tue = $_POST['tuesday'];
     
   
    $tue_query =mysqli_query($con,"SELECT * FROM tp_merchant WHERE tp_merchant_name = '$tue' ");
  
    if($tue_query){
    $num_tue = mysqli_num_rows( $tue_query);
    if( $num_tue == 1){
    $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 1 ");
    $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 1 WHERE tp_merchant_id = 2 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 3 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 4 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 5 ");
        $tue_activate= mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 6 ");
        
        if($tue_activate){
             echo '<div class ="alert alert-success "> activated</div>';
        }else{echo 'no';}
        
    }else{echo 'error';}
    }
 
}
                     
                                    
                                    //thursday
                                       if(isset($_POST['set-thursday']) && !empty($_POST['thursday'])){
    
    $tue = $_POST['thursday'];
     
      echo $tue;
    $tue_query =mysqli_query($con,"SELECT * FROM tp_merchant WHERE tp_merchant_name = '$tue' ");
  
    if($tue_query){
    $num_tue = mysqli_num_rows( $tue_query);
    if( $num_tue == 1){
    $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 1 ");
    $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 2 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 3 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 1 WHERE tp_merchant_id = 4 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 5 ");
        $tue_activate= mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 6 ");
        
        if($tue_activate){
              echo '<div class ="alert alert-success "> activated</div>';
        }else{echo 'no';}
        
    }else{echo 'error';}
    }
    

}                
                  
                                    
                                    //saturday
                                    
                                    
     if(isset($_POST['set-saturday']) && !empty($_POST['saturday'])){
    
    $tue = $_POST['saturday'];
     
    
    $tue_query =mysqli_query($con,"SELECT * FROM tp_merchant WHERE tp_merchant_name = '$tue' ");
  
    if($tue_query){
    $num_tue = mysqli_num_rows( $tue_query);
    if( $num_tue == 1){
    $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 1 ");
    $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 2 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 3 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 4 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 5 ");
        $tue_activate= mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 1 WHERE tp_merchant_id = 6 ");
        
        if($tue_activate){
            echo '<div class ="alert alert-success "> activated</div>';
        }else{echo 'no';}
        
    }else{echo 'error';}
    }
    

}                
                                    
                                                         
                                    //deactivate
                                    
                                    
     if(isset($_POST['set-friday']) && !empty($_POST['friday'])){
    
    $tue = $_POST['friday'];
     
    
    $tue_query =mysqli_query($con,"SELECT * FROM tp_merchant WHERE tp_merchant_name = '$tue' ");
  
    if($tue_query){
    $num_tue = mysqli_num_rows( $tue_query);
    if( $num_tue == 1){
    $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 1 ");
    $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 2 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 3 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 4 ");
        $tue_activate = mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 5 ");
        $tue_activate= mysqli_query($con,"UPDATE tp_merchant SET tp_activate = 0 WHERE tp_merchant_id = 6 ");
        
        if($tue_activate){
            echo '<div class ="alert alert-success "> deactivated</div>';
        }else{echo 'no';}
        
    }else{echo 'error';}
    }
    

}                
                  
             */        ?>
                               
                                
                               
                           
                                    <!--div class="row">
                                        <div class = "col-md-12 col-sm-12 col-xs-12">
                                             
                                             <center> <h1 style="color:#fff;">SET INVESTMENT DAY</h1></center>
                                             <hr/> 
                                        </div>  
                                        <div class = "row"> 
                                             <div class = "col-md-2 col-sm-12 col-xs-12">
                                            <center>  <form method="post" action="">
                                                <input type="hidden" value="Monday" name = "monday">
                                                 <button type="submit" name="set-monday">MONDAY</button>
                                                </form></center>
                                            </div>       
                                                
                                                <div class = "col-md-2 col-sm-12 col-xs-12">
                                            <center>  <form method="post" action="">
                                                <input type="hidden" value="Tuesday" name = "tuesday">
                                                 <button type="submit" name="set-tuesday" >TUESDAY</button>
                                                </form></center>
                                            </div>       
                                                 
                                            <div class = "col-md-2 col-sm-12 col-xs-12">
                                            <center>  <form method="post" action="">
                                                <input type="hidden" value="Thursday" name = "thursday">
                                                 <button type="submit" name="set-thursday">THURSDAY</button>
                                                </form></center>
                                            </div> 
                                                  
                                            <div class = "col-md-2 col-sm-12 col-xs-12">
                                            <center>  <form method="post" action="">
                                                <input type="hidden" value="Saturday" name = "saturday">
                                                 <button type="submit" name="set-saturday">SATURDAY</button>
                                                </form></center>
                                            </div> 
                                            
                                                        <div class = "col-md-2 col-sm-12 col-xs-12">
                                            <center>  <form method="post" action="">
                                                <input type="hidden" value="Friday" name = "friday">
                                                 <button type="submit" name="set-friday">DEACTIVATE ALL</button>
                                                </form></center>
                                            </div>             
                                            
                                        </div>
                                    </div-->
                                    <hr />
                                    <br>
                                    
                                    
                                    <div class="col-lg-3 col-md-6">
                                       
                                        
                                         
                                         
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php echo $num_of_registered_users ?>
                                                        </div>
                                                        <div>REGISTERED USERS</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="users.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-pink">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php echo  $num_of_uncredited ?>
                                                        </div>
                                                        <div> UNPAID ORDERS/INVESTMENTS</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="users.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php echo   $num_of_credited ?>
                                                        </div>
                                                        <div>PAID ORDERS/INVESTMENTS</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="users.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php echo   $num_first_matured?>
                                                        </div>
                                                        <div>MATURED ORDERS</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="users.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                
                                
                                  <div class="row">
                                   
                                        
                          <!-------------------------------------------------------->  
                            
                                <hr />
                               
                           
                                    
                                    
                                    <div class="col-lg-2 col-md-6">
                                       
                                        
                                         
                                         
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                            <?php echo  $num_first_amount_earned; ?>
                                                        </div>
                                                        <div>Number of Beneficiaries</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="users.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">

                                                    <div class="col-xs-12 text-center">
                                                        <div class="huge">GHC 
                                                            <?php  echo   $total_invested ; ?>
                                                        </div>
                                                        <div> Invested So Far</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">
                                       <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">

                                                    <div class="col-xs-12 text-center">
                                                        <div class="huge">$
                                                            <?php echo  $total_invested_btc; ?>
                                                        </div>
                                                        <div> Invested so far</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">

                                                    <div class="col-xs-12 text-center">
                                                        <div class="huge">GHC
                                                            <?php  echo   $total_first ; ?>
                                                        </div>
                                                        <div> Paid Out So Far</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                     <div class="col-lg-2 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">

                                                    <div class="col-xs-12 text-center">
                                                        <div class="huge">$
                                                            <?php  echo  $total_first_btc ; ?>
                                                        </div>
                                                        <div> Paid Out So Far</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                     <div class="col-lg-2 col-md-6">
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">

                                                    <div class="col-xs-12 text-center">
                                                        <div class="huge">
                                                            <?php  echo  $num_third_amount_earned ; ?>
                                                        </div>
                                                        <div> Number of Expired Investment</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <!-- /.row -->
                                

                                <hr/>


                                <?php //include "make_match.php" ?>

                                <?php //include "make_second_match.php" ?>

                                <?php //include "make_rematch.php" ?>


                                <!-- START REGISTERED DOCTORS -->
                                <div class="row">
                                    <div class="col-lg-12">


                                        <h1 class="page-header">
                                            REGISTERED USERS
                                        </h1>
                                        <div id="user-list" class="table-responsive">

                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                    <tr class="table-head">
                                                        <th><i class="icon_profile"></i> Id</th>
                                                        <th><i class="icon_profile"></i> Username</th>
                                                        <th><i class="icon_profile"></i> Mobile Money Name</th>
                                                        <th><i class="icon_mail_alt"></i>Mobile Money Number</th>
                                                        <th><i class="icon_mobile"></i> Calling Contact</th>
                                                        <th><i class="icon_mobile"></i> Date Joined</th>
                                                      
                                                       
                                                    </tr>

                                                    <row>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <?php // include "activate.php";  ?>
                                                        </div>
                                                    </row>
                                                    <br><br>

                                                    <!-- Start php Script to fetch registered doctor's data from database -->
                                                    <?php
                                                    
                                                    
                    
                                       $registered_users_query1 = mysqli_query($con,'SELECT * FROM tp_users ORDER BY tp_user_id DESC LIMIT 5' );
                                          while ($row=mysqli_fetch_assoc( $registered_users_query1 )){
                                            $user_id = $row['tp_user_id'];
                                            $user_name = $row['tp_username'];
                                            $user_momo_name = $row['tp_user_momo_name'];
                                            $user_momo_number = $row['tp_user_momo_number'];
                                            $user_contact = $row['tp_user_contact_number'];
                                            $user_joined_date = $row['tp_date_joined'];
                                            $user_status = $row['tp_activated'];
                                          
                                        
                                            if($user_status == 1){
                                                $user_status = 'Active';
                                            }  elseif($user_status == 0){
                                                $user_status = 'Inactive';
                                            }
                                            
                        
                    ?>

                                                        <!--end php Script to fetch registered doctor's data from database -->

                                                        <tr>
                                                            <td>
                                                                <?php echo  $user_id?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user_name ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user_momo_name ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user_momo_number ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user_contact  ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $user_joined_date ?>
                                                            </td>
                                                           
                                                        </tr>

                                                        <?php   } ?>

                                                </tbody>
                                            </table>

                                            <a href="users.php"><button id="view_all"type="button" class="btn btn-primary">View All</button></a>

                                        </div>

                                    </div>
                                </div>


                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- END REGISTERED users -->

                    <br><br>


                             

                  <!-- START UNCREDITED ROW -->
                                <div class="row">
                                    <div class="col-lg-12">


                                        <h1 class="page-header">
                                           UNCREDITED ORDERS
                                        </h1>
                                        <div id="user-list" class="table-responsive">

                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                    <tr class="table-head">
                                                        <th><i class="icon_profile"></i> Id</th>
                                                        <th><i class="icon_profile"></i> Username</th>
                                                        <th><i class="icon_profile"></i> Mobile Money Name</th>
                                                        <th><i class="icon_mail_alt"></i>Mobile Money Number</th>
                                                        <th><i class="icon_mobile"></i> Amount In Cedis</th>
                                                         <th><i class="icon_mobile"></i> Date Joined</th>
                                                          <th><i class="icon_cogs"></i> Package</th>
                                                        <th><i class="icon_cogs"></i> Payment Code</th>
                                                       
                                                        <th><i class="icon_cogs"></i> Action</th>
                                                    </tr>

                                                    <row>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <?php // include "activate.php";  ?>
                                                        </div>
                                                    </row>
                                                    <br><br>

                                                    <!-- Start php Script to fetch registered doctor's data from database -->
                            <?php
                                                    
                                                    
                    
                                       $uncredited_query = mysqli_query($con,'SELECT * FROM tp_pledges WHERE tp_matched = 0 AND tp_paid = 1 ');
                                          while($uncredited_row=mysqli_fetch_assoc($uncredited_query )){
                                           
                                                  
                                                    $uncredited_user_unique_id = $uncredited_row['tp_user_unique_id'];
                                                    $uncredited_username = $uncredited_row['tp_username'];
                                                    $uncredited_user_momo_name = $uncredited_row['tp_mobile_money_name'];
                                                    $uncredited_user_momo_number = $uncredited_row['tp_user_mobile_number'];
                                                    $uncredited_user_amount_cedis = $uncredited_row['tp_amount_cedis'];
                                                    $uncredited_user_amount_coin = $uncredited_row['tp_amount_coin'];
                                                    $uncredited_user_date = $uncredited_row['tp_order_time'];
                                                    $uncredited_payment_code =  $uncredited_row['payment_code'];
                                                    $package = $uncredited_row['tp_package'];
                        
                        ?>

                                                          <!-- end php Script to fetch registered doctors data from database -->
                               
                                                        <tr>
                                                            <td>
                                                                <?php  echo $uncredited_user_unique_id ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $uncredited_username ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $uncredited_user_momo_name ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $uncredited_user_momo_number ?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $uncredited_user_amount_cedis  ?>
                                                            </td>

                                                            <td>
                                                                <?php echo  $uncredited_user_date ?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $package ?>
                                                            </td>
                                                            
                                                            <td>
                                                               
                                                                 <?php echo   $uncredited_payment_code  ?>
                                                            </td>
                                                            <td>

                                                                <form method="post" action="">
                                                                    <input type="hidden" name="payer" value="<?php echo $uncredited_user_unique_id; ?>">
                                                                    <button type="submit" class="btn btn-success" name="send-coin"> SEND       </button>
                                                                </form>




                                                                <!--form method="post" action="includes/delete.php">
                                                                    <input type="hidden" name="us" value="<?php //echo $user_id ; ?>">
                                                                    <button type="submit" class="btn btn-success" name="delete"> DELETE       </button>
                                                                </form-->

                                                            </td>
                                                        </tr>

                                                        <?php   } ?>

                                                </tbody>
                                            </table>

                                            <!--a href="users.php"><button id="view_all"type="button" class="btn btn-primary">View All</button></a-->

                                        </div>

                                    </div>
                                </div>
                                   <!--END UNCREDITED ROW -->
                                   
                                    <!-- START CREDITED ROW -->
                                    
                                            <div class="row">
                                    <div class="col-lg-12">


                                        <h1 class="page-header">
                                           CREDITED ORDERS
                                        </h1>
                                        <div id="user-list" class="table-responsive">

                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                    <tr class="table-head">
                                                        <th><i class="icon_profile"></i> Id</th>
                                                        <th><i class="icon_profile"></i> Username</th>
                                                        <th><i class="icon_profile"></i> Mobile Money Name</th>
                                                        <th><i class="icon_mail_alt"></i>Mobile Money Number</th>
                                                        <th><i class="icon_mobile"></i> Amount In Cedis</th>
                                                        
                                                       
                                                        <th><i class="icon_mobile"></i> Date Credited</th>
                                                        <th><i class="icon_mobile"></i> REF NO#</th>
                                                       
                                                    </tr>

                                                    <row>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <?php // include "activate.php";  ?>
                                                        </div>
                                                    </row>
                                                    <br><br>

                                                    <!-- Start php Script to fetch registered doctor's data from database -->
                            <?php
                                                    
                                                    
                    
                                       $credited_query = mysqli_query($con,'SELECT * FROM tp_credited ORDER BY tp_credited_id DESC LIMIT 5');
                                          while($credited_row=mysqli_fetch_assoc( $credited_query )){
                                           
                                                  
                                                    $credited_user_unique_id = $credited_row['tp_user_unique_id'];
                                                    $credited_username = $credited_row['tp_username'];
                                                    $credited_user_momo_name = $credited_row['tp_mobile_money_name'];
                                                    $credited_user_momo_number = $credited_row['tp_user_mobile_number'];
                                                    $credited_user_amount_cedis = $credited_row['tp_amount_cedis'];
                                                    $credited_user_amount_coin = $credited_row['tp_amount_coin'];
                                                    $credited_user_date = $credited_row['tp_credited_time'];
                                                    $credited_ref_no =  $credited_row['tp_credited_id'];
                                            
                        
                        ?>

                                                          <!-- end php Script to fetch registered doctors data from database -->
                               
                                                        <tr>
                                                            <td>
                                                                <?php  echo $credited_user_unique_id ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $credited_username ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $credited_user_momo_name ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $credited_user_momo_number ?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $credited_user_amount_cedis  ?>
                                                            </td>

                                                           
                                                            <td>
                                                               
                                                                 <?php echo $credited_user_date ?>
                                                            </td>
                                                             <td>
                                                               
                                                                 <?php echo $credited_ref_no; ?>
                                                            </td>
                                                           
                                                        </tr>

                                                        <?php   } ?>

                                                </tbody>
                                            </table>

                                            <a href="credited_order.php"><button id="view_all"type="button" class="btn btn-primary">View All</button></a>

                                        </div>

                                    </div>
                                </div>
                                    
                                     <!-- END CREDITED ROW -->
                                     
                                 <!-- START FIRST MATURED ROW -->
                                 
                                              <div class="row">
                                    <div class="col-lg-12">


                                        <h1 class="page-header">
                                         UNPAID MATURED  ORDERS
                                        </h1>
                                      
                                        
                                        <div id="user-list" class="table-responsive">

                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                    <tr class="table-head">
                                                        <th><i class="icon_profile"></i> Id</th>
                                                        <th><i class="icon_profile"></i> Username</th>
                                                        <th><i class="icon_profile"></i> Mobile Money Name</th>
                                                       <th><i class="icon_mail_alt"></i>Mobile Money Number</th>
                                                        <th><i class="icon_mobile"></i> Amount Invested</th>
                                                        <th><i class="icon_mobile"></i> Amount To Receive</th>
                                                         <th><i class="icon_mail_alt"></i>Wallet Address</th>
                                                        <th><i class="icon_mobile"></i> Date Matured</th>
                                                        <th><i class="icon_mobile"></i> REF NO#</th>
                                                        <th><i class="icon_mobile"></i> PAY</th>
                                                       
                                                        
                                                       
                                                    </tr>

                                                    <row>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <?php // include "activate.php";  ?>
                                                        </div>
                                                    </row>
                                                    <br><br>

                                                    <!-- Start php Script to fetch registered doctor's data from database -->
                            <?php
                                                    
                                                    
                    
                                       $matured_query = mysqli_query($con,'SELECT * FROM tp_matured WHERE tp_matured_paid =0 ');
                                          while($credited_row=mysqli_fetch_assoc($matured_query )){
                                           
                                                  
                                                    $matured_user_unique_id = $credited_row['tp_matured_user_unique_id'];
                                                    $matured_username = $credited_row['tp_matured_username'];
                                                    $matured_user_momo_name = $credited_row['tp_matured_momo_name'];
                                                    $matured_user_momo_number = $credited_row['tp_matured_momo_number'];
                                                    $matured_user_amount_cedis = $credited_row['tp_matured_amount_cedis'];
                                                    $matured_user_amount_coin = $credited_row['tp_matured_amount_coin'];
                                                    $matured_user_date = $credited_row['tp_matured_time'];
                                                    $matured_ref_no =  $credited_row['tp_ref_no'];
                                                    $matured_amount_to_receive =  $credited_row['tp_received_amount'];
                                                    $wallet_adrress  = $credited_row['tp_wallet_address'];
                        ?>

                                                          <!-- end php Script to fetch registered doctors data from database -->
                               
                                                        <tr>
                                                            <td>
                                                                <?php  echo $matured_user_unique_id ?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $matured_username ?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $matured_user_momo_name ?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $matured_user_momo_number?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $matured_user_amount_cedis?>
                                                            </td>
                                                            
                                                            <td>
                                                                <?php echo  $matured_amount_to_receive  ?>
                                                            </td>
                                                             <td>
                                                                <?php echo   $wallet_adrress ;  ?>
                                                            </td>
                                                            
                                                            <td>
                                                               
                                                                 <?php echo  $matured_user_date ?>
                                                            </td>
                                                             <td>
                                                               
                                                                 <?php echo  $matured_ref_no ; ?>
                                                            </td>
                                                             <td>

                                                                <form method="post" action="">
                                                                    <input type="hidden" name="order-ref" value="<?php echo $matured_ref_no; ?>">
                                                                    <button type="submit" class="btn btn-success" name="pay-order"> PAID       </button>
                                                                </form>




                                                               
                                                            </td>
                                                           
                                                        </tr>

                                                        <?php   } ?>

                                                </tbody>
                                            </table>

                                           

                                        </div>

                                    </div>
                                </div> 
                                 
                                 <!-- END MATURED ROW -->
                 
                         
                              <!-- START SECOND MATURED ROW -->
                                 
                                              <div class="row">
                                    <div class="col-lg-12">


                                        <h1 class="page-header">
                                          PAID MATURED ORDERS
                                        </h1>
                                        <div id="user-list" class="table-responsive">

                                            <table class="table table-striped table-advance table-hover">
                                                <tbody>
                                                    <tr class="table-head">
                                                        <th><i class="icon_profile"></i> Id</th>
                                                        <th><i class="icon_profile"></i> Username</th>
                                                        <th><i class="icon_profile"></i> Mobile Money Name</th>
                                                        <th><i class="icon_mail_alt"></i>Mobile Money Number</th>
                                                        <th><i class="icon_mobile"></i> Amount Invested</th>
                                                         <th><i class="icon_mobile"></i> Amount Received</th>
                                                       
                                                    
                                                        <th><i class="icon_mobile"></i> Date</th>
                                                        <th><i class="icon_mobile"></i> REF NO#</th>
                                                       
                                                       
                                                    </tr>

                                                    <row>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <?php // include "activate.php";  ?>
                                                        </div>
                                                    </row>
                                                    <br><br>

                                                    <!-- Start php Script to fetch registered doctor's data from database -->
                            <?php
                                                    
                                                    
                    
                                       $second_matured_query = mysqli_query($con,'SELECT * FROM tp_paid_orders ORDER BY tp_paid_order_id DESC LIMIT 5');
                                          while($second_credited_row=mysqli_fetch_assoc($second_matured_query )){
                                           
                                                  
                                                    $s_matured_user_unique_id = $second_credited_row['tp_paid_order_unique_id'];
                                                    $s_matured_username = $second_credited_row['tp_paid_order_username'];
                                                    $s_matured_user_momo_name = $second_credited_row['tp_paid_order_momo_name'];
                                                    $s_matured_user_momo_number = $second_credited_row['tp_paid_order_momo_number'];
                                                    $s_matured_user_amount_cedis = $second_credited_row['tp_paid_order_amount_cedis'];
                                                
                                                    $s_matured_user_date = $second_credited_row['tp_paid_order_time'];
                                                    $s_matured_ref_no = $second_credited_row['tp_paid_order_ref_no'];
                                                   $s_matured_amount_to_receive = $second_credited_row['tp_amount_paid'];
                        ?>

                                                          <!-- end php Script to fetch registered doctors data from database -->
                               
                                                        <tr>
                                                            <td>
                                                                <?php  echo   $s_matured_user_unique_id ?>
                                                            </td>
                                                            <td>
                                                                <?php echo   $s_matured_username ?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $s_matured_user_momo_name ?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $s_matured_user_momo_number?>
                                                            </td>
                                                            <td>
                                                                <?php echo   $s_matured_user_amount_cedis  ?>
                                                            </td>

                                                              <td>
                                                                <?php echo    $s_matured_amount_to_receive  ?>
                                                            </td>
                                                            <td>
                                                               
                                                                 <?php echo  $s_matured_user_date ?>
                                                            </td>
                                                             <td>
                                                               
                                                                 <?php echo  $s_matured_ref_no ; ?>
                                                            </td>
                                                            
                                                           
                                                        </tr>

                                                        <?php   } ?>

                                                </tbody>
                                            </table>

                                        <a href="paid.php"><button id="view_all"type="button" class="btn btn-primary">View All</button></a>
                                        </div>

                                    </div>
                                </div> 
                                 
                                 <!-- END SECOND MATURED ROW -->
                 
                         
                         
                         
                         
                         
                          <!-- START THIRD GAIN MATURED UNPAID ROW -->
                                 
                                             
                                 
                                 <!-- END THIRD MATURED ROW -->
                 
                          
                          
                          
                          
                        </div>
                          <!-- /.container-fluid -->
                    </div>
                     <!-- /#page-wrapper -->
                   
               

                    <br><br>          

                 
                 
                 

                </div>
               <!-- wrapper -->
          
           








        <!--/div-->





        <div class="footer">

            <p>&copy; Copyright 2018 BITCOIN TRADE INVEST</p>

        </div>

        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
