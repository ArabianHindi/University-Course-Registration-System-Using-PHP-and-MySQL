<?php include('partials/menu.php') ?>
<div class="main-content">
  <div class = "wrapper">
  <h1>Manage Pay</h1>
  <br  /><br  /><br  />
  <table class="tbl-full">
    <tr>
      <th>S.N.</th>
      <th>Student ID</th>
      <th>Title</th>
      <th>Code</th>
    </tr>
    <?php
     $sql="SELECT *FROM pay";
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

         ?>
         <tr>
           <td><?php echo $sn++; ?></td>
           <td><?php echo $student_id; ?></td>
           <td><?php echo $title; ?></td>
           <td><?php echo $code; ?></td>

        </tr>
         <?php
       }
     }
     else
     {
       ?>
       <tr>
         <td colspan="6"><div class="error"> No Students Payed.</div></td>
       </tr>
       <?php
     }
    ?>
  </table>
  </div>
</div>
<?php  include('partials/footer.php');  ?>
