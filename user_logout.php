<?php

session_start();

$_SESSION['username']= null;
$_SESSION['momo_name'] = null;

 echo "<script>window.location='user_login.php';</script>";


?>