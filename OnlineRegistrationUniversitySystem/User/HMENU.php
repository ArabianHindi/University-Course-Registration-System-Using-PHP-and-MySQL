<?php include('../config/constants.php');
include('login-check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineRegistrationUniversitySystem</title>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/admin.css">

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
                    <div class="menu text-right">
                <ul>
                <li> <a href="courses.php">Courses</a></li>
                <li> <a href="pay.php">PAY</a></li>
                <li> <a href="After-Pay.php">After-pay</a></li>
                <li> <a href="Absent.php">Absent&Grades</a></li>

                  <li> <a href="logout.php">Logout</a></li>
                    <li>
  			            <?php
  			            	$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `student_id`='$_SESSION[student_id]'");
  			            	$fetch = mysqli_fetch_array($query);
  				            echo "<h2   style='background-color:powderblue;text-align: center; '>YOUR ID IS:".$fetch['student_id']."</h2>";
  			            ?>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
