
<?php include("config.php"); ?>
<?php include("header.php"); ?>

<div class="row">
	<div class="col-md-3 bg-light p-3" style="height: 1000px;">
		<h3>Index</h3>
		<hr>
		<nav class="nav nav-pills flex-column">

		<?php

			$query = mysqli_query($mysqli,"SELECT * FROM docs");

			while($row = mysqli_fetch_array($query)){
			
				$doc_id = $row['doc_id'];
				$title = $row['doc_title'];

		?>
				<a class="nav-link <?php if($doc_id == $_GET['doc_id']){ echo "active"; } ?>" href="?doc_id=<?php echo $doc_id; ?>"><?php echo $title; ?></a>

		<?php
			}
		?>

		</nav>
	
	</div>

	<div class="col-md-9 p-3">
		<?php
			if(isset($_GET['doc_id'])){
		
				$doc_id = intval($_GET['doc_id']);
				
				$query = mysqli_query($mysqli,"SELECT * FROM docs WHERE doc_id = $doc_id");
				
				$row = mysqli_fetch_array($query);
				
				$title = $row['doc_title'];
				$body = $row['doc_body'];
				$created_at = $row['doc_created_at'];
				$updated_at = $row['doc_updated_at'];

		?>
				<h3><?php echo $title; ?></h3>
				<small class="text-secondary">Created: <?php echo $created_at; ?> || Updated: <?php echo $updated_at; ?></small> 
				<hr>
				<?php echo $body; ?>
		<?php
			}

		?>

	</div>
</div>

<?php include("footer.php"); ?>