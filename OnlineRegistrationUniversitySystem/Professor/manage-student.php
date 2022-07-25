<?php include('HMENU.php');?>
<section>
            <h2 class="text-center">student Now Abaliable</h2>
            <?php
             $sql="SELECT *FROM users";
             $res=mysqli_query($conn,$sql);
             $count=mysqli_num_rows($res);
             if($count>0)
             {
               if($count>0)
               {
                 while($row=mysqli_fetch_assoc($res))
                 {
                   $id=$row['id'];
                   $username=$row['username'];
                   $student_id=$row['student_id'];
                   ?>
                   <div class="box-3 float-container">
                      <h1 style="background-color:powderblue;">student Name:</h1> <h1 ><?php echo $username;?></h1>
                      <br>
                      <h1 style="background-color:powderblue;">student Code:</h1><h1 ><?php echo $student_id;?></h1>
                      <br>
                   </div>
                   </a>
                   <?php
                 }
               }
             }
             else
             {
               echo "<div class='error'>Student Not Added.</div>";
             }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <?php include('HFOOTER.php');?>
