<?php
	
	session_start();

  $session_user_id = $_SESSION['user_id'];

	$sql = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id = $session_user_id");
	$row = mysqli_fetch_array($sql);
	$session_user_email = $row['user_email'];
	$session_username = $row['user_name'];
	$session_user_access = $row['user_access'];
	
	$session_user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  $session_user_agent = $_SERVER['HTTP_USER_AGENT'];
	
?>