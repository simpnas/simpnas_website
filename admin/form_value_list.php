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

<h1><?php echo $name; ?></h1>

<hr>

<div class="table-responsive">

	<table class="table border">
		<thead class="thead-light">
			<tr>
				<?php 

				while($row = mysqli_fetch_array($query_fields)){
					$name = $row['field_name'];
				
				 	echo "<th>$name</th>";
				}

				?>

			</tr>
		</thead>
		<tbody>
			<tr>
			<?php 
			while($row = mysqli_fetch_array($query_fields)){
				$field_id = $row['field_id'];

				$query_values = mysqli_query($mysqli,"SELECT * FROM form_values WHERE field_id = $field_id");
				$row = mysqli_fetch_array($query_values);
				
				$value_id = $row['value_id'];
				$data = $row['value_date'];
				
				echo "<td>$data</td>";
			?>
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