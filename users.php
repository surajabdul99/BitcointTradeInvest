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
        <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">

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
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                                <strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                                <strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                                <strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-footer">
                                <a href="#">Read All New Messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo $_SESSION['admin_username']  ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Edit Profile</a>
                            </li>
                            <li class="divider"></li>
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
                                <!-- /.row -->

                               

                                <hr/>


                               
                               
                                 <!-- START REGISTERED DOCTORS -->
                        <div class="row">
                            <div class="col-lg-12">


                                <h1 class="page-header">
                                   REGISTERED USERS
                                </h1>
                                <div class="table-responsive">

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
                                                
                                                
                                <!-- Start php Script to fetch registered doctor's data from database -->
                        <?php
                    
                                       $registered_users_query1 = mysqli_query($con,'SELECT * FROM tp_users  ');
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
                                                    <td><?php echo  $user_id?></td>
                                                    <td><?php echo $user_name ?></td>
                                                    <td> <?php echo $user_momo_name ?></td>
                                                    <td><?php echo $user_momo_number ?></td>
                                                    <td><?php echo $user_contact  ?></td>

                                                    <td><?php echo $user_joined_date ?></td>
                                                   
                                                   
                                                </tr>

                               <?php   } ?>
                                               
                                            </tbody>
                                        </table>

                                  

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.row -->
                <!-- END REGISTERED DOCTORS -->
                               

                                
                 

                        
                        
                        
                        

                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /#page-wrapper -->








                </div>


        


            <div class="footer">

                <p>&copy; Copyright 2018 WISE CHOICE INVESTMENT</p>

            </div>
       
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
