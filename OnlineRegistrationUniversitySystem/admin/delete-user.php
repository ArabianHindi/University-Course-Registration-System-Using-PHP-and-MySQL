<?php
include('../config/constants.php');
    if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }
      $sql="DELETE FROM users WHERE id=$id";
      $res=mysqli_query($conn,$sql);
      if($res==true)
      {
        $_SESSION['delete']="<div class='succes'>User Removed Successfully</div>";
        header('location:'.SITEURL.'admin/manage-user.php');
      }
    else
    {
      header('location:'.SITEURL.'admin/manage-user.php');
    }
?>
