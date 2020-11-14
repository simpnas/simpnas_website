<?php

	session_start();
	
	if(!isset($_SESSION['user_id'])){
	    header("Location: login.php");
	    die;
	}

	$session_user_id = $_SESSION['user_id'];
	$session_user_email = $_SESSION['user_email'];
	$session_username = $row['username'];
	$session_user_access = $row['user_access'];
	$session_user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  $session_user_agent = $_SERVER['HTTP_USER_AGENT'];

?>