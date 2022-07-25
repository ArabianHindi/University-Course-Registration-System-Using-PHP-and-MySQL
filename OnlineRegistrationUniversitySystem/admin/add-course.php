<?php include('partials/menu.php'); ?>

<div class="main-content">
   <div class="wrapper">
    <h1>Add Courses</h1>
    <br><br>
    <?php
    if(isset($_SESSION['add']))
    {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    if(isset($_SESSION['upload']))
    {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }
    ?>
    <br><br>
    <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
     <tr>
      <td>Title:</td>
      <td>
       <input type="text"name="title"placeholder="course Title">
      </td>
     </tr>
     <tr>
       <td>code:</td>
       <td>
        <input type="text"name="code"placeholder="course code">
       </td>
     </tr>
     <tr>
       <td>seat:</td>
       <td>
        <input type="number"name="seat"placeholder="course seat">
       </td>
     </tr>
     <tr>
      <td>Active:</td>
      <td>
       <input type="radio"name="active"value="Yes">Yes
       <input type="radio"name="active"value="No">No
      </td>
     </tr>
     <tr>
      <td colspan="2">
        <input type="submit" name="submit" value="Add course" class="btn-secondary">
      </td>
     </tr>
    </table>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
      $title=$_POST['title'];
      $code=$_POST['code'];
      $seat=$_POST['seat'];
      if(isset($_POST['active']))
      {
        $active=$_POST['active'];
      }
      else
      {
        $active="No";
      }
      $sql="INSERT INTO tbl_course SET
        title='$title',
        code='$code',
        seat='$seat',
        active='$active'
      ";
      $res=mysqli_query($conn,$sql);

      if($res==true)
      {
        $_SESSION['add']="<div class='succes'>Course Added Successfully</div>";
        header('location:'.SITEURL.'admin/manage-course.php');
      }
      else
      {
        $_SESSION['add']="<div class='error'>Faild To Add Course</div>";
        header('location:'.SITEURL.'admin/add-course.php');
      }
    }
    ?>
   </div>
</div>
<?php include('partials/footer.php'); ?>
