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

        <!-- Custom CSS -->

        <link href="css/sb-admin.css" rel="stylesheet">

        <link href="css/mystyle.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <a class="navbar-brand" href="index.html">ADMIN DASHBOARD</a>
                </div>
                <!-- Top Menu Items -->
              
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul id="suraj-left-nav" class="nav navbar-nav side-nav">
                        <li>
                            <a href="admin_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="users.php"><i class="fa fa-fw fa-phone"></i> View Users</a>
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

                            $registered_users_query = mysqli_query($con,'SELECT * FROM tp_users');
                            $num_of_registered_users=mysqli_num_rows($registered_users_query);
                            
                            
                           
                            
                              
    ?>
                                
                                <hr/>


                               
                          <!-- START CREDITED ROW -->
                                    
                         <div class="row">
                         <div class="col-lg-12">

    
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
                                                    
                                                    
                    
                                       $second_matured_query = mysqli_query($con,'SELECT * FROM tp_paid_orders ');
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

                                      
                                        </div>

                                    </div>
                                </div> 
                                 
                                 <!-- END SECOND MATURED ROW -->

                        
                        
                        
                        

                        </div>
                        <!-- /.container-fluid -->
                        
                        
                        
                    </div>
                    <!-- /#page-wrapper -->








                </div>


        


            <div class="footer">

                <p>&copy; Copyright 2018 WISE CHOICE INVESTMENT </p>

            </div>
       
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
