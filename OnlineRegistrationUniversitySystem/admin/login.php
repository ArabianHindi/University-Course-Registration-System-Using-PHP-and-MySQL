<?php include('../config/constants.php');?>
<html>
    <head>
      <title>Online Registration University System Login</title>
      <link rel="stylesheet" href="../css/admin.css">
    </head>
  <body>
    <div class="login">
     <h1 class="text-center">Login</h1>
     <br><br>
     <?php
      if(isset($_SESSION['login']))
      {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }
      if(isset($_SESSION['no-login-massage']))
      {
        echo $_SESSION['no-login-massage'];
        unset($_SESSION['no-login-massage']);
      }

     ?>
     <br><br>
     <!-- Login Form Start Here-->
     <form action=""method="POST" class="text-center">
      Username:<br>
      <input type="text"name="username"placeholder="Enter Username"><br><br>
      Password:<br>
      <input type="password"name="password"placeholder="Enter Password"><br><br>
      <input type="submit"name="submit"value="Login"class="btn-primary">
      <br><br>
     </form>
     <!-- Login Form ends Here-->
     <p class="text-center">Created By -<a href="#">AhmedElkhawisky</p>
    </div>
  </body>
</html>
<?php
if(isset($_POST['submit']))
{
 $username=mysqli_real_escape_string($conn,$_POST['username']);
 $password=mysqli_real_escape_string($conn,md5($_POST['password']));

 $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

 $res =mysqli_query($conn,$sql);

 $count=mysqli_num_rows($res);
 if($count==1)
 {
   $_SESSION['login']="<div class='succes'>login Successfully.</div>";
   $_SESSION['user']=$username;
   header('location:'.SITEURL.'admin/');
 }
 else
 {
   $_SESSION['login']="<div class='error text-center'>Username Or Password did not found.</div>";
   header('location:'.SITEURL.'admin/login.php');
 }
}
?>
