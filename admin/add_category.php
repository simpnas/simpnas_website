<?php

include("../config.php");
include("check_login.php");
include("header.php");	
include("nav.php");

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="categories.php">Categories</a></li>
		<li class="breadcrumb-item active">New</li>
	</ol>
</nav>

<form action="post.php" method="post">
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
	</div>
	
	<button type="submit" class="btn btn-primary btn-block" name="add_category">Create</button>
</form>

<?php 

include("footer.php");

?>