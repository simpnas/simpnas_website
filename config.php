<?php
	
	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "password";
	$database = "simpnas";

	$mysqli = mysqli_connect($dbhost, $dbusername, $dbpassword, $database);
	$config_date_format = "Y-m-d h:m:s";
	$config_app_name = "CRUD";
	$config_login_message = "Authorized Use Only!";
	$config_max_records_per_page = 5;
	$config_theme = "skin-blue";
?>
