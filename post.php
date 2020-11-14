<?php

include "config.php";    

if(!$_SESSION['logged']){
  session_start();
  $session_user_id = $_SESSION['user_id'];

  if(isset($_POST['new_topic'])){
    $topic = strip_tags(mysqli_real_escape_string($mysqli,$_POST['topic']));
    $body = strip_tags(mysqli_real_escape_string($mysqli,$_POST['body']));

    mysqli_query($mysqli,"INSERT INTO posts SET post_topic = '$topic', post_body = '$body', post_date = UNIX_TIMESTAMP(now()), user_id = $session_user_id");
    echo "<script>window.location = 'forums.php'</script>";
  }

  if(isset($_POST['reply'])){
    $post_id = intval($_POST['post_id']);
    $body = strip_tags(mysqli_real_escape_string($mysqli,$_POST['body']));

    mysqli_query($mysqli,"INSERT INTO replies SET reply_body = '$body', reply_date = UNIX_TIMESTAMP(now()), user_id = $session_user_id, post_id = $post_id");
    echo "<script>window.location = 'post_details.php?post_id=$post_id'</script>";
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

} //if(!$_SESSION['logged']){

?>