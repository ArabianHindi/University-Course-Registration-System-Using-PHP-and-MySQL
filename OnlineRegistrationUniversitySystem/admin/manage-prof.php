<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class = "wrapper">
  <h1>Manage professor</h1>
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
  if(isset($_SESSION['no-title-found']))
  {
    echo $_SESSION['no-title-found'];
    unset($_SESSION['no-title-found']);
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
  <br  /><br  /><br  />
  <table class="tbl-full">
    <tr>
      <th>S.N.</th>
      <th>Title</th>
      <th>ID</th>
      <th>Email</th>
      <th>Course</th>
      <th>Actions</th>
    </tr>
    <?php
     $sql="SELECT *FROM prof";
     $res=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($res);
     $sn=1;
     if($count>0)
     {
       while($row=mysqli_fetch_assoc($res))
       {
         $id=$row['id'];
         $username=$row['username'];
         $prof_id=$row['prof_id'];
         $email=$row['email'];
         $course=$row['course'];
         ?>
         <tr>
           <td><?php echo $sn++; ?></td>
           <td><?php echo $username; ?></td>
           <td><?php echo $prof_id; ?></td>
           <td><?php echo $email; ?></td>
           <td><?php echo $course; ?></td>
           <td>
               <a href="<?php echo SITEURL;?>admin/update-prof.php?id=<?php echo $id;?>"class="btn-secondary">Update professor</a>
               <a href="<?php echo SITEURL;?>admin/delete-prof.php?id=<?php echo $id;?>"class="btn-danger">Delete professor</a>
           </td>
         </tr>
         <?php
       }
     }
     else
     {
       ?>
       <tr>
         <td colspan="6"><div class="error"> No professor Added.</div></td>
       </tr>
       <?php
     }
    ?>
  </table>

  </div>
</div>
<?php  include('partials/footer.php');  ?>
