<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1> Update Course</h1>
    <br><br>
    <?php
     if(isset($_GET['id']))
     {
       $id=$_GET['id'];
       $sql="SELECT *FROM tbl_course WHERE id=$id";
       $res=mysqli_query($conn,$sql);
       $count=mysqli_num_rows($res);
       if($count==1)
       {
         $row=mysqli_fetch_assoc($res);
         $title=$row['title'];
         $code=$row['code'];
         $seat=$row['seat'];
         $active=$row['active'];
       }
       else
       {
         $_SESSION['no-cousre-found']="<div class='error'> Course Not Found</div>";
         header('location:'.SITEURL.'admin/manage-course.php');
       }
     }
     else
     {
      header('location:'.SITEURL.'admin/manage-course.php');
     }
     ?>
    <form action=""method="POST"enctype="multipart/form-data">
   <table class="tbl-30">
     <tr>
       <td>Title:</td>
       <td>
          <input type="text"name="title"value="<?php echo $title;?>">
       </td>
     </tr>
     <tr>
       <td>Code:</td>
       <td>
          <input type="text"name="code"value="<?php echo $code;?>">
       </td>
     </tr>
     <tr>
       <td>Seats:</td>
       <td>
          <input type="number"name="seat"value="<?php echo $seat;?>">
       </td>
     </tr>
      <tr>
      <td>Active:</td>
      <td>
      <input <?php if($active=="Yes"){echo "checked";}?> type="radio"name="active"value="Yes">Yes
      <input <?php if($active=="No"){echo "checked";}?> type="radio"name="active"value="No">No
      </td>
      </tr>
      <tr>
      <td>
        <input type="hidden"name="id"value="<?php echo $id;?>">
       <input type="submit"name="submit"value="Update course"class="btn-secondary">
     </td>
      </tr>
    </table>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
       $id=$_POST['id'];
       $title=$_POST['title'];
       $code=$_POST['code'];
       $seat=$_POST['seat'];
       $active=$_POST['active'];
       $sql2="UPDATE tbl_course SET
       title='$title',
       code='$code',
       seat='$seat',
       active='$active'
       WHERE id=$id
       ";
       $res2=mysqli_query($conn,$sql2);
       if($res2==true)
       {
         $_SESSION['update']="<div class='succes'>Course Update Successfully.</div>";
         header('location:'.SITEURL.'admin/manage-course.php');
       }
       else
       {
         $_SESSION['update']="<div class='error'>Faild To Update Course.</div>";
         header('location:'.SITEURL.'admin/manage-course.php');
       }
    }
     ?>
  </div>
</div>
<?php  include('partials/footer.php');  ?>
