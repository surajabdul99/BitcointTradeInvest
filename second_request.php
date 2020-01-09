<?php

//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

//$session_name= $_SESSION['username'] ;
//$session_user_id = $_SESSION['tp_user_unique_id'];

if(isset($_POST['second_request']) && !empty($_POST['receiver'])){
    $seller_ref_no = checkValues( $_POST['receiver']);
    //echo $seller_ref_no ;
    
    //check credited db
    
    $check_transaction_query=mysqli_query($con,"SELECT * FROM tp_second_credited WHERE tp_order_ref_no = ' $seller_ref_no' ");
    if($check_transaction_query){
        $total=mysqli_num_rows($check_transaction_query);
        if( $total == 1){
            
             $seller_profile_row = mysqli_fetch_array($check_transaction_query);
             $seller_unique_id =  $seller_profile_row['tp_user_unique_id'];
             $seller_username =  $seller_profile_row['tp_username'];
             $seller_momo_number =  $seller_profile_row['tp_user_mobile_number'];
             $seller_momo_name =  $seller_profile_row['tp_mobile_money_name'];
             $seller_amount_cedis =  $seller_profile_row['tp_amount_cedis'];
             
             $seller_contact =  $seller_profile_row['tp_user_contact'];
            
                   
             if($seller_amount_cedis == 400 || $seller_amount_cedis< 400 &&   $seller_amount_cedis > 100 || $seller_amount_cedis ==100 ){
                 $received_amount = 0.6* $seller_amount_cedis ;
             }elseif($seller_amount_cedis == 1500 || $seller_amount_cedis< 1500 &&   $seller_amount_cedis > 500 || $seller_amount_cedis ==500 ){
                  $received_amount = 0.8* $seller_amount_cedis ;
             }elseif($seller_amount_cedis == 5000 || $seller_amount_cedis< 5000 &&   $seller_amount_cedis > 1600 || $seller_amount_cedis ==1600 ){
                  $received_amount = 1* $seller_amount_cedis ;
             }else{$received_amount = 0;}
                    
           
            
            
            $check_past_sold_query=mysqli_query($con,"SELECT * FROM tp_second_matured WHERE tp_ref_no ='$seller_ref_no' ");
            $num_past_sold = mysqli_num_rows($check_past_sold_query);
            if($num_past_sold > 0){
                echo '<div class="alert alert-danger">Withdrawal Request Already submitted</div>   ';
            }else{
            //move to matured
            $move_to_second_matured=mysqli_query($con,"INSERT INTO tp_second_matured(tp_s_matured_user_unique_id,tp_s_matured_username,tp_s_matured_momo_name,tp_s_matured_momo_number,tp_s_matured_amount_cedis,tp_s_matured_user_contact,tp_ref_no,tp_s_received_amount)VALUES('$seller_unique_id','$seller_username',' $seller_momo_name','$seller_momo_number','$seller_amount_cedis','$seller_contact','$seller_ref_no',' $received_amount ') ");
                
            if($move_to_second_matured) {
                 echo '<div class="alert alert-success">Withdrawal Request Successfully received,Payment will be made within 0-48hrs .thank you<br>
                 Amount to Receive: '.$received_amount.'</div>   ';
            }  else{
                 echo '<div class="alert alert-danger">Unsuccessful, Please try again later .Thank you </div>   ';
            } 
            
        }        
                
        } else { echo 'error';}
    } else { echo 'QUERY FAILED';}
}
?>