<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php");	

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="users.php">Users</a></li>
		<li class="breadcrumb-item active">Add</li>
	</ol>
</nav>

<form action="post.php" method="post">
	
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" autofocus>
	</div>
	
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password">
	</div>
	
	<button type="submit" class="btn btn-primary btn-block" name="add_user">Submit</button>

</form>

<?php 

include("footer.php");

?>
