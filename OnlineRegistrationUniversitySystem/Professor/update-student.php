<?php include('HMENU.php');?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Student Courses Avaliable</h2>
            <?php
              $sql="SELECT *FROM prof  WHERE `prof_id`='$_SESSION[prof_id]' ";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              if($count>0)
              {
                while($row=mysqli_fetch_assoc($res))
                {
                  $title=$row['course'];
                  ?>
                  <?php
                }
              }
             $sql="SELECT *FROM tbl_enrol WHERE active='Yes' AND title='$title'";
             $res=mysqli_query($conn,$sql);
             $count=mysqli_num_rows($res);
             if($count>0)
             {
               if($count>0)
               {
                 while($row=mysqli_fetch_assoc($res))
                 {
                   $id=$row['id'];
                   $title=$row['title'];
                   $code=$row['code'];
                   $student_id=$row['student_id'];
                   $absent=$row['absent'];
                   $grade=$row['grade'];
                   ?>
                   <div class="box-3 float-container">
                      <h1 style="background-color:powderblue;">student_id:</h1> <h1 ><?php echo $student_id;?></h1>
                      <br>
                      <h1 style="background-color:powderblue;">Course Name:</h1> <h1 ><?php echo $title;?></h1>
                      <br>
                      <h1 style="background-color:powderblue;">Course Code:</h1><h1 ><?php echo $code;?></h1>
                      <br>
                      <h1 style="background-color:powderblue;">Absent Time:</h1><h1 ><?php echo $absent;?></h1>
                      <br>
                      <h1 style="background-color:powderblue;">Grade :</h1><h1 ><?php echo $grade;?></h1>
                      <a href="<?php echo SITEURL;?>professor/update-Student-enroll.php?id=<?php echo $id;?>"class="btn-secondary">Update Student</a>

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
