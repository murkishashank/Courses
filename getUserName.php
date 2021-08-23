<?php
	include('dbConnection.php');
	if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
		$profile = new stdClass();
		$profile->userName = $_SESSION['USER_NAME'];
		$response = json_encode($profile);
	}else{
		header('location:login.php');
		die();
	}
	echo $response;
?>