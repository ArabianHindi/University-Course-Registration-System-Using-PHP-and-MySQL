<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, check and create user session.
    if (isset($_POST['prof_id'])) {
          $prof_id = stripslashes($_REQUEST['prof_id']);    // removes backslashes
          $prof_id = mysqli_real_escape_string($conn,$prof_id);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `prof` WHERE prof_id='  $prof_id'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) ;
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['prof_id'] = $prof_id;
            // Redirect to user dashboard page
            header('location:'.SITEURL.'../OnlineRegistrationUniversitySystem/professor/index.php');
        } else {
            echo "<div class='form'>
                  <h3>Incorrect ID/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="prof_id" placeholder="Professor_ID" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>
