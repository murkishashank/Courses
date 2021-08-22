<?php
	include('dbConnection.php');
	$profile = new stdClass();
	$profile->userName = $_SESSION['USER_NAME'];
	$response = json_encode($profile);
	echo $response;
?>