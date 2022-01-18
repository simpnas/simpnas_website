<?php

include("../config.php");
include("check_login.php");
include("header.php");
include("nav.php");

if(isset($_POST['save'])){
	
	$form_id = intval($_POST['form_id']);
	$query_fields = mysqli_query($mysqli,"SELECT * FROM form_fields WHERE field_form_id = $form_id");
	while($row = mysqli_fetch_array($query_fields)){
		$field_id = $row['field_id'];
		$name = $row['field_name'];
		
		$value = $_POST["$name"];
		mysqli_query($mysqli,"INSERT INTO form_values SET value_data = '$value', value_created_at = NOW(), value_field_id = $field_id") OR DIE("ERROR!");
			
	}
}


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

<h1><?php echo $name; ?></h1>

<hr>

<form method="post">
	<input type="hidden" name="form_id" value="<?php echo $form_id; ?>">

	<?php 

		while($row = mysqli_fetch_array($query_fields)){
			
			$field_id = $row['field_id'];
			$name = $row['field_name'];
			$type = $row['field_type'];
			$options = $row['field_options'];

	?>


	<div class="form-group">
		<label><?php echo $name ?></label>
		<input type="<?php echo $type; ?>" class="form-control" name="<?php echo "$name"; ?>" placeholder="<?php echo $name ?>">
	</div>

	<?php
	}
	?>

	<button type="submit" class="btn btn-primary btn-block" name="save">Save</button>
</form>


<?php 
	
}

include("footer.php");

?>