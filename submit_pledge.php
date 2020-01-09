<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";

//$pledge_100 = checkValues($_POST['pledge_100'])
//if(  !empty($_POST('pledge_100'))  || !empty($_POST('pledge_200'))   )
    
    
   // if( ($_POST('pledge_100')) !== NULL || ($_POST('pledge_200')) !== NULL  )
(int)$amount = 0;

if(  isset($_POST['pledge_100'])   )  {
    $amount = 10;
    $roi = 20;
    $first_gh=10;
    $recommit=10;
    
    
    $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
echo $amount;
   echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"><span class=""></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 } //end pledge 100
    
 elseif  (isset($_POST['pledge_200'])){
    
     $amount = 20;
     
    $roi = 40;
    $first_gh=30;
    $recommit=10;
     
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                 $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 } //end pledge 200

elseif  (isset($_POST['pledge_300'])){
    
     $amount = 30;
     $roi = 60;
     $first_gh=40;
     $recommit=20;
    
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                 $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 }  //end pledge 300



elseif  (isset($_POST['pledge_400'])){
    
     $amount = 40;
     $roi = 80;
    $first_gh=60;
    $recommit=20;
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 }  // end 400

elseif  (isset($_POST['pledge_500'])){
    
     $amount = 50;
     $roi = 100;
    $first_gh=70;
    $recommit=30;
    
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 }   //end 500





elseif  (isset($_POST['pledge_600'])){
    
     $amount = 60;
     $roi = 120;
    $first_gh=80;
    $recommit=30;
    
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
               $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 }  // end 600   





elseif  (isset($_POST['pledge_700'])){
    
     $amount = 70;
     $roi = 140;
    $first_gh=90;
    $recommit=40;
    
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 }  // end 700  




elseif  (isset($_POST['pledge_800'])){
    
     $amount = 80;
     $roi = 160;
    $first_gh=100;
    $recommit=40;
    
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
               $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous Pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 }  // end 800  




elseif  (isset($_POST['pledge_900'])){
    
     $amount = 90;
     $roi = 180;
    $first_gh=120;
    $recommit=50;
    
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 }  // end 900  




elseif  (isset($_POST['pledge_1000'])){
    
     $amount = 100;
     $roi = 200;
    $first_gh=140;
    $recommit=50;
    
     $session_username = $_SESSION['username'];
$session_momo_name = $_SESSION['momo_name'];
//echo $amount;
  // echo   $session_momo_name;
//echo $session_username;

$check_user = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_username =    '{$session_username}' ");


$num_of_users = mysqli_num_rows($check_user);
//echo $num_of_users;
if($num_of_users == 1){
    
    $profile = mysqli_fetch_array($check_user);
    $name = $profile['tp_user_momo_name'];
    $mobile_number = $profile['tp_user_momo_number'];
    $contact = $profile['tp_user_contact_number'];
    $trans_checked = 1;
    $tp_user_unique_id = $profile['tp_user_unique_id'];
    
    $check_debt = mysqli_query($con,"SELECT * FROM tp_debtors WHERE tp_username = '{$session_username}' OR (tp_mobile_money_name = '$name'  AND (tp_deptor_mobile_money_number = '$mobile_number' OR tp_deptor_contact = '$contact'))  ");
    
    if($check_debt){
        $num_of_debtors = mysqli_num_rows($check_debt);
        
        if($num_of_debtors == 0){ 
          
            $check_past_pledge = mysqli_query($con, "SELECT * FROM tp_pledges WHERE tp_username = '{$session_momo_name}' AND tp_matched = '0' ");
            $total_past_pledge = mysqli_num_rows($check_past_pledge);
            if($total_past_pledge == 0){
          
            
                
                $insert = mysqli_query($con, "INSERT INTO tp_pledges(tp_user_unique_id, tp_amount, tp_username, tp_user_mobile_number, tp_user_contact, tp_transaction_checked,tp_roi,tp_first_gh_amount,tp_recommit_amount)
                            VALUES(' $tp_user_unique_id','$amount','$name','$mobile_number','$contact',1,'$roi','$first_gh','$recommit')");
                            if($insert){
                              
                                echo '<div class="alert alert-success"></span> A Pledge of '.$amount.' cedis received! We will find you a match very soon</div>';

                            }
                            else{
                                
                                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Order failed! Please try again</div>';
                            }
                            
            }
            else{
                
                 echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Please wait for your previous pledge to go through</div>';
            }
        }
        else{
           
            
              echo '<div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Please pay your previous pledge</div>';
        }
    }
    else{
        echo "check error";
    }
}
else {
    echo 'User not found';
}


     
 }  // end 1000  

?>