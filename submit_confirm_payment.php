<?php
//session_start();

//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";


$session_id = $_SESSION['tp_user_unique_id'];
//echo $session_id;

if(!empty($_POST['payer'])  && isset($_POST['confirm-payment'])   ){
    
    $payer = checkValues($_POST['payer']);
    //echo $payer;


    
$check=mysqli_query($con,"SELECT * FROM tp_payment WHERE tp_receiver_unique_id= '$session_id' AND tp_payer_unique_id = '$payer' AND tp_payment_confirmed=0 AND tp_paid = 1 ");
                        
if($check) {
    $total_check = mysqli_num_rows($check) ;  
     //echo $total_check;                   //fetching payers
     if ($total_check ==1){
         
         
        $row = mysqli_fetch_array($check);
        $amount = $row['tp_amount'];
        $time = $row['tp_payment_time'];
        $awaiting_id = $row['tp_awaiting_id'];
       // $payer = $row['tp_payer_unique_id'];
        $receiver = $row['tp_receiver_unique_id'];
        $payer_name=$row['tp_payer_momo_name'];
        $receiver_name =$row['tp_receiver_momo_name'];
         $payer_number = $row['tp_payer_momo_number'];
         $receiver_number = $row['tp_receiver_momo_number'];
         
        $move = mysqli_query($con, "INSERT INTO tp_past_payments (tp_payer_unique_id, tp_receiver_unique_id, tp_amount, tp_payment_time) VALUES('$payer','$receiver','$amount','$time')");

    
       if($move){
           
           $get_roi_query = mysqli_query($con,"SELECT * FROM tp_pledges WHERE tp_user_unique_id = '$payer' ");
           $get_roi_query_result =  mysqli_fetch_array($get_roi_query);
           $roi_amount = $get_roi_query_result['tp_roi'];
           $first_gh_amount = $get_roi_query_result['tp_first_gh_amount'];
           $recommit_amount = $get_roi_query_result['tp_recommit_amount'];
           
           
            $move_to_awaiting = mysqli_query($con, "INSERT INTO tp_awaiting_payment(tp_user_unique_id, tp_amount,tp_username,tp_momo_number,tp_roi,tp_first_gh_amount,tp_recommit_amount) VALUES ('$payer','$amount','$payer_name','$payer_number',' $roi_amount',' $first_gh_amount ','$recommit_amount ')");
            if($move_to_awaiting){
                $delete_awaiting = mysqli_query($con, "DELETE FROM tp_awaiting_payment WHERE tp_user_unique_id = '$receiver' ");
                $delete_pledge = mysqli_query($con, "DELETE FROM tp_pledges WHERE tp_user_unique_id = '$payer'");
                $delete_payment = mysqli_query($con, "DELETE FROM tp_payment WHERE tp_payer_unique_id = '$payer' AND tp_receiver_unique_id = '$receiver'");

                if($delete_awaiting && $delete_pledge && $delete_payment){
                    echo '<div class="alert alert-success"><h1>Payment confirmation successful</h1></div>';
                }
                else{
                   
                     echo '<div class="alert alert-success"><h1>Payment not confirmed</h1></div>';
                }
            }
            else{
              
                 echo '<div class="alert alert-danger"><h1>Move Error! Confirm failed</h1></div>';
            }
        }
        else{
           
             echo '<div class="alert alert-danger"><h1>Move Error! Confirmation failed</h1></div>';
        }

   
         
     }   //end of total check if
    
    else{
          echo '<div class="alert alert-danger"><h1>Confirmation Unsuccesful. Payer has not made payment or clicked on PAID .Kindly call to alert him/her .Thank you</h1></div>';
        
        }//end of total check else
}   //end of check   else   
   else{echo "Query Unsuccessful";} //end of check   else  
    
//} //end of foreach loop
    
//} //end of receiver payment query
    
}  else{ echo "";} //end of isset  
?>