<?php

include("../config.php");
include("header.php");

session_start();	

?>

<h1 class="text-center">Admin Login</h1>

<?php 

	if(isset($_SESSION['response'])){
		echo $_SESSION['response'];
	}

?>

<form action="post.php" method="post">

	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" autofocus>
	</div>
	
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password">
	</div>
	
	<button type="submit" class="btn btn-primary mr-2" name="login">Login</button>
	<!-- <a href="forgot_password.php">Forgot Password</a> -->

</form>

<?php 

include("footer.php");

?>