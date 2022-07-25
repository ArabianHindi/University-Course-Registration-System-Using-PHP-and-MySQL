<?php
include('../config/constants.php');
    if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }
      $sql="DELETE FROM prof WHERE id=$id";
      $res=mysqli_query($conn,$sql);
      if($res==true)
      {
        $_SESSION['delete']="<div class='succes'>professor Removed Successfully</div>";
        header('location:'.SITEURL.'admin/manage-prof.php');
      }
    else
    {
      header('location:'.SITEURL.'admin/manage-prof.php');
    }
?>
