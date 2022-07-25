<?php include('partials/menu.php'); ?>


  <!--main content Starts-->
  <div class="main-content">
    <div class = "wrapper">
        <h1><strong>Mange Admin</strong></h1>
        <?php

           if(isset($_SESSION['user-not-found']))
           {
             echo $_SESSION['user-not-found'];
             unset($_SESSION['user-not-found']);
           }
           if(isset($_SESSION['pwd-not-match']))
           {
             echo $_SESSION['pwd-not-match'];
             unset($_SESSION['pwd-not-match']);
           }
           if(isset($_SESSION['change-pwd']))
           {
             echo $_SESSION['change-pwd'];
             unset($_SESSION['change-pwd']);
           }

        ?>
        <br  /><br  />

        <!--button to add Admin -->
        <a href="add-admin.php"class="btn-primary">Add Admin</a>
        <br  /><br  /><br  />
        <table class="tbl-full">
          <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>
          <?php
             $sql="SELECT *FROM tbl_admin";
             $res=mysqli_query($conn,$sql);

             if($res==TRUE)
             {
               $count=mysqli_num_rows($res);
               $sn=1;//counter for id

               if($count>0)
               {
                 while ($rows=mysqli_fetch_assoc($res))
                 {
                   $id=$rows['id'];
                   $full_name=$rows['full_name'];
                   $username=$rows['username'];
                   ?>
                   <tr>
                     <td><?php echo $sn++?></td>
                     <td><?php echo $full_name?></td>
                     <td><?php echo $username?></td>
                     <td>
                       <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>"class="btn-primary" >change password</a>
                         <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>"class="btn-secondary">Update Admin</a>
                         <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>"class="btn-danger">Delete Admin</a>
                     </td>

                   </tr>
                   <?php


                 }

               }
               else
               {

               }
             }
           ?>

        </table>


      </div>
    </div>
  </div>
  <!--main content ends-->

  <?php include('partials/footer.php'); ?>
