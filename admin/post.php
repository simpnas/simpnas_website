<?php
	
include("../config.php");
include("check_login.php");

if(isset($_POST['add_blog'])){
	$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
	$content = trim(mysqli_real_escape_string($mysqli,$_POST['content']));

	mysqli_query($mysqli,"INSERT INTO blog SET blog_title = '$title', blog_content = '$content', blog_date = NOW(), blog_by = $session_user_id") OR DIE("ERROR!");

	header("Location: blogs.php");

}

if(isset($_POST['edit_blog'])){
	$blog_id = intval($_POST['blog_id']);
	$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
	$content = trim(mysqli_real_escape_string($mysqli,$_POST['content']));

	mysqli_query($mysqli,"UPDATE blog SET blog_title = '$title', blog_content = '$content' WHERE blog_id = $blog_id");

	$_SESSION['response'] = "
		<div class='alert alert-info'>
		    Blog updated.
		    <button class='close' data-dismiss='alert'>
				<span>&times;</span>
			</button>
		</div>
	";

	header("Location: edit_blog.php?blog_id=$blog_id");

}

if(isset($_GET['delete_blog'])){
	$blog_id = intval($_GET['delete_blog']);

	mysqli_query($mysqli,"DELETE FROM blog WHERE blog_id = $blog_id");

	header("Location: blogs.php");

}

if(isset($_POST['add_doc'])){
	$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
	$content = trim(mysqli_real_escape_string($mysqli,$_POST['content']));

	mysqli_query($mysqli,"INSERT INTO docs SET doc_title = '$title', doc_content = '$content', doc_created_at = NOW(), doc_category_id = 1") OR DIE("ERROR!");

	header("Location: docs.php");

}

if(isset($_POST['edit_doc'])){
	$doc_id = intval($_POST['doc_id']);
	$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
	$content = trim(mysqli_real_escape_string($mysqli,$_POST['content']));

	mysqli_query($mysqli,"UPDATE docs SET doc_title = '$title', doc_content = '$content', doc_updated_at = NOW() WHERE doc_id = $doc_id");

	$_SESSION['response'] = "
		<div class='alert alert-info'>
		    Doc updated.
		    <button class='close' data-dismiss='alert'>
				<span>&times;</span>
			</button>
		</div>
	";

	header("Location: edit_doc.php?doc_id=$doc_id");

}

if(isset($_GET['delete_doc'])){
	$doc_id = intval($_GET['delete_doc']);

	mysqli_query($mysqli,"DELETE FROM docs WHERE doc_id = $doc_id");

	header("Location: docs.php");

}

if(isset($_POST['add_page'])){
	$order = intval($_POST['order']);
	$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
	$content = trim(mysqli_real_escape_string($mysqli,$_POST['content']));

	mysqli_query($mysqli,"INSERT INTO pages SET page_title = '$title', page_content = '$content', page_order = $order, page_created_at = NOW(), page_created_by = $session_user_id, page_active = 1") OR DIE("ERROR!");

	header("Location: pages.php");

}

if(isset($_POST['edit_page'])){
	$page_id = intval($_POST['page_id']);
	$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
	$content = trim(mysqli_real_escape_string($mysqli,$_POST['content']));

	mysqli_query($mysqli,"UPDATE pages SET page_title = '$title', page_content = '$content', page_updated_at = NOW() WHERE page_id = $page_id");

	$_SESSION['response'] = "
		<div class='alert alert-info'>
		    Page updated.
		    <button class='close' data-dismiss='alert'>
				<span>&times;</span>
			</button>
		</div>
	";

	header("Location: edit_page.php?page_id=$page_id");

}

if(isset($_GET['delete_page'])){
	$page_id = intval($_GET['delete_page']);

	mysqli_query($mysqli,"DELETE FROM pages WHERE page_id = $page_id");

	header("Location: pages.php");

}

if(isset($_POST['add_file'])){

  if($_FILES['file']['tmp_name']!='') {
    $path = "../upload/";
    $path = $path . basename( $_FILES['file']['name']);
    $file_name = basename($path);
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
  }

  mysqli_query($mysqli,"INSERT INTO files SET file_name = '$file_name', file_uploaded_at = NOW()");
  
  header("Location: " . $_SERVER["HTTP_REFERER"]);

}

if(isset($_GET['delete_file'])){
  $file_id = intval($_GET['delete_file']);

  $sql_file = mysqli_query($mysqli,"SELECT * FROM files WHERE file_id = $file_id");
  $row = mysqli_fetch_array($sql_file);
  $file_name = $row['file_name'];

  unlink("/upload/$file_name");

  mysqli_query($mysqli,"DELETE FROM files WHERE file_id = $file_id");
  
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  
}

if(isset($_POST['add_user'])){
	$name = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['name'])));
	$email = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['email'])));
	$password = md5($_POST['password']);
	$access = intval($_POST['access']);

	mysqli_query($mysqli,"INSERT INTO users SET user_name = '$name', user_email = '$email', user_password = '$password', user_access = $access");

	$_SESSION['response'] = "
		<div class='alert alert-success'>
		    User added.
		    <button class='close' data-dismiss='alert'>
				<span>&times;</span>
			</button>
		</div>
	";

	header("Location: users.php");

}

if(isset($_POST['edit_user'])){
	$user_id = intval($_POST['user_id']);
	$name = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['name'])));
	$email = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['email'])));
  $password = $_POST['password'];
	$access = intval($_POST['access']);

	mysqli_query($mysqli,"UPDATE users SET user_name = '$name', user_email = '$email', user_access = $access WHERE user_id = $user_id");

	if(!empty($password)){
      $password = md5($password);
      mysqli_query($mysqli,"UPDATE users SET user_password = '$password' WHERE user_id = $user_id");
  }

	header("Location: edit_user.php?user_id=$user_id");

}

if(isset($_GET['delete_user'])){
	$user_id = intval($_GET['delete_user']);

	mysqli_query($mysqli,"DELETE FROM users WHERE user_id = $user_id");

	header("Location: users.php");

}

if(isset($_GET['approve_user'])){
  $user_id = intval($_GET['approve_user']);

  mysqli_query($mysqli,"UPDATE users SET user_access = 1 WHERE user_id = $user_id");
  echo "<script>window.location = 'users.php'</script>";
}

?>