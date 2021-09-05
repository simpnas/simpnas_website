<?php

include("../config.php");
include("check_login.php");
include("header.php");	
include("nav.php");

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="polls.php">Polls</a></li>
		<li class="breadcrumb-item active">New</li>
	</ol>
</nav>

<form action="post.php" method="post">
	<div class="form-group">
		<input type="text" class="form-control form-control-lg" name="name" placeholder="Poll Name" required autofocus>
	</div>
	<button type="submit" class="btn btn-primary btn-lg btn-block" name="add_poll">Create</button>
</form>

<?php 

include("footer.php");

?>