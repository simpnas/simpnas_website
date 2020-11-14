<?php 
  
  include("header.php");
  include("side_nav.php");

  if(!$_SESSION['logged']){
    header("Location: login.php");
    die;
	}

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="forums.php">Forums</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Topic</li>
  </ol>
</nav>

<h2>New Topic</h2>
<form method="post" action="post.php">
  <div class="form-group">
    <label>Topic</label>
    <input type="text" class="form-control" name="topic" autofocus required>
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control" name="body" rows=5 required></textarea>
  </div>
  <button type="submit" name="new_topic" class="btn btn-primary">Post</button>
</form>

<?php include("footer.php"); ?>