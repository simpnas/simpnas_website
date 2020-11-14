<?php 
	
	include "config.php";
	include "header.php"; 
	include "check_login.php";
	
	$sql = mysqli_query($mysqli,"SELECT * FROM posts, users WHERE users.user_id = posts.user_id ORDER BY post_id DESC");

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2">
	<h2>Forums</h2>
	<a href="new_topic.php" class="btn btn-outline-primary">New Topic</a>
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
          $username = $row['username'];
          $post_topic = $row['post_topic'];
          $post_date = date($config_date_format,$row['post_date']);
          $sql2 = mysqli_query($mysqli,"SELECT * FROM replies, users WHERE users.user_id = replies.user_id AND post_id = $post_id ORDER BY reply_id DESC");
          $replies = mysqli_num_rows($sql2);
          $row2 = mysqli_fetch_array($sql2);
          $reply_id = $row2['reply_id'];
          $reply_username= $row2['username'];
          $reply_body = $row2['reply_body'];
          $reply_date = date($config_date_format,$row2['reply_date']);               
	        ?>
						<tr>
							<td>
								<a href="post_details.php?post_id=<?php echo $post_id; ?>"><?php echo $post_topic; ?></a>
								<p class="text-secondary">by <?php echo $username; ?> <?php echo $post_date; ?></p>
							</td>
							<td><?php echo $replies; ?></td>
							<td>
								<?php if($replies > 0){ ?>
								by <?php echo $reply_username; ?>
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

<?php include("footer.php"); ?>