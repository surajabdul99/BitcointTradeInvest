<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

$session_admin_username = $_SESSION['admin_username'];


if(isset($_SESSION['admin_username'])){
    


  if(!empty($_POST['order-ref'])  && isset($_POST['pay-order'])   ){
      
      $order_ref_no = checkValues($_POST['order-ref']);
      $pay_order_query = mysqli_query($con,"SELECT * FROM tp_matured WHERE tp_ref_no = ' $order_ref_no' ");
      if( $pay_order_query){
          
          $total_order_paid = mysqli_num_rows( $pay_order_query);
          if(  $total_order_paid == 1){
              
              $paid_order_row = mysqli_fetch_array( $pay_order_query);
              $paid_order_unique_id =  $paid_order_row['tp_matured_user_unique_id'];
              $paid_order_amount_cedis =  $paid_order_row['tp_matured_amount_cedis'];
              $paid_order_amount_coin = $paid_order_row['tp_matured_amount_coin'];
              $paid_order_momo_name =  $paid_order_row['tp_matured_momo_name'];
              $paid_order_momo_number =  $paid_order_row['tp_matured_momo_number'];
              $paid_order_contact =  $paid_order_row['tp_matured_user_contact'];
              $paid_order_username =  $paid_order_row['tp_matured_username'];
              $paid_order_amount_to_receive =  $paid_order_row['tp_received_amount'];
              $amount_paid =  $paid_order_amount_to_receive;
              $payment_method =  $paid_order_row['tp_payment_method'];
              
              //check past payment
              
            $check_past_paid_order=mysqli_query($con,"SELECT * FROM tp_paid_orders WHERE tp_paid_order_ref_no ='$order_ref_no' ");
            
            $num_past_paid_orders = mysqli_num_rows($check_past_paid_order);
            if($num_past_paid_orders > 0){
                echo '<div class="alert alert-danger">Payment has already been made.Thank You.</div>   ';
            }
              else{
                    
              $move_to_paid_orders = mysqli_query($con,"INSERT INTO tp_paid_orders(tp_paid_order_unique_id, tp_paid_order_amount_cedis,tp_paid_order_amount_coin,tp_paid_order_username,tp_paid_order_momo_name,tp_paid_order_momo_number,tp_paid_order_contact,tp_paid_order_ref_no,tp_amount_paid,tp_payment_method) VALUES ('$paid_order_unique_id','  $paid_order_amount_cedis','$paid_order_amount_coin','$paid_order_username','  $paid_order_momo_name','  $paid_order_momo_number ',' $paid_order_contact','$order_ref_no','$amount_paid','$payment_method')");
              
              if(  $move_to_paid_orders ){
                  
                  $check_past_second_credited=mysqli_query($con,"SELECT * FROM tp_second_credited WHERE tp_order_ref_no ='$order_ref_no' ");
            
                  $num_of_second_credited = mysqli_num_rows( $check_past_second_credited);
                  
                  if( $num_of_second_credited > 0){
                       echo '<div class="alert alert-danger">Account has already been credited for the second time</div>   ';
                  }else{
                      
                      $move_to_second_credited =mysqli_query($con,"INSERT INTO tp_second_credited(tp_user_unique_id,tp_username,tp_user_mobile_number,tp_mobile_money_name,tp_amount_cedis,tp_user_contact,tp_order_ref_no)VALUES ('$paid_order_unique_id','$paid_order_username ',' $paid_order_momo_number ','$paid_order_momo_name','$paid_order_amount_cedis ',' $paid_order_contact','$order_ref_no')");
                      if( $move_to_second_credited ){
                          echo '  ';
                      }else{ echo '  '; }
                  }
                  
                  $update_matured=mysqli_query($con,"UPDATE tp_matured SET tp_matured_paid=1 WHERE tp_ref_no = ' $order_ref_no' ");
                  $update_credited=mysqli_query($con,"UPDATE tp_credited SET tp_paid=1 WHERE tp_credited_id = '$order_ref_no' ");
                  if( $update_matured &&  $update_credited ){
                      echo '<div class="alert alert-success">'.  $amount_paid.' cedis payment made successfully to '.$paid_order_momo_name.' </div>';
                  } 
                  else{ echo '<div class="alert alert-danger">unsuccesful Pls try again</div>'; }
              }
              else{ echo '<div class="alert alert-danger">Move Unsuccessful</div>'; } 
          }   //end past paid order else
              
          }  else{ echo '<div class="alert alert-danger">error</div>'; }     //end $total_coin_receiver
          
      }    else{ echo '<div class="alert alert-danger">Unsuccessful Query</div>'; }   // end  $coin_receiver_query
          
      
      
  }   
    
}// end of isset
    
   
  ?>
  