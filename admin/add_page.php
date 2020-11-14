<?php

include("../config.php");
include("check_login.php");
include("header.php");	
include("nav.php");

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="pages.php">Pages</a></li>
		<li class="breadcrumb-item active">Add</li>
	</ol>
</nav>

<form action="post.php" method="post">
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" required autofocus>
	</div>
	<div class="form-group">
		<textarea class="form-control" id="summernote" name="content"></textarea>
	</div>
	<button type="submit" class="btn btn-primary btn-block" name="add_page">Submit</button>
</form>

<?php 

include("footer.php");

?>