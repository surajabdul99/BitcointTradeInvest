<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

//$session_admin_username = $_SESSION['admin_username'];


if(isset($_SESSION['admin_username'])){
    
  

  if(!empty($_POST['th_order-ref'])  && isset($_POST['th_pay-order'])   ){
      
      $th_order_ref_no = checkValues($_POST['th_order-ref']);
      $th_pay_order_query = mysqli_query($con,"SELECT * FROM tp_third_matured WHERE tp_th_ref_no = '$th_order_ref_no' ");
      if( $th_pay_order_query){
          
          $th_total_order_paid = mysqli_num_rows($th_pay_order_query);
          if( $th_total_order_paid == 1){
              
              $th_paid_order_row = mysqli_fetch_array( $th_pay_order_query);
              $th_paid_order_unique_id =  $th_paid_order_row['tp_th_matured_user_unique_id'];
               $th_paid_order_amount_cedis =  $th_paid_order_row['tp_th_matured_amount_cedis'];
            
              $th_paid_order_momo_name =  $th_paid_order_row['tp_th_matured_momo_name'];
              $th_paid_order_momo_number =  $th_paid_order_row['tp_th_matured_momo_number'];
              $th_paid_order_contact =  $th_paid_order_row['tp_th_matured_user_contact'];
              $th_paid_order_username =  $th_paid_order_row['tp_th_matured_username'];
              $th_paid_order_amount_to_receive =  $th_paid_order_row['tp_th_received_amount'];
              $th_amount_paid =  $th_paid_order_amount_to_receive;
              
              //check past payment
              
            $check_th_past_paid_order=mysqli_query($con,"SELECT * FROM tp_third_paid_orders WHERE tp_th_paid_order_ref_no ='$th_order_ref_no' ");
            
            $num_past_th_paid_orders = mysqli_num_rows( $check_th_past_paid_order);
            if($num_past_th_paid_orders > 0){
                echo '<div class="alert alert-danger">Third Payment has already been made.Thank You.</div>   ';
            }
              else{
                    
              $move_to_th_paid_orders = mysqli_query($con,"INSERT INTO tp_third_paid_orders(tp_th_paid_order_unique_id, tp_th_paid_order_amount_cedis,tp_th_paid_order_username,tp_th_paid_order_momo_name,tp_th_paid_order_momo_number,tp_th_paid_order_contact,tp_th_paid_order_ref_no,tp_th_amount_paid) VALUES ('$th_paid_order_unique_id','$th_paid_order_amount_cedis','$th_paid_order_username','$th_paid_order_momo_name','$th_paid_order_momo_number ',' $th_paid_order_contact','$th_order_ref_no','$th_amount_paid')");
              
              if( $move_to_th_paid_orders ){
                  
                  
                  $update_third_matured=mysqli_query($con,"UPDATE tp_third_matured SET tp_th_matured_paid=1 WHERE tp_th_ref_no = ' $th_order_ref_no' ");
                  $update_third_credited=mysqli_query($con,"UPDATE tp_third_credited SET tp_th_paid=0 WHERE tp_th_order_ref_no = '$th_order_ref_no' ");
                  
                  if(  $update_third_matured&&   $update_third_credited){
                      echo '<div class="alert alert-success">'. $th_amount_paid.'cedis payment made successfully to '. $th_paid_order_momo_name .' </div>';
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
  