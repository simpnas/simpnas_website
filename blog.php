<?php include("header.php"); ?>

<?php 
  
  $query = mysqli_query($mysqli,"SELECT * FROM blog ORDER BY blog_date DESC");

  while($row = mysqli_fetch_array($query)){

    $blog_id = $row['blog_id'];
    $title = $row['blog_title'];
    $body = $row['blog_body'];
    $date = $row['blog_date'];
    $email = $row['user_email'];

  ?>
    <div class="mb-5">
      <h5 class="text-center text-secondary"><?php echo date("F d, Y", strtotime($date)); ?></h5>
      <h1 class="text-center mb-3"><?php echo $title; ?></h1>
      <?php echo $body; ?>
    </div>

  <?php 
  } 
  ?>

<?php include("footer.php"); ?>