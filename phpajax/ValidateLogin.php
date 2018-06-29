<?php
session_start();
session_unset();
session_destroy();
$_SESSION=array();
session_start();

$errorMsg = "";
$successMSG = "";

if ( !$_POST['email'] || !$_POST['password'] )
{
	$errorMsg = "أدخل اسم المستخدم وكلمة المرور.";
}

if (!$errorMsg)
{
	$alphanumeric_pattern = "/[^a-zA-Z0-9]/";
	$numeric_pattern = "/[^0-9]/";
	$email_pattern = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
	$email_pattern2 = "/[^a-zA-Z0-9\.@_-]/";
	if
	(
		!preg_match($email_pattern, $_POST['email']) === 1 || preg_match($email_pattern2, $_POST['email']) === 1 ||
		mb_strlen($_POST['password'], 'UTF-8') < 6
	)
	{
		$errorMsg = "أدخل اسم الحساب وكلمة المرور بشكل صحيح.";
	}
}

if (!$errorMsg)
{
	// Load configuration
	require( "../core/config.php" );
	//require( "../includes/functions.php" );
	
	// Database connection
	//$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_errno)
	{
		$errorMsg = "خطأ في قاعدة البيانات: (" . $conn->connect_errno . ") " .$conn->connect_error;
	}
	
	if (!$errorMsg)
	{
		$query = "SELECT * FROM users WHERE userEmail = '".$_POST['email']."' AND userPass = '".hash('sha256', $_POST['password'])."'";
		if ($result = $conn->query($query))
		{
			if (!$result->num_rows)
			{
				$errorMsg = "اسم الحساب أو كلمة المرور غير صحيحين.";
			}
			else
			{
				$row = $result->fetch_array(MYSQLI_ASSOC);
				if ($row['active'] != 1)
				{
					$errorMsg = "لم يتم تفعيل هذا الحساب بعد، يرجى التواصل مع فريق الدعم.";
				}
			}
			$result->close();
		}
		else
		{
			$errorMsg = "خطأ في قاعدة البيانات: ".$conn->error;
		}
	}
	if ($errorMsg)
	{
		$conn->close();
	}
}
/* RETURN VALUE */





$arrayToJs = array();
if($errorMsg)
{
	$arrayToJs[0]=false;
	$arrayToJs[1]=$errorMsg;
}
else
{
	//log_msg ( "OperationType [Login]\tAccountName [".$_POST['username']."]\tPassword [".$_POST['password']."]\tDate[".date ('m/d/Y H:i:s')."]\tIP [".$_SERVER['REMOTE_ADDR']."]\r\n" );
	$_SESSION['logged_in'] = true;
	$_SESSION['userid'] = $row['userId'];
	$_SESSION['user'] = $row['userName'];
	//$_SESSION['fullname'] = $row['fullname'];
	$_SESSION['email'] = $row['userEmail'];
	$_SESSION['address'] = $row['address'];
	//$_SESSION['city'] = $row['city'];
	$_SESSION['mobile'] = $row['mobile'];
	$_SESSION['confirmed'] = $row['active'];
	//$_SESSION['banned'] = $row['banned'];
	$_SESSION['rank'] = $row['rank'];
	//$_SESSION['deviceprice'] = $row['deviceprice'];
	//$_SESSION['creationdate'] = $row['creationdate'];
	$_SESSION['confirmation_email'] = $row['userEmail'];
	$_SESSION['page']="dashboard";
	$arrayToJs[0] = true;
	$arrayToJs[1] = $successMsg;
	$conn->close();
}

echo json_encode ($arrayToJs);
//echo json_encode($_SESSION['rank']);



?>