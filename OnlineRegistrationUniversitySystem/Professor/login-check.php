<?php
 if(!isset($_SESSION['prof_id']))
 {
   header('location:'.SITEURL.'professor/login.php');
 }
?>
