<?php

include("../config.php");
include("header.php");	

$user_id = intval($_GET['user_id']);
$token = mysqli_real_escape_string($mysqli,$_GET['token']);

$sql = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id = $user_id AND user_token = '$token'");

if(mysqli_num_rows($sql) == 1){
	$row = mysqli_fetch_array($sql);


?>

	<h1 class="text-center">Reset Password</h1>

	<form action="post.php" method="post">

		<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
		
		<div class="form-group">
			<label>New Password</label>
			<input type="password" class="form-control" name="password" autofocus>
		</div>
		
		<button type="submit" class="btn btn-primary" name="reset_password">Reset</button>
		<a href="login.php" class="text-secondary float-right">Back to login</a>

	</form>

<?php 

}

include("footer.php");

?>