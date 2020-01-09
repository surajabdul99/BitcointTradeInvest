

<?php
//session_start();
//require_once "includes/dbconfig.php";
//include_once "includes/functions.php";





 $session_user_id = $_SESSION['tp_user_unique_id'];

if(!empty($_POST['amount'])&&isset($_POST['submit-paid'])){
    
    
    $get_contact_query =mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$session_user_id' ");
    if($get_contact_query ){
          $num_get_contact =mysqli_num_rows($get_contact_query ) ;
        if( $num_get_contact == 1){
            $contact_row = mysqli_fetch_array( $get_contact_query);
            $contact_number =  $contact_row['tp_user_contact_number'];
        }else{echo 'error';}
    } else{echo 'no query';}
    
    
    $amount = checkValues($_POST['amount']); 
    $payment_reference = uniqid(rand(100,999));
    $payment_reference=(int)$payment_reference;
    $update_paid_query=mysqli_query($con,"UPDATE tp_pledges SET tp_paid = 1 WHERE tp_user_unique_id='$session_user_id' ");
    $update_paid_query=mysqli_query($con,"UPDATE tp_pledges SET payment_code = '$payment_reference' WHERE tp_user_unique_id='$session_user_id' ");
    
    
    if( $update_paid_query){
        
       
        
        echo '<div class="alert alert-success alert-dismissible"><button class="close" type="button">
				<span aria-hidden="true">×</span>
				<span class="sr-only">Close</span>
			</button>Make Payment to:<br> BITCOIN WALLET ADDRESS: <br>  
          
            
            <input type="text" value="   18esNPQWdVVKTRA1FJVNhnPu5YqtSDrxix " id="myInput">
<button onclick="myFunction()">Click to Copy address</button>



<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>
            
            </div>';
    }
    else{
        echo 'error';
    }
}
    
    ?>