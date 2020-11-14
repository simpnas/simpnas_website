<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php");

//if($session_user_access > 2){

	$query = mysqli_query($mysqli,"SELECT * FROM users");

	?>

	<h1>Users</h1>

	<hr>

	<a href="add_user.php" class="btn btn-primary float-right mb-3">Add User</a>

	<div class="table-responsive">

		<table class="table border">
			<thead class="thead-light">
				<tr>
					<th>Username</th>
          <th>Email</th>
          <th>IP</th>
          <th>Browser</th>
					<th>Access</th>
					<th>Last Active</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				
				<?php 

				while($row = mysqli_fetch_array($query)){
				
					$user_id = $row['user_id'];
					$email = $row['user_email'];
					$username = $row['username'];
	        $user_access = $row['user_access'];

	        $sql_events = mysqli_query($mysqli,"SELECT * FROM events WHERE user_id = $user_id ORDER BY event_id DESC LIMIT 1");
	        $row = mysqli_fetch_array($sql_events);
	        $ip = $row['event_ip'];
	        $user_agent = $row['event_user_agent'];
	        $event_timestamp = $row['event_timestamp'];
					
					?>
					
					<tr>	
						<td><a href="edit_user.php?user_id=<?php echo $user_id; ?>"><?php echo $email; ?></a></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $ip; ?></td>
						<td><small><?php echo $user_agent; ?></small></td>
						<td><?php echo $user_access; ?></td>
						<td><?php echo $event_timestamp; ?></td>
					 	<td class="text-center">
						 	<div class="btn-group">
							 	<a href="post.php?delete_user=<?php echo $user_id; ?>" class="btn btn-outline-secondary">Delete</a>
							 	<?php if($user_access == 0){ ?><a href="post.php?approve_user=<?php echo $user_id; ?>" class="btn btn-outline-primary">Approve</a> <?php } ?>
						 	</div>
					 	</td>
					</tr>
				
				<?php 
				
				} 

				?>
			
			</tbody>
		</table>

	</div>

<?php

//} //$session_user_access

include("footer.php");

?>