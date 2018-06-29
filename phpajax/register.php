<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: Repairs.php");
 }

 include_once '../core/config.php';
 
 $error = false;

 //if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['fullname']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  
  $pass = trim($_POST['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
   echo "Name must contain alphabets and space.";
   echo"Redirecting to Log in page...";
	header( "refresh:5; url=../login.php" );
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
   	echo"provided email is already in use";
	echo"Redirecting to Log in page...";
	header( "refresh:5; url=../login.php" );

  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($conn,$query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
	echo"provided email is already in use";
	echo"<br/>"."<br/>"."<br/>";
	echo"Redirecting to Log in page...";
	//header( "refresh:5; url=../login.php" );
	header('url=../');
	exit;
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
   echo"Password must have atleast 6 characters.";
   echo"Redirecting to Log in page...";
	header( "refresh:5; url=../login.php" );
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,userEmail,userPass,active) VALUES('$name','$email','$password','0')";
   $res = mysqli_query($conn,$query);
   
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
	echo"Successfully Registered wait until your account is activated...";
	echo"Redirecting to Log in page...";
	//header( "refresh:5; url=../login.php" ); 
	header('Location:../');
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
	echo"Something went wrong, try again later...";
	echo"Redirecting to Log in page...";
	header( "refresh:5; url=../login.php" );
   } 
    
  }
  
  
 //}
// else{echo "error";}
?>