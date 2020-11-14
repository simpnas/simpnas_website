<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php");

if(isset($_GET['user_id'])){
	
	$user_id = intval($_GET['user_id']);
	
	$query = mysqli_query($mysqli,"SELECT * FROM users WHERE users.user_id = $user_id");
	
	$row = mysqli_fetch_array($query);
	
	$email = $row['user_email'];
	$password = $row['user_password'];

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="users.php">Users</a></li>
		<li class="breadcrumb-item active">Edit <?php echo "$email"; ?></li>
	</ol>
</nav>

<?php 

	if(isset($_SESSION['response'])){
		echo $_SESSION['response'];
		$_SESSION['response'] = '';
	}

?>

<form action="post.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
	<input type="hidden" name="current_password_hash" value="<?php echo $password; ?>">
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
	</div>
	<button type="submit" class="btn btn-primary btn-block" name="edit_user">Submit</button>
</form>

<?php 
	
}

include("footer.php");

?>