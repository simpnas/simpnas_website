<?php 
	
include "config.php";
include "header.php"; 
include "check_login.php";

if($config_module_forum_enabled == 1){

$sql = mysqli_query($mysqli,"SELECT * FROM posts, users WHERE user_id = post_by ORDER BY post_id DESC");

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2">
	<h2>Forums</h2>
	<?php if($_SESSION['logged']){ ?>
	<a href="new_topic.php" class="btn btn-outline-primary">New Topic</a>
	<?php } ?>
</div>

<div class="table-responsive">
	<table class="table table-hover">	
	    <thead>	
	        <tr>	
	            <th>Topic</th>
	            <th>Replies</th>
	            <th>Last Post</th>
			</tr>
		</thead>
	    <tbody>
			
	      <?php

				while($row = mysqli_fetch_array($sql)){
          $post_id = $row['post_id'];
          $username = $row['user_name'];
          $post_topic = $row['post_topic'];
          $post_date = date($config_date_time_format, strtotime($row['post_date']));
          
          $sql_replies = mysqli_query($mysqli,"SELECT * FROM replies, users WHERE users.user_id = replies.reply_by AND post_id = $post_id ORDER BY reply_id DESC");
          $replies = mysqli_num_rows($sql_replies);
          $row = mysqli_fetch_array($sql_replies);
          $reply_id = $row['reply_id'];
          $reply_by = $row['user_name'];
          $reply_body = $row['reply_body'];
          $reply_date = date($config_date_time_format, strtotime($row['reply_date']));               
	        ?>
						<tr>
							<td>
								<a href="post_details.php?post_id=<?php echo $post_id; ?>"><?php echo $post_topic; ?></a>
								<p class="text-secondary">by <?php echo $username; ?> <?php echo $post_date; ?></p>
							</td>
							<td><?php echo $replies; ?></td>
							<td>
								<?php if($replies > 0){ ?>
								by <?php echo $reply_by; ?>
								<br>
								<?php echo $reply_date; ?>
								<?php }else{ echo "-"; } ?>
							</td>
						</tr>
			<?php
				}
			?>
		
	    </tbody>
	</table>
</div>

<?php }else{ ?>

404 Error (Module Not Enabled)

<?php } ?>

<?php include("footer.php"); ?>