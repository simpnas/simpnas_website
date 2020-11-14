<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php");

$current_uri = basename($_SERVER['REQUEST_URI']);

if(isset($_GET['customer_id'])){
	
	$customer_id = intval($_GET['customer_id']);
	
	$query = mysqli_query($mysqli,"SELECT * FROM customers WHERE customer_id = $customer_id");
	
	$row = mysqli_fetch_array($query);
	
	$first_name = $row['customer_first_name'];
	$last_name = $row['customer_last_name'];
	$email = $row['customer_email'];
	$created_at = $row['customer_created_at'];

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
		<li class="breadcrumb-item active"><?php echo "$first_name $last_name"; ?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-4">
		
		<div class="card mb-3">
			<h3 class="card-header"><?php echo "$first_name $last_name"; ?></h3>
			<div class="card-body">
				<p><?php echo $email; ?><p>
				<p><?php echo $created_at; ?></p>
				<p><?php echo $current_uri; ?></p>
			</div>
		</div>

	</div>

	<div class="col-md-8">

		<ul class="nav nav-pills nav-fill border bg-light p-2 mb-3" id="pills-tab">
			<li class="nav-item">
		    	<a href="?customer_id=<?php echo $customer_id; ?>&tab=notes" class="nav-link <?php if($_GET['tab'] == "notes") { echo "active"; } ?>">Notes</a>
			</li>
			<li class="nav-item">
		    	<a href="?customer_id=<?php echo $customer_id; ?>&tab=edit" class="nav-link <?php if($_GET['tab'] == "edit") { echo "active"; } ?>">Edit</a>
			</li>	
		</ul>
		
		<?php 

		if($_GET['tab'] == "notes"){ 

		?>
				
			<form action="post.php" method="post">
				<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
				<input type="hidden" name="return_url" value="<?php echo $current_uri; ?>">
				<textarea class="form-control mb-3" rows="5" name="note_body"></textarea>
				<button type="submit" class="btn btn-secondary btn-block col-md-2 mb-3 ml-auto" name="add_note">Submit</button>
			</form>

			<hr>
				
			<?php 

			$query = mysqli_query($mysqli,"SELECT * FROM notes, users WHERE users.user_id = notes.note_created_by AND customer_id = $customer_id ORDER BY note_id DESC");

			while($row = mysqli_fetch_array($query)){
	
				$note_id = $row['note_id'];
				$note_body = $row['note_body'];
				$created_at = $row['note_created_at'];
				$created_by = $row['note_created_by'];
				$email = $row['user_email'];

			?>

				<div class="media">
					<img src="..." class="mr-3" alt="...">
					<div class="media-body">
				 		<p class="mb-3"><?php echo $note_body; ?></p>
				 		<small class="text-secondary"><?php echo $created_at; ?> <span class="float-right">~<?php echo $email; ?> </span></small>
					</div>
					<a href="post.php?delete_note=<?php echo $note_id; ?>&customer_id=<?php echo $customer_id ?>" class="btn btn-outline-danger btn-sm">Del</a>
				</div>

				<hr>

			<?php
			
			}
			
			?>

		<?php 
		
		} 
		
		?>

		<?php 

		if($_GET['tab'] == "edit"){

		?>
  		
	  		<form class="border p-3" action="post.php" method="post">
				
				<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
				</div>
				<button type="submit" class="btn btn-primary btn-block" name="edit_customer">Submit</button>
			
			</form>
		
		<?php

		}

		?>
		
	</div>

<?php 
	
}

include("footer.php");

?>