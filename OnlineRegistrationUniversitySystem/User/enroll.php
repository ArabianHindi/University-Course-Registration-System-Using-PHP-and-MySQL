<?php include('HMENU.php');?>
<?php
if(isset($_GET['course_id']))
{
  $course_id=$_GET['course_id'];
  $sql="SELECT * FROM tbl_course WHERE id=$course_id";
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
    header('location:'.SITEURL);
  }
}
else
{
    header('location:'.SITEURL);
}
?>
<?php
              $sql="SELECT * FROM `tbl_enrol` ";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              if($count>0)
              {
                if($count>0)
                {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id=$row['id'];
                    $enrol_title=$row['title'];
                    $enrol_id=$row['student_id'];
                  }
                }
              }
?>

<?php
     $sql="SELECT * FROM `users` WHERE `student_id`='$_SESSION[student_id]'";
     $res=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($res);
     if($count>0)
     {
       while($row=mysqli_fetch_assoc($res))
       {
         $id=$row['id'];
         $student_id=$row['student_id'];
         ?>
         <?php
       }
     }
    ?>
<section>
       <div class="container">
           <form action=""method="POST">
               <fieldset>
                   <h4>Selected Course</h4>
                   <div>
                       <h3><?php echo $title;?></h3>
                       <input type="hidden"name="title"value="<?php echo $title;?>">
                       <h3><?php echo $seat;?>Seats</h3>
                       <input type="hidden"name="seat"value="<?php echo $seat;?>">
                      <h3><?php echo $code;?></h3>
                       <input type="hidden"name="code"value="<?php echo $code;?>">
                   </div>
                   <h4>Student Details</h4>
                   <div>ID:</div>
                   <h3><?php echo $student_id;?></h3>
                   <input type="hidden"name="student_id"value="<?php echo $student_id;?>">
                   <input type="hidden"name="active"value="NO">
                   <input type="submit"  class="btn btn-primary" name="submit" value="Confirm Course">
               </fieldset>
           </form>
<?php
    if(isset($_POST['submit']))
    {
       if($enrol_title!=$title || $enrol_id!=$student_id)

       {
         if($seat>0)
         {
          $title=$_POST['title'];
          $code=$_POST['code'];
          $student_id=$_POST['student_id'];   
          $active=$_POST['active'];   
          $sql2="INSERT INTO tbl_enrol SET
          title='$title',
          code='$code',
          student_id='$student_id',
          active='$active'
          ";
          $res2=mysqli_query($conn,$sql2);
          $sql3="UPDATE tbl_course SET active='$active' WHERE id=$course_id";
          $sql3=mysqli_query($conn,"UPDATE tbl_course SET seat = seat - 1 WHERE id=$course_id");
          if($res2==true)
          {
            header('location:'.SITEURL.'../OnlineRegistrationUniversitySystem/User/Courses.php');
          }
          else
          {
            header('location:'.SITEURL.'../OnlineRegistrationUniversitySystem/User/Courses.php');
          }
        }
       }
    }
?>
<?php include('HFOOTER.php');?>
