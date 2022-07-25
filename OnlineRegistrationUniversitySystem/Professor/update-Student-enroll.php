<?php include('HMENU.php');?>
<div class="main-content">
  <div class="wrapper">
    <h1> Update Student</h1>
    <br><br>
    <?php
     if(isset($_GET['id']))
     {
       $id=$_GET['id'];
       $sql="SELECT *FROM tbl_enrol WHERE id=$id";
       $res=mysqli_query($conn,$sql);
       $count=mysqli_num_rows($res);
       if($count==1)
       {
         $row=mysqli_fetch_assoc($res);
         $absent=$row['absent'];
         $grade=$row['grade'];

       }
       else
       {
         $_SESSION['no-cousre-found']="<div class='error'> Student Not Found</div>";
         header('location:'.SITEURL.'professor/manage-student.php');
       }
     }
     else
     {
      header('location:'.SITEURL.'professor/manage-student.php');
     }
     ?>
    <form action=""method="POST"enctype="multipart/form-data">
   <table class="tbl-30">
     
     <tr>
       <td>Absent:</td>
       <td>
          <input type="text"name="absent"value="<?php echo $absent;?>">
       </td>
     </tr>
     <tr>
       <td>Grade:</td>
       <td>
          <input type="text"name="grade"value="<?php echo $grade;?>">
       </td>
     </tr>
      <tr>
      <td>
        <input type="hidden"name="id"value="<?php echo $id;?>">
       <input type="submit"name="submit"value="Update Student"class="btn-secondary">
     </td>
      </tr>
    </table>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
       $id=$_POST['id'];
       $absent=$_POST['absent'];
       $grade=$_POST['grade'];

       $sql2="UPDATE tbl_enrol SET
       absent='$absent',
       grade='$grade'
       WHERE id=$id
       ";
       $res2=mysqli_query($conn,$sql2);
       if($res2==true)
       {
         $_SESSION['update']="<div class='succes'>Course Update Successfully.</div>";
         header('location:'.SITEURL.'professor/manage-student.php');
       }
       else
       {
         $_SESSION['update']="<div class='error'>Faild To Update Course.</div>";
         header('location:'.SITEURL.'professor/manage-student.php');
       }
    }
     ?>
  </div>
</div>
<?php include('HFOOTER.php');?>
