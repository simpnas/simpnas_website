<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php"); 

if(isset($_GET['doc_id'])){
	
	$doc_id = intval($_GET['doc_id']);
	
	$query = mysqli_query($mysqli,"SELECT * FROM docs WHERE doc_id = $doc_id");
	
	$row = mysqli_fetch_array($query);
	
	$title = $row['doc_title'];
	$body = $row['doc_body'];

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="docs.php">Docs</a></li>
		<li class="breadcrumb-item active">Edit / <?php echo $title; ?></li>
	</ol>
</nav>

<?php 

	if(isset($_SESSION['response'])){
		echo $_SESSION['response'];
		$_SESSION['response'] = '';
	}

?>

<form action="post.php" method="post">
	<input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>">
	<div class="form-group">
		<input type="text" class="form-control form-control-lg" name="title" value="<?php echo $title; ?>">
	</div>
	<div class="form-group">
		<textarea class="form-control" id="summernote" name="body"><?php echo $body; ?></textarea>
	</div>
	<button type="submit" class="btn btn-primary btn-lg btn-block" name="edit_doc">Submit</button>
</form>

<?php 
	
}

include("footer.php");

?>