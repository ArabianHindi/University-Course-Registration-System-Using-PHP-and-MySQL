<?php include('HMENU.php');?>
<?php
if(isset($_GET['enrol_id']))
{
  $enrol_id=$_GET['enrol_id'];
  $sql="SELECT * FROM tbl_enrol WHERE id=$enrol_id";
  $res=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($res);
  if($count==1)
  {
    $row=mysqli_fetch_assoc($res);
    $title=$row['title'];
    $code=$row['code'];
    $student_id=$row['student_id'];
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
<section>
       <div class="container">
           <form action=""method="POST">
               <fieldset>
                   <h4>Selected Course</h4>
                   <div>
                       <h3><?php echo $title;?></h3>
                       <input type="hidden"name="title"value="<?php echo $title;?>">
                       <h3><?php echo $student_id;?></h3>
                       <input type="hidden"name="student_id"value="<?php echo $student_id;?>">
                      <h3><?php echo $code;?></h3>
                       <input type="hidden"name="code"value="<?php echo $code;?>">
                   </div>
                   <tr>
                      <td></td>
                      <td>
                      <input type="hidden"name="active"value="YES">
                      </td>
                    </tr>

                   <input type="submit" class="btn btn-primary" name="submit" value="Confirm Pay">
               </fieldset>
           </form>
<?php
    if(isset($_POST['submit']))
    {

      $title=$_POST['title'];
      $code=$_POST['code'];
      $student_id=$_POST['student_id'];   
      $active=$_POST['active'];   
      $sql2="INSERT INTO pay SET
      title='$title',
      code='$code',
      student_id='$student_id'
      ";
      $res2=mysqli_query($conn,$sql2);
      $sql="UPDATE tbl_enrol SET active='$active' WHERE id=$enrol_id";
    $res=mysqli_query($conn,$sql);

      if($res2==true)
      {
        header('location:'.SITEURL.'../OnlineRegistrationUniversitySystem/User/pay.php');
      }
      else
      {
        header('location:'.SITEURL.'../OnlineRegistrationUniversitySystem/User/pay.php');
      }
    }
?>
<?php include('HFOOTER.php');?>
