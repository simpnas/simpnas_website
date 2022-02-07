<?php 

$page_title = "Blog";

include("header.php");

if($config_module_blog_enabled == 1){
  
  $query = mysqli_query($mysqli,"SELECT * FROM blog LEFT JOIN users ON blog_by = user_id ORDER BY blog_date DESC LIMIT 5");

  while($row = mysqli_fetch_array($query)){

    $blog_id = $row['blog_id'];
    $title = $row['blog_title'];
    $url_title = $row['url_title'];
    $content = $row['blog_content'];
    $date = $row['blog_date'];
    $email = $row['user_email'];
    $username = $row['user_name'];

  ?>
    <div class="mb-5">
      <h5 class="text-center text-secondary"><?php echo date("F d, Y", strtotime($date)); ?> <small>by <?php echo $username; ?></small></h5>
      <h1 class="text-center mb-3"><?php echo $title; ?></h1>
      <?php echo $content; ?>
    </div>

  <?php 
  }
  ?> 
  
<?php }else{ ?>

404 Error (Module Not Enabled)

<?php } ?>

<?php include("footer.php"); ?>