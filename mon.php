

<?php
session_start();
require_once "includes/dbconfig.php";
include_once "includes/functions.php";

if(isset($_POST['set-monday']) && !empty($_POST['monday'])){
    
    $monday = $_POST['monday'];
     
      echo $monday;
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
            echo 'activated';
        }else{echo 'no';}
        
    }else{echo 'error';}
    }
    
    echo  $num_mon;
}


?>