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
    <li class="breadcrumb-item"><a href="forum.php">Forum</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Topic</li>
  </ol>
</nav>

<form method="post" action="post.php">
  <div class="form-group">
    <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" autofocus required>
  </div>
  <div class="form-group">
    <textarea class="form-control" name="content" rows=8 required></textarea>
  </div>
  <button type="submit" name="new_topic" class="btn btn-primary">Post</button>
</form>

<?php include("footer.php"); ?>