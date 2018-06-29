<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: ../login.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: index.php");
 }
 
 if (isset($_GET['logout'])) {
	unset($_SESSION['user']);
	unset($_SESSION['logged_in']) ;
	unset($_SESSION['userid']) ;
	unset($_SESSION['user']) ;
	//$_SESSION['fullname'] = $row['fullname'];
	unset($_SESSION['email']) ;
	//$_SESSION['address'] = $row['address'];
	//$_SESSION['city'] = $row['city'];
	//$_SESSION['mobile'] = $row['mobile'];
	unset($_SESSION['confirmed']) ;
	//$_SESSION['banned'] = $row['banned'];
	unset($_SESSION['rank']) ;
	//$_SESSION['deviceprice'] = $row['deviceprice'];
	//$_SESSION['creationdate'] = $row['creationdate'];
	unset($_SESSION['confirmation_email']) ;
	unset($_SESSION['page']);
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit;
 }