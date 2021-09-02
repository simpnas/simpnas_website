<?php

include("../config.php");
include("check_login.php");
include("header.php");	
include("nav.php");

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="blogs.php">Blog Posts</a></li>
		<li class="breadcrumb-item active">New</li>
	</ol>
</nav>

<form action="post.php" method="post">
	<div class="form-group">
		<input type="text" class="form-control form-control-lg" name="title" placeholder="Title" required autofocus>
	</div>
	<div class="form-group">
		<textarea class="form-control" id="summernote" name="content"></textarea>
	</div>
	<button type="submit" class="btn btn-primary btn-lg btn-block" name="add_blog">Create</button>
</form>

<?php 

include("footer.php");

?>