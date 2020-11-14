<?php
	
include("../config.php");

session_start();

if(isset($_GET['logout'])){

	session_destroy();
	header('Location: login.php');

}

if(isset($_POST['login'])){
  
	$email = mysqli_real_escape_string($mysqli,$_POST['email']);
	$password = md5($_POST['password']);

	$sql = mysqli_query($mysqli,"SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'");

	if(mysqli_num_rows($sql) == 1){
		$row = mysqli_fetch_array($sql);
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_email'] = $row['user_email'];
		  
		header("Location: index.php");

	}else{

		$_SESSION['response'] = "
			<div class='alert alert-danger'>
			    Incorrect username or password.
			    <button class='close' data-dismiss='alert'>
					<span>&times;</span>
				</button>
			</div>
		";

		header("Location: login.php");
	
	}
}

if(isset($_POST['forgot_password'])){
  
	$email = mysqli_real_escape_string($mysqli,$_POST['email']);

	$sql = mysqli_query($mysqli,"SELECT * FROM users WHERE user_email = '$email'");

	if(mysqli_num_rows($sql) == 1){
		$row = mysqli_fetch_array($sql);

		$user_id = $row['user_id'];
		
		function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		$token = generateRandomString();
		
		$url = "https://" . $_SERVER['HTTP_HOST'] . "/" . basename(__DIR__);

		mysqli_query($mysqli,"UPDATE users SET user_token = '$token' WHERE user_id = $user_id");

		mail("$email","Password Reset Request","$url/reset_password.php?user_id=$user_id&token=$token");
		  
		$_SESSION['response'] = "
			<div class='alert alert-success'>
				We just sent a password reset link to your email!
				<button class='close' data-dismiss='alert'>
					<span>&times;</span>
				</button>
			</div>
		";

		header("Location: forgot_password.php");

	}else{

		$_SESSION['response'] = "
			<div class='alert alert-danger'>
			    Email doesn't exist!
			    <button class='close' data-dismiss='alert'>
					<span>&times;</span>
				</button>
			</div>
		";

		header("Location: forgot_password.php");
	
	}
}

if(isset($_POST['reset_password'])){
  
	$user_id = intval($_POST['user_id']);
	$password = md5($_POST['password']);

	mysqli_query($mysqli,"UPDATE users SET user_password = '$password', user_token = '' WHERE user_id = $user_id");

	$_SESSION['response'] = "
		<div class='alert alert-info'>
		    Password has been reset please login with you new password.
		    <button class='close' data-dismiss='alert'>
				<span>&times;</span>
			</button>
		</div>
	";
		  
	header("Location: login.php");

}

if(isset($_SESSION['user_id'])){

	$session_user_id = $_SESSION['user_id'];

	if(isset($_POST['add_blog'])){
		$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
		$body = trim(mysqli_real_escape_string($mysqli,$_POST['body']));

		mysqli_query($mysqli,"INSERT INTO blog SET blog_title = '$title', blog_body = '$body', blog_date = NOW(), user_id = $session_user_id") OR DIE("ERROR!");

		header("Location: blogs.php");

	}

	if(isset($_POST['edit_blog'])){
		$blog_id = intval($_POST['blog_id']);
		$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
		$body = trim(mysqli_real_escape_string($mysqli,$_POST['body']));

		mysqli_query($mysqli,"UPDATE blog SET blog_title = '$title', blog_body = '$body' WHERE blog_id = $blog_id");

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
		$body = trim(mysqli_real_escape_string($mysqli,$_POST['body']));

		mysqli_query($mysqli,"INSERT INTO docs SET doc_title = '$title', doc_body = '$body', doc_created_at = NOW(), category_id = 1") OR DIE("ERROR!");

		header("Location: docs.php");

	}

	if(isset($_POST['edit_doc'])){
		$doc_id = intval($_POST['doc_id']);
		$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
		$body = trim(mysqli_real_escape_string($mysqli,$_POST['body']));

		mysqli_query($mysqli,"UPDATE docs SET doc_title = '$title', doc_body = '$body', doc_updated_at = NOW() WHERE doc_id = $doc_id");

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
		$title = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['title'])));
		$content = trim(mysqli_real_escape_string($mysqli,$_POST['content']));

		mysqli_query($mysqli,"INSERT INTO pages SET page_title = '$title', page_content = '$content', page_created_at = NOW(), page_created_by = $session_user_id, page_active = 1") OR DIE("ERROR!");

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

	if(isset($_POST['add_user'])){
		$email = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['email'])));
		$password = md5($_POST['password']);

		mysqli_query($mysqli,"INSERT INTO users SET user_email = '$email', user_password = '$password'");

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
		$email = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['email'])));
		$current_password_hash = $_POST['current_password_hash'];
	    $password = $_POST['password'];
	    if($current_password_hash == $password){
	        $password = $current_password_hash;
	    }else{
	        $password = md5($password);
	    }
		
		mysqli_query($mysqli,"UPDATE users SET user_email = '$email', user_password = '$password' WHERE user_id = $user_id");

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

  if(isset($_GET['delete_user'])){
    $user_id = intval($_GET['delete_user']);

    mysqli_query($mysqli,"DELETE FROM users WHERE user_id = $user_id");
    echo "<script>window.location = 'users.php'</script>";
  }

}

?>