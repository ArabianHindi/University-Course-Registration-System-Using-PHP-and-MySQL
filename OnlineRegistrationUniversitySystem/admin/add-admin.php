<?php include('partials/menu.php'); ?>
<div class="main-content">
  <div class="wrapper">
   <h1>Add Admin</h1>
   <br><br>
   <form action=""method="POST">
    <table class="tbl-30">
     <tr>
      <td>Full Name:</td>
      <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
     </tr>
     <tr>
      <td>Username:</td>
      <td>
        <input type="text" name="username"placeholder="Your Username">
      </td>
     </tr>
     <tr>
      <td>Password:</td>
      <td>
        <input type="password" name="password"placeholder="Your Password">
      </td>
     </tr>
     <tr>
       <td colspan="2">
      <input type="submit"name="submit"value="Add Admin"class="btn-secondary">
       </td>
     </tr>
    </table>
   </form>
  </div>
</div>
<?php include('partials/footer.php'); ?>
<?php
if(isset($_POST['submit']))
{
  //Get Data
  $full_name=$_POST['full_name'];
  $username=$_POST['username'];
  $password=md5($_POST['password']);//password encryption by md5
  //send to data base
  // SQL QUERY TO SAVE DATA INTO DATABase
  $sql="INSERT INTO tbl_admin SET
   full_name='$full_name',
   username='$username',
   password='$password'
  ";
   //save data into database
   $res =mysqli_query($conn,$sql) or die(mysqli_error());
   if($res==TRUE)
   {
     //create session massage
     $_SESSION['add']="Admin Added successfully";
     header("location:".SITEURL.'admin/manage-admin.php');
   }
   else
   {
     //create session massage
     $_SESSION['add']="Admin Added faild";
     header("location:".SITEURL.'admin/add-admin.php');
   }
}
 ?>
