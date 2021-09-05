<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php");

if(isset($_GET['poll_id'])){
	
	$poll_id = intval($_GET['poll_id']);

	$query = mysqli_query($mysqli,"SELECT * FROM polls WHERE poll_id = $poll_id");
	
	$row = mysqli_fetch_array($query);
	
	$name = $row['poll_name'];
	$description = $row['poll_description'];

	$query_options = mysqli_query($mysqli,"SELECT * FROM poll_options WHERE option_poll_id = $poll_id");

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="polls.php">Polls</a></li>
		<li class="breadcrumb-item active"><?php echo $name; ?></li>
	</ol>
</nav>

<?php 

	if(isset($_SESSION['response'])){
		echo $_SESSION['response'];
		$_SESSION['response'] = '';
	}

?>

<h1>Add Option</h1>

<hr>

<form action="post.php" method="post">
	<input type="hidden" name="poll_id" value="<?php echo $poll_id; ?>">

	<div class="form-group">
		<label>Option</label>
		<input type="text" class="form-control" name="name" placeholder="Enter an Option" required>
	</div>

	<button type="submit" class="btn btn-primary btn-block" name="add_option">Save</button>
</form>

<h2 class="mt-5">Options</h2>

<hr>

<div class="table-responsive">

	<table class="table border">
		<thead class="thead-light">
			<tr>
				<th>Option</th>
				<th>Votes</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			
			<?php 

			while($row = mysqli_fetch_array($query_options)){
				
				$option_id = $row['option_id'];
				$name = $row['option_name'];
				
				?>
			
			<tr>	
				<td><?php echo $name; ?></td>
				<td>- VOTES HERE -</td>
			 	<td>
          <div class="dropdown dropleft text-center">
            <button class="btn btn-secondary btn-sm" type="button" data-toggle="dropdown">
              <i class="fas fa-fw fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="edit_option.php?option_id=<?php echo $option_id; ?>">Edit</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="post.php?delete_option=<?php echo $option_id; ?>" class="btn btn-outline-danger">Delete</a>
            </div>
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
	
}

include("footer.php");

?>