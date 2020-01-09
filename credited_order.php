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

        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
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
                                                    
                                                    
                    
                                       $credited_query = mysqli_query($con,'SELECT * FROM tp_credited ORDER BY tp_credited_id ASC');
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

                                          

                                        </div>

                                    </div>
                                </div>
                                    
                                     <!-- END CREDITED ROW -->

                                 <!-- START MATURED ROW -->
                                 
                                 
                                 
                                 <!-- END MATURED ROW -->
                 

                        
                        
                        
                        

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
