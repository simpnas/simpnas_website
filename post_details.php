<?php 
	
	include "config.php";
	include "header.php"; 
	include "check_login.php";
	
	if(isset($_GET['post_id'])){
  	$post_id = intval($_GET['post_id']);
  	$sql = mysqli_query($mysqli,"SELECT * FROM posts, users WHERE post_id = $post_id AND post_by = user_id");
  	$row = mysqli_fetch_array($sql);
    $post_topic = $row['post_topic'];
    $post_content = $row['post_content'];
    $post_date = date($config_date_time_format, strtotime($row['post_date']));
    $username = $row['user_name'];
	}

	$sql = mysqli_query($mysqli,"SELECT * FROM posts, users WHERE user_id = post_by");

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
	    	<td><?php echo $post_content; ?></td>
	    </tbody>
	</table>
</div>

<?php 
		
	$sql = mysqli_query($mysqli,"SELECT * FROM replies, users WHERE user_id = reply_by AND post_id = $post_id");

?>

<?php

				while($row = mysqli_fetch_array($sql)){
	                $reply_id = $row['reply_id'];
	                $username = $row['user_name'];
	                $reply_content = $row['reply_content'];
	                $reply_date = date($config_date_time_format, strtotime($row['reply_date']));           
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
				<td><?php echo $reply_content; ?></td>
			</tr>
	    </tbody>
	</table>
</div>

<?php } ?>

<?php if($_SESSION['logged']){ ?>
	
<form method="post" action="post.php">
  <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
  <div class="form-group">
    <textarea class="form-control" name="content" rows=5 placeholder="Your reply" autofocus required></textarea>
  </div>
  <button type="submit" name="reply" class="btn btn-primary">Reply</button>
</form>

<?php } ?>

<?php include("footer.php"); ?>