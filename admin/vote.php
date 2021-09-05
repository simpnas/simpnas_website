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

<h1>Vote</h1>

<hr>


<form action="post.php" method="post">
	<input type="hidden" name="poll_id" value="<?php echo $poll_id; ?>">

	<?php 

	$query_options = mysqli_query($mysqli,"SELECT * FROM poll_options WHERE option_poll_id = $poll_id");

	while($row = mysqli_fetch_array($query_options)){
					
		$option_id = $row['option_id'];
		$name = $row['option_name'];
	?>

	<div class="form-check">
    <input class="form-check-input" type="radio" name="option_id" value="<?php echo $option_id; ?>">
    <label class="form-check-label">
      <?php echo $name; ?>
    </label>
  </div>

	<?php
	}
	?>

	<button type="submit" class="btn btn-primary btn-block" name="add_vote">Vote</button>
</form>

<?php 
	
}

include("footer.php");

?>