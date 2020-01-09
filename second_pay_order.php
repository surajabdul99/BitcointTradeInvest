<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

$session_admin_username = $_SESSION['admin_username'];


if(isset($_SESSION['admin_username'])){
    
 

  if(!empty($_POST['s_order-ref'])  && isset($_POST['s_pay-order'])   ){
      
      $s_order_ref_no = checkValues($_POST['s_order-ref']);
      $s_pay_order_query = mysqli_query($con,"SELECT * FROM tp_second_matured WHERE tp_ref_no = ' $s_order_ref_no' ");
      if( $s_pay_order_query){
          
          $s_total_order_paid = mysqli_num_rows( $s_pay_order_query);
          if( $s_total_order_paid == 1){
              
              $s_paid_order_row = mysqli_fetch_array( $s_pay_order_query);
              $s_paid_order_unique_id =  $s_paid_order_row['tp_s_matured_user_unique_id'];
               $s_paid_order_amount_cedis =  $s_paid_order_row['tp_s_matured_amount_cedis'];
            
              $s_paid_order_momo_name =  $s_paid_order_row['tp_s_matured_momo_name'];
              $s_paid_order_momo_number =  $s_paid_order_row['tp_s_matured_momo_number'];
              $s_paid_order_contact =  $s_paid_order_row['tp_s_matured_user_contact'];
              $s_paid_order_username =  $s_paid_order_row['tp_s_matured_username'];
              $s_paid_order_amount_to_receive =  $s_paid_order_row['tp_s_received_amount'];
              $s_amount_paid =  $s_paid_order_amount_to_receive;
              
              //check past payment
              
            $check_s_past_paid_order=mysqli_query($con,"SELECT * FROM tp_second_paid_orders WHERE tp_s_paid_order_ref_no ='$s_order_ref_no' ");
            
            $num_past_s_paid_orders = mysqli_num_rows( $check_s_past_paid_order);
            if($num_past_s_paid_orders > 0){
                echo '<div class="alert alert-danger">Second Payment has already been made.Thank You.</div>   ';
            }
              else{
                    
              $move_to_s_paid_orders = mysqli_query($con,"INSERT INTO tp_second_paid_orders(tp_s_paid_order_unique_id, tp_s_paid_order_amount_cedis,tp_s_paid_order_username,tp_s_paid_order_momo_name,tp_s_paid_order_momo_number,tp_s_paid_order_contact,tp_s_paid_order_ref_no,tp_s_amount_paid) VALUES ('$s_paid_order_unique_id','  $s_paid_order_amount_cedis','$s_paid_order_username','$s_paid_order_momo_name','$s_paid_order_momo_number ',' $s_paid_order_contact','$s_order_ref_no',' $s_amount_paid')");
              
              if( $move_to_s_paid_orders ){
                  
                  $check_past_third_credited=mysqli_query($con,"SELECT * FROM tp_third_credited WHERE tp_th_order_ref_no ='$s_order_ref_no' ");
            
                  $num_of_third_credited = mysqli_num_rows($check_past_third_credited);
                  
                  if($num_of_third_credited >0){
                       echo '<div class="alert alert-danger">Account has already been credited for the third time</div>   ';
                  }else{
                      
                      $move_to_third_credited =mysqli_query($con,"INSERT INTO tp_third_credited(tp_th_user_unique_id,tp_th_username,tp_th_user_mobile_number,tp_th_mobile_money_name,tp_th_amount_cedis,tp_th_user_contact,tp_th_order_ref_no)VALUES ('$s_paid_order_unique_id','$s_paid_order_username ',' $s_paid_order_momo_number ','$s_paid_order_momo_name','$s_paid_order_amount_cedis ',' $s_paid_order_contact','$s_order_ref_no')");
                      if($move_to_third_credited){
                          echo '<div class="alert alert-success">USER HAS AUTOMATICALLY BEEN CREDITED FOR THE THIRD TIME.</div>   ';
                      }else{ echo '<div class="alert alert-danger">Unsuccesful auto crediting.</div>   '; }
                  }
                  
                  $update_second_matured=mysqli_query($con,"UPDATE tp_second_matured SET tp_s_matured_paid=1 WHERE tp_ref_no = ' $s_order_ref_no' ");
                  $update_second_credited=mysqli_query($con,"UPDATE tp_second_credited SET tp_paid=0 WHERE tp_order_ref_no = '$s_order_ref_no' ");
                  if(  $update_second_matured &&  $update_second_credited){
                      echo '<div class="alert alert-success">'.$s_amount_paid.'cedis payment made successfully to '.$s_paid_order_momo_name.' </div>';
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
  