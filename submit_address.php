<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";



//$session_username= $_SESSION['username'] ;
//$session_user_id = $_SESSION['tp_user_unique_id'];

//$session_username = $_SESSION['username'];
//$session_momo_name = $_SESSION['momo_name'];
//$check_activate = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username = '$session_name' ");
//$activate_user = mysqli_fetch_array($check_activate);
//$account_status = $activate_user['tp_activated'];



                       

           
                if(isset($_POST['submit-address']) && !empty($_POST['wallet-address']) )  {
                    
                    
                    
                    
                    $wallet_address = checkValues($_POST['wallet-address']);
                    $ref_number =   checkValues($_POST['ref-number']);
                    $submit_address_query = mysqli_query($con,"UPDATE tp_matured SET tp_wallet_address = '$wallet_address' WHERE tp_ref_no = '$ref_number'");
                    if( $submit_address_query ){
                        echo '<div class= "alert alert-success">BITCOIN WALLET ADDRESS SUBMITTED SUCCESFULLY.YOUR BTC WILL BE SENT BETWEEN 0 - 48 HOURS THANK YOU</div>';
                    }
                    else{
                        echo "unsucessful";
                    }
                }
     
                      
                      
                       