<?php include('HMENU.php');?>
    <section class="food-search text-center">
        <div class="container">
          <?php
          $search=mysqli_real_escape_string($conn,$_POST['search']);
          ?>
            <h2>Student on Your Search <a href="#"><?php echo $search;?></a></h2>
        </div>
            <?php
             $sql= "SELECT * FROM  users WHERE username LIKE '%$search%' OR student_id LIKE '%$search%'";
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
                      <a href="<?php echo SITEURL;?>professor/update-Student.php?id=<?php echo $id;?>"class="btn-secondary">Update Student</a>
                      <br>
                   </div>
                   </a>
                   <?php
                 }
               }
             }
             else
             {
               echo "<div class='error'>Courses Not Added.</div>";
             }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
