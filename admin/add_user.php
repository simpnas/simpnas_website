<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php");	

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="users.php">Users</a></li>
		<li class="breadcrumb-item active">New</li>
	</ol>
</nav>

<form action="post.php" method="post">
	
	<div class="form-group">
		<label>Access</label>
		<select class="form-control" name="access">
			<option value="1">User</option>
			<option value="9">Admin</option>
		</select>
	</div>

	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" autofocus>
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" autofocus>
	</div>
	
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password">
	</div>


	
	<button type="submit" class="btn btn-primary btn-block" name="add_user">Create</button>

</form>

<?php 

include("footer.php");

?>
