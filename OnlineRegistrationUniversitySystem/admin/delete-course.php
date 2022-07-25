<?php
include('../config/constants.php');
    if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }
      $sql="DELETE FROM tbl_course WHERE id=$id";
      $res=mysqli_query($conn,$sql);
      if($res==true)
      {
        $_SESSION['delete']="<div class='succes'>Course Removed Successfully</div>";
        header('location:'.SITEURL.'admin/manage-course.php');
      }
    else
    {
      header('location:'.SITEURL.'admin/manage-course.php');
    }
?>
