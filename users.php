<?php 
	
	include "config.php";
	include "header.php"; 
	include "check_login.php";
	
if($session_user_access > 2){

	$sql = mysqli_query($mysqli,"SELECT * FROM users");

?>

<div class="table-responsive">
	<table class="table table-hover">	
	    <thead>	
	        <tr>	
	            <th>Username</th>
	            <th>IP</th>
	            <th>Browser</th>
				<th>Access</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
	    <tbody>
			
	        <?php

				while($row = mysqli_fetch_array($sql)){
	                $user_id = $row['user_id'];
	                $username = $row['username'];
	                $register_ip = $row['register_ip'];
	                $register_browser = $row['register_browser'];
	                $user_access = $row['user_access'];
	                $register_date = date($config_date_format,$row['register_date']);               
	         ?>
						<tr>
							<td><?php echo $username; ?></td>
							<td><?php echo $register_ip; ?></td>
							<td><small><?php echo $register_browser; ?></small></td>
							<td><?php echo $user_access; ?></td>
							<td><?php echo $register_date; ?></td>
							<td>
                  	<div class="btn-group mr-2">
                		<a href="user_edit.php?username=<?php echo $user_id; ?>" class="btn btn-outline-secondary"><span data-feather="edit"></span></a>
                		<?php if($user_access == 0){ ?><a href="post.php?approve_user=<?php echo $user_id; ?>" class="btn btn-outline-primary"><span data-feather="check"></span></a> <?php } ?>
                		<a href="post.php?delete_user=<?php echo $user_id; ?>" class="btn btn-outline-danger"><span data-feather="trash"></span></a>
              		</div>
              	  </td>
						</tr>
			<?php
				}
			?>
		
	    </tbody>
	</table>
</div>

<?php } //if($session_access_level > 2){ ?>

<?php include("footer.php"); ?>