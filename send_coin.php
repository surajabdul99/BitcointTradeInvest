<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

//$session_admin_username = $_SESSION['admin_username'];


//if(isset($_SESSION['admin_username'])){
    
 

  if(!empty($_POST['payer'])  && isset($_POST['send-coin'])   ){
      
      $coin_receiver_id = checkValues($_POST['payer']);
      $coin_receiver_query = mysqli_query($con,"SELECT * FROM tp_pledges WHERE tp_user_unique_id = '$coin_receiver_id' AND tp_paid = 1 AND tp_matched= 0 ");
      if($coin_receiver_query){
          
          $total_coin_receiver = mysqli_num_rows( $coin_receiver_query);
          if( $total_coin_receiver  == 1){
              
              $coin_receiver_row = mysqli_fetch_array( $coin_receiver_query);
              $coin_receiver_unique_id = $coin_receiver_row['tp_user_unique_id'];
              $coin_receiver_amount_cedis = $coin_receiver_row['tp_amount_cedis'];
              $coin_receiver_amount_coin = $coin_receiver_row['tp_amount_coin'];
              $coin_receiver_momo_name = $coin_receiver_row['tp_mobile_money_name'];
              $coin_receiver_momo_number = $coin_receiver_row['tp_user_mobile_number'];
              $coin_receiver_contact = $coin_receiver_row['tp_user_contact'];
              $coin_receiver_username = $coin_receiver_row['tp_username'];
              $coin_receiver_package = $coin_receiver_row['tp_package'];
              $payment_method = $coin_receiver_row['tp_payment_method'];
              $move_to_credited = mysqli_query($con,"INSERT INTO tp_credited(tp_user_unique_id, tp_amount_cedis,tp_amount_coin,tp_username,tp_mobile_money_name,tp_user_mobile_number,tp_user_contact,tp_payment_method) VALUES ('$coin_receiver_unique_id',' $coin_receiver_amount_cedis','$coin_receiver_amount_coin',' $coin_receiver_username','  $coin_receiver_momo_name',' $coin_receiver_momo_number ','$coin_receiver_contact ','$payment_method')");
              
              if($move_to_credited){
                  
                  $update_uncredited=mysqli_query($con,"UPDATE tp_pledges SET tp_matched=1 WHERE tp_user_unique_id = '$coin_receiver_unique_id' ");
                  if($update_uncredited){
                      echo '<div class="alert alert-success">'.$coin_receiver_amount_cedis.' cedis/dollars credited successfully to '. $coin_receiver_momo_name . '</div>';
                  } 
                  else{ echo '<div class="alert alert-danger">unsuccesful Pls try again</div>'; }
              }
              else{ echo '<div class="alert alert-danger">Move Unsuccessful</div>'; } 
              
              
          }  else{ echo '<div class="alert alert-danger">error</div>'; }     //end $total_coin_receiver
          
      }    else{ echo '<div class="alert alert-danger">Unsuccessful Query</div>'; }   // end  $coin_receiver_query
          
      
      
  }// end of isset
    
   
  ?>
  