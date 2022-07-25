<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1> Update Student</h1>
    <br><br>
    <?php
     if(isset($_GET['id']))
     {
       $id=$_GET['id'];
       $sql="SELECT *FROM users WHERE id=$id";
       $res=mysqli_query($conn,$sql);
       $count=mysqli_num_rows($res);
       if($count==1)
       {
         $row=mysqli_fetch_assoc($res);
         $id=$row['id'];
         $username=$row['username'];
         $student_id=$row['student_id'];
         $email=$row['email'];

       }
       else
       {
         $_SESSION['no-cousre-found']="<div class='error'> User Not Found</div>";
         header('location:'.SITEURL.'admin/manage-user.php');
       }
     }
     else
     {
      header('location:'.SITEURL.'admin/manage-user.php');
     }
     ?>
    <form action=""method="POST"enctype="multipart/form-data">
   <table class="tbl-30">
     <tr>
       <td>Username:</td>
       <td>
          <input type="text"name="username"value="<?php echo $username;?>">
       </td>
     </tr>
     <tr>
       <td>ID:</td>
       <td>
          <input type="number"name="student_id"value="<?php echo $student_id;?>">
       </td>
     </tr>
     <tr>
       <td>Email:</td>
       <td>
          <input type="email"name="email"value="<?php echo $email;?>">
       </td>
     </tr>
      <tr>
      <td>
        <input type="hidden"name="id"value="<?php echo $id;?>">
       <input type="submit"name="submit"value="Update User"class="btn-secondary">
     </td>
      </tr>
    </table>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
       $id=$_POST['id'];
       $username=$_POST['username'];
       $student_id=$_POST['student_id'];
       $email=$_POST['email'];
       $sql2="UPDATE users SET
       username='$username',
       student_id='$student_id',
       email='$email'
       WHERE id=$id
       ";
       $res2=mysqli_query($conn,$sql2);
       if($res2==true)
       {
         $_SESSION['update']="<div class='succes'>User Update Successfully.</div>";
         header('location:'.SITEURL.'admin/manage-user.php');
       }
       else
       {
         $_SESSION['update']="<div class='error'>Faild To Update User.</div>";
         header('location:'.SITEURL.'admin/manage-user.php');
       }
    }
     ?>
  </div>
</div>
<?php  include('partials/footer.php');  ?>
