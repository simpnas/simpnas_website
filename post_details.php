<?php 
	
	include "config.php";
	include "header.php"; 
	include "check_login.php";
	
	if(isset($_GET['post_id'])){
  	$post_id = intval($_GET['post_id']);
  	$sql = mysqli_query($mysqli,"SELECT * FROM posts, users WHERE post_id = $post_id AND posts.user_id = users.user_id");
  	$row = mysqli_fetch_array($sql);
    $post_topic = $row['post_topic'];
    $post_body = $row['post_body'];
    $post_date = date($config_date_format,$row['post_date']);
    $username = $row['username'];
	}

	$sql = mysqli_query($mysqli,"SELECT * FROM posts, users WHERE users.user_id = posts.user_id");

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="forums.php">Forums</a></li>
    <li class="breadcrumb-item active" aria-current="page">Post Details</li>
  </ol>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2">
	<h2><?php echo $post_topic; ?></h2>
	<a href="forums.php" class="btn btn-outline-primary">Back</a>
</div>

<div class="table-responsive">
	<table class="table table-hover table-bordered">	
	    <thead>	
	        <tr>	
	            <th><?php echo $post_date; ?> by <?php echo $username; ?></th>
			</tr>
		</thead>
	    <tbody>
	    	<td><?php echo $post_body; ?></td>
	    </tbody>
	</table>
</div>

<?php 
		
	$sql = mysqli_query($mysqli,"SELECT * FROM replies, users WHERE users.user_id = replies.user_id AND post_id = $post_id");

?>

<?php

				while($row = mysqli_fetch_array($sql)){
	                $reply_id = $row['reply_id'];
	                $username = $row['username'];
	                $reply_body = $row['reply_body'];
	                $reply_date = date($config_date_format,$row['reply_date']);               
?>


<div class="table-responsive">
	<table class="table table-hover table-bordered">	
	    <thead>	
	        <tr>	
	            <th><?php echo $reply_date; ?> by <?php echo $username; ?></th>
			</tr>
		</thead>
	    <tbody>
			<tr>
				<td><?php echo $reply_body; ?></td>
			</tr>
	    </tbody>
	</table>
</div>

<?php } ?>

<?php if($_SESSION['logged']){ ?>
	 
<h4>Post a Reply</h4>
<form method="post" action="post.php">
  <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
  <div class="form-group">
    <textarea class="form-control" name="body" rows=5 autofocus required></textarea>
  </div>
  <button type="submit" name="reply" class="btn btn-primary">Reply</button>
</form>

<?php } ?>

<?php include("footer.php"); ?>