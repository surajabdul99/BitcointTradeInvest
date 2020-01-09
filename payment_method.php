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
 <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
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




                      
                        <li style="background-color:#801a79;">
                            <a href="user_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>



                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            
            
                        
 <div class="content-wrapper" style="background:#4c9498;">
        <div class="container-fluid">
            
            
                    
                               <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                
                      <hr />
                     <br><br>
                       
              
              
                       
                       
                     <center> 
                             <center><h3>CHOOSE PAYMENT METHOD</h3></center>
                             <hr>
                              <a href="investment.php"><button style="width:300px;" class="btn btn-lg">MTN MOBILE MONEY</button></a> <br><br>
                               <a href="btc_investment.php"><button style="width:300px;" class="btn btn-lg" >BITCOIN</button></a>
                      </center>
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
