<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1> Update professor</h1>
    <br><br>
    <?php
     if(isset($_GET['id']))
     {
       $id=$_GET['id'];
       $sql="SELECT *FROM prof WHERE id=$id";
       $res=mysqli_query($conn,$sql);
       $count=mysqli_num_rows($res);
       if($count==1)
       {
         $row=mysqli_fetch_assoc($res);
         $id=$row['id'];
         $username=$row['username'];
         $prof_id=$row['prof_id'];
         $email=$row['email'];
         $course=$row['course'];
       }
       else
       {
         $_SESSION['no-cousre-found']="<div class='error'> User Not Found</div>";
         header('location:'.SITEURL.'admin/manage-prof.php');
       }
     }
     else
     {
      header('location:'.SITEURL.'admin/manage-prof.php');
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
          <input type="number"name="prof_id"value="<?php echo $prof_id;?>">
       </td>
     </tr>
     <tr>
       <td>Email:</td>
       <td>
          <input type="email"name="email"value="<?php echo $email;?>">
       </td>
     </tr>
     <tr>
        <tr>
        <td>course:</td>
        <td>
        <input type="text"name="course"value="<?php echo $course;?>">
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
       $prof_id=$_POST['prof_id'];
       $email=$_POST['email'];
       $course=$_POST['course'];
       $sql2="UPDATE prof SET
       username='$username',
       prof_id='$prof_id',
       email='$email',
       course='$course'
       WHERE id=$id
       ";
       $res2=mysqli_query($conn,$sql2);
       if($res2==true)
       {
         $_SESSION['update']="<div class='succes'>professor Update Successfully.</div>";
         header('location:'.SITEURL.'admin/manage-prof.php');
       }
       else
       {
         $_SESSION['update']="<div class='error'>Faild To Update professor.</div>";
         header('location:'.SITEURL.'admin/manage-prof.php');
       }
    }
     ?>
  </div>
</div>
<?php  include('partials/footer.php');  ?>
