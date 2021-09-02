<?php

include("config.php");
include("check_login.php");  

if(isset($_POST['new_topic'])){
  $topic = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['topic'])));
  $content = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['content'])));

  mysqli_query($mysqli,"INSERT INTO posts SET post_topic = '$topic', post_content = '$content', post_date = NOW(), post_by = $session_user_id");
  echo "<script>window.location = 'forums.php'</script>";
}

if(isset($_POST['reply'])){
  $post_id = intval($_POST['post_id']);
  $content = trim(strip_tags(mysqli_real_escape_string($mysqli,$_POST['content'])));

  mysqli_query($mysqli,"INSERT INTO replies SET reply_content = '$content', reply_date = NOW(), reply_by = $session_user_id, post_id = $post_id");
  echo "<script>window.location = 'post_details.php?post_id=$post_id'</script>";
}

?>