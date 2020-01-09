<?php

//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

//$session_name= $_SESSION['username'] ;
//$session_user_id = $_SESSION['tp_user_unique_id'];

if(isset($_POST['sell_coin_btc']) && !empty($_POST['seller'])){
    $seller_ref_no = checkValues( $_POST['seller']);
    //echo $seller_ref_no ;
    
    //check credited db
    
    $check_transaction_query=mysqli_query($con,"SELECT * FROM tp_credited WHERE tp_credited_id = ' $seller_ref_no' ");
    if($check_transaction_query){
        $total=mysqli_num_rows($check_transaction_query);
        if( $total == 1){
            
             $seller_profile_row = mysqli_fetch_array($check_transaction_query);
             $seller_unique_id =  $seller_profile_row['tp_user_unique_id'];
             $seller_username =  $seller_profile_row['tp_username'];
             $seller_momo_number =  $seller_profile_row['tp_user_mobile_number'];
             $seller_momo_name =  $seller_profile_row['tp_mobile_money_name'];
             $seller_amount_cedis =  $seller_profile_row['tp_amount_cedis'];
             $seller_amount_coin =  $seller_profile_row['tp_amount_coin'];
             $seller_contact =  $seller_profile_row['tp_user_contact'];
             $payment_method =  $seller_profile_row['tp_payment_method'];
           
            
            $total_seller_received_amount_cedis =(0.9* $seller_amount_cedis)+$seller_amount_cedis;
            $total_seller_received_amount_coin =(0.45* $seller_amount_coin)+$seller_amount_coin;
            $amount_to_receive = $total_seller_received_amount_cedis/2;
            
            
                    
             if($seller_amount_cedis == 100 || $seller_amount_cedis< 100 &&   $seller_amount_cedis > 25 || $seller_amount_cedis ==25 ){
                 $received_amount = 0.35* $seller_amount_cedis + $seller_amount_cedis ;
             }elseif($seller_amount_cedis == 1000 || $seller_amount_cedis< 1000 &&   $seller_amount_cedis > 120 || $seller_amount_cedis ==120 ){
                  $received_amount = 0.42* $seller_amount_cedis + $seller_amount_cedis;
             }elseif($seller_amount_cedis == 2000 || $seller_amount_cedis< 2000 &&   $seller_amount_cedis > 1100 || $seller_amount_cedis ==1100 ){
                  $received_amount = 0.42* $seller_amount_cedis + $seller_amount_cedis;
             }else{$received_amount = 0;}
                                           
            
            //echo $seller_ref_no;
            //check past sold coins
            $check_past_sold_query=mysqli_query($con,"SELECT * FROM tp_matured WHERE tp_ref_no ='$seller_ref_no' ");
            $num_past_sold = mysqli_num_rows($check_past_sold_query);
            if($num_past_sold > 0){
                echo '<div class="alert alert-danger">Withdrawal Request Already submitted</div>   ';
            }else{
            //move to matured
            $move_to_matured=mysqli_query($con,"INSERT INTO tp_matured(tp_matured_user_unique_id,tp_matured_username,tp_matured_momo_name,tp_matured_momo_number,tp_matured_amount_cedis,tp_matured_amount_coin,tp_matured_user_contact,tp_ref_no,tp_received_amount,tp_payment_method)VALUES('$seller_unique_id','$seller_username',' $seller_momo_name','$seller_momo_number',' $seller_amount_cedis',' $total_seller_received_amount_coin ','$seller_contact','$seller_ref_no','$received_amount','$payment_method') ");
                
            if($move_to_matured) {
                 echo '<div class="alert alert-success">Withdrawal Request Successfully received,Payment will be made within 0-48hrs .thank you<br> <br>
                 Amount to Receive: $ '. $received_amount.'
                 <hr>
                 <form method="post" action="">
                   <input type="text" class="form-control" placeholder="Paste/Enter Bitcoin wallet address" value="" name="wallet-address" required/>
                    <input type ="hidden" value="'.$seller_ref_no.'" name="ref-number">
                    <br>
                  <button type = "submit"  name= "submit-address" class="btn btn-lg style="background-color: #f19d0c;
    color: #fcf8e3;">Submit wallet Addrress</button>
                 </form>
                 </div>   ';
            }  else{
                 echo '<div class="alert alert-danger">Unsuccessful, Please try again later .Thank you </div>   ';
            } 
            
        }        
                
        } else { echo 'error';}
    } else { echo 'QUERY FAILED';}
}
?>