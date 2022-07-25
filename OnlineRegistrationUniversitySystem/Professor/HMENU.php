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
    <head>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
                    <div class="menu text-right">
                <ul>
                  <li> <a href="index.php">Search</a></li>
                  <li> <a href="manage-student.php">Student</a></li>
                  <li> <a href="update-student.php">U-Student</a></li>
                  <li> <a href="logout.php">Logout</a></li>
                    <li>
  			<?php
  				$query = mysqli_query($conn, "SELECT * FROM `prof` WHERE `prof_id`='$_SESSION[prof_id]'") ;
  				$fetch = mysqli_fetch_array($query);

  				echo "<h2   style='background-color:powderblue;text-align: center; '>Professor_ID:".$fetch['prof_id']."</h2>";
                echo "<h2   style='background-color:powderblue;text-align: center; '>Professor_Course:".$fetch['course']."</h2>";

  			?>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
