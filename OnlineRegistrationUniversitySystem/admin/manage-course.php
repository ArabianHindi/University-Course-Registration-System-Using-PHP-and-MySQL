<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class = "wrapper">
  <h1>Manage Courses</h1>
  <br  /><br  />
  <?php
  if(isset($_SESSION['add']))
  {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
  }
  if(isset($_SESSION['remove']))
  {
    echo $_SESSION['remove'];
    unset($_SESSION['remove']);
  }
  if(isset($_SESSION['delete']))
  {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
  }
  if(isset($_SESSION['no-course-found']))
  {
    echo $_SESSION['no-course-found'];
    unset($_SESSION['no-course-found']);
  }
  if(isset($_SESSION['update']))
  {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
  }
  if(isset($_SESSION['upload']))
  {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
  }
  if(isset($_SESSION['faild-remove']))
  {
    echo $_SESSION['faild-remove'];
    unset($_SESSION['faild-remove']);
  }
  ?>
  <br><br>
  <!--button to add Admin -->
  <a href="<?php echo SITEURL;?>admin/add-course.php"class="btn-primary">Add Course</a>
  <br  /><br  /><br  />
  <table class="tbl-full">
    <tr>
      <th>S.N.</th>
      <th>Title</th>
      <th>Code</th>
      <th>Seats</th>
      <th>Active</th>
      <th>Actions</th>
    </tr>
    <?php
     $sql="SELECT *FROM tbl_course";
     $res=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($res);
     $sn=1;
     if($count>0)
     {
       while($row=mysqli_fetch_assoc($res))
       {
         $id=$row['id'];
         $title=$row['title'];
         $code=$row['code'];
         $seat=$row['seat'];
         $active=$row['active'];
         ?>
         <tr>
           <td><?php echo $sn++; ?></td>
           <td><?php echo $title; ?></td>
           <td><?php echo $code; ?></td>
           <td><?php echo $seat; ?></td>
           <td><?php echo $active; ?></td>
           <td>
               <a href="<?php echo SITEURL;?>admin/update-course.php?id=<?php echo $id;?>"class="btn-secondary">Update Course</a>
               <a href="<?php echo SITEURL;?>admin/delete-course.php?id=<?php echo $id;?>"class="btn-danger">Delete Course</a>
           </td>
         </tr>
         <?php
       }
     }
     else
     {
       ?>
       <tr>
         <td colspan="6"><div class="error"> No Cousrses Added.</div></td>
       </tr>
       <?php
     }
    ?>
  </table>

  </div>
</div>
<?php  include('partials/footer.php');  ?>
