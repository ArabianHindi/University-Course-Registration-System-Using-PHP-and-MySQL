<?php include('HMENU.php');?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Course Now Abaliable</h2>
            <?php
             $sql="SELECT *FROM tbl_course WHERE active='Yes'";
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
                   $seat=$row['seat'];
                   ?>
                   <div class="box-3 float-container">
                      <h1 style="background-color:powderblue;">Course Name:</h1> <h1 ><?php echo $title;?></h1>
                      <br>
                      <h1 style="background-color:powderblue;">Course Code:</h1><h1 ><?php echo $code;?></h1>
                      <br>
                      <h1 style="background-color:powderblue;">Course Seats:</h1> <h1 ><?php echo $seat;?></h1>
                      <a href="<?php SITEURL;?>enroll.php?course_id=<?php echo $id;?>" class="btn btn-primary">ADD Now</a>
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
    <?php include('HFOOTER.php');?>
