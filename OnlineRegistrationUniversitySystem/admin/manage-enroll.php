<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class = "wrapper">
  <h1>Manage enroll</h1>
  <br><br>
  <table class="tbl-full">
    <tr>
      <th>S.N.</th>
      <th>student_id</th>
      <th>Title</th>
      <th>Code</th>
      <th>Paid</th>

    </tr>
    <?php
     $sql="SELECT *FROM tbl_enrol";
     $res=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($res);
     $sn=1;
     if($count>0)
     {
       while($row=mysqli_fetch_assoc($res))
       {
         $id=$row['id'];
         $student_id=$row['student_id'];
         $title=$row['title'];
         $code=$row['code'];
         $active=$row['active'];
         ?>
         <tr>
           <td><?php echo $sn++; ?></td>
           <td><?php echo $student_id; ?></td>
           <td><?php echo $title; ?></td>
           <td><?php echo $code; ?></td>
           <td><?php echo $active; ?></td>

         </tr>
         <?php
       }
     }
     else
     {
       ?>
       <tr>
         <td colspan="6"><div class="error"> No Cousrses enroled.</div></td>
       </tr>
       <?php
     }
    ?>
  </table>
  </div>
</div>
<?php  include('partials/footer.php');  ?>
