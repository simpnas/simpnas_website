<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php"); 

if(isset($_GET['link_id'])){
	
	$link_id = intval($_GET['link_id']);
	
	$query = mysqli_query($mysqli,"SELECT * FROM links WHERE link_id = $link_id");
	
	$row = mysqli_fetch_array($query);
	
	$name = $row['link_name'];
	$url = $row['link_url'];

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="links.php">Links</a></li>
		<li class="breadcrumb-item active"><?php echo $name; ?></li>
	</ol>
</nav>

<?php 

	if(isset($_SESSION['response'])){
		echo $_SESSION['response'];
		$_SESSION['response'] = '';
	}

?>

<form action="post.php" method="post">
	<input type="hidden" name="link_id" value="<?php echo $link_id; ?>">
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
	</div>

	<div class="form-group">
		<label>URL</label>
		<input type="text" class="form-control" name="url" value="<?php echo $url; ?>">
	</div>

	<button type="submit" class="btn btn-primary btn-block" name="edit_link">Save</button>
</form>

<?php 
	
}

include("footer.php");

?>