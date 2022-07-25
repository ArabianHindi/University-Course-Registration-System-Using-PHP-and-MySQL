<?php include('partials/menu.php'); ?>
  <!--main content Starts-->
  <div class="main-content">
    <div class = "wrapper">
      <h1><strong>DASHBOARD</strong></h1>
      <br><br>
      <?php
       if(isset($_SESSION['login']))
       {
         echo $_SESSION['login'];
         unset($_SESSION['login']);
       }
      ?>
         <br><br>
      <div class="col-4 text-center">
        <?php
        $sql="SELECT *FROM tbl_course";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
          <h1><?php echo $count;?></h1>
          <br>
          Courses
      </div>
      <div class="col-4 text-center">
        <?php
        $sql="SELECT *FROM prof";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
          <h1><?php echo $count;?></h1>
          <br>
          Professors
      </div>
      <div class="col-4 text-center">
        <?php
        $sql="SELECT *FROM users";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
          <h1><?php echo $count;?></h1>
          <br>
          Students
      </div>
      <div class="col-4 text-center">
        <?php
        $sql="SELECT *FROM tbl_enrol";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
          <h1><?php echo $count;?></h1>
          <br>
          Enroll
      </div>
      <div class="col-4 text-center">
        <?php
        $sql="SELECT *FROM pay";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        ?>
          <h1><?php echo $count;?></h1>
          <br>
          paid
      </div>
      <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--main content ends-->
<?php  include('partials/footer.php');  ?>
