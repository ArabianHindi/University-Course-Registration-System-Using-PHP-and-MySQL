<?php
//include constants
include('../config/constants.php');
//1.get id of Admin
$id=$_GET['id'];
$sql="DELETE FROM tbl_admin WHERE id=$id";
$res=mysqli_query($conn,$sql);

if($res==true)
{

  header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{

    header('location:'.SITEURL.'admin/manage-admin.php');
}
 ?>
