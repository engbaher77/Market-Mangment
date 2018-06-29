<?php
define ('SITE_AREA',true);
session_start();

require_once("core/config.php");

if (isset($_SESSION['user'])){
	if ( isset($_POST['requestedpage']) )
	{
		$requestedpage = $_POST['requestedpage'];
		$pages = array("dashboard", "repairs","purchases","inventory","user_profile","vendor_client_list","vendor_client_balance","vendor_client_payment");
		if(in_array($requestedpage,$pages))
		{
			$_SESSION['page']=$requestedpage;
			header('Location:./');
			exit();
		}
	}
	include ("main.php");
	
}
else {	include("login.php");	}

/*
echo '<pre dir="ltr">';
print_r($_SESSION);
echo '</pre>';
*/
?>