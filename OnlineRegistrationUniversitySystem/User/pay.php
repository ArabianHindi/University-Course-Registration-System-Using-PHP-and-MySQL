<?php include('HMENU.php');?>
     <section class="categories">
         <div class="container">
             <h2 class="text-center">Courses Available For Payment </h2>
             <?php
              $sql="SELECT * FROM `tbl_enrol` WHERE `student_id`='$_SESSION[student_id]' AND  active='NO'";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              if($count>0)
              {
                if($count>0)
                {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id=$row['id'];
                    $student_id=$row['student_id'];
                    $title=$row['title'];
                    $code=$row['code'];
                    ?>
                    <div class="box-3 float-container">
                    <h1 style="background-color:powderblue;">ID:</h1> <h1 ><?php echo $student_id;?></h1>
                       <br>
                       <h1 style="background-color:powderblue;">Course Name:</h1> <h1 ><?php echo $title;?></h1>
                       <br>
                       <h1 style="background-color:powderblue;">Course Code:</h1><h1 ><?php echo $code;?></h1>
                       <br>
                       <a href="<?php SITEURL;?>payfun.php?enrol_id=<?php echo $id;?>" class="btn btn-primary">Pay Now</a>
                       
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
             <br>
         </div>
     </section>
     <?php include('HFOOTER.php');?>
 