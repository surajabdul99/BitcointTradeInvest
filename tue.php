

<?php
session_start();
require_once "includes/dbconfig.php";
include_once "includes/functions.php";

                                 
    if(isset($_POST['set-tuesday']) && !empty($_POST['tuesday'])){
    
    $tue = $_POST['tuesday'];
     
      echo $tue;
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
            echo 'activated';
        }else{echo 'no';}
        
    }else{echo 'error';}
    }
    
  echo $num_tue;
}

              

?>