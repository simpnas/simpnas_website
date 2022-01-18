<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php");

if(isset($_GET['form_id'])){
	
	$form_id = intval($_GET['form_id']);

	$query = mysqli_query($mysqli,"SELECT * FROM forms WHERE form_id = $form_id");
	
	$row = mysqli_fetch_array($query);
	
	$name = $row['form_name'];

	$query_fields = mysqli_query($mysqli,"SELECT * FROM form_fields WHERE field_form_id = $form_id");

?>

<nav>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="forms.php">Forms</a></li>
		<li class="breadcrumb-item active"><?php echo $name; ?></li>
	</ol>
</nav>

<?php 

	if(isset($_SESSION['response'])){
		echo $_SESSION['response'];
		$_SESSION['response'] = '';
	}

?>

<h1>Add Field to Form</h1>

<hr>

<form action="post.php" method="post">
	<input type="hidden" name="form_id" value="<?php echo $form_id; ?>">

	<div class="form-group">
		<label>Field Name</label>
		<input type="text" class="form-control" name="name" placeholder="Name of field" required>
	</div>

	<div class="form-group">
		<label>Type</label>
		<select class="form-control" name="type">
			<option value="text">Text Field</option>
			<option value="text">Text Area Field</option>
			<option value="numeric">Numeric Field</option>
			<option value="select">Select Field</option>
			<option value="checkbox">Checkbox Field</option>
			<option value="radio">Radio Field</option>
			<option value="date">Date Field</option>
			<option value="time">Time Field</option>
		</select>
	</div>

	<div class="form-group">
		<label>Field Options</label>
		<input type="text" class="form-control" name="options" placeholder="Field options seperate options with commas">
	</div>

	<button type="submit" class="btn btn-primary btn-block" name="add_field">Save</button>
</form>

<h2 class="mt-5">Fields</h2>

<hr>

<div class="table-responsive">

	<table class="table border">
		<thead class="thead-light">
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Options</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			
			<?php 

			while($row = mysqli_fetch_array($query_fields)){
				
				$field_id = $row['field_id'];
				$name = $row['field_name'];
				$type = $row['field_type'];
				$options = $row['field_options'];
				
				?>
			
			<tr>	
				<td><?php echo $name; ?></td>
				<td><?php echo $type; ?></td>
				<td><?php echo $options; ?></td>
			 	<td>
          <div class="dropdown dropleft text-center">
            <button class="btn btn-secondary btn-sm" type="button" data-toggle="dropdown">
              <i class="fas fa-fw fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="edit_field.php?field_id=<?php echo $field_id; ?>">Edit</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="post.php?delete_field=<?php echo $field_id; ?>" class="btn btn-outline-danger">Delete</a>
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