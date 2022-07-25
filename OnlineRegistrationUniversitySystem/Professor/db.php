<?php
//start Session
session_start();
define('SITEURL','http://localhost/OnlineRegistrationUniversitySystem/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','OOP');
//save data in database
$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_erroe());//database
$db_select=mysqli_select_db($conn,DB_NAME) or die (mysqli_erroe());


 ?>
