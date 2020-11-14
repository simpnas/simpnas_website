<?php include("header.php"); ?>

<?php
  
  if(isset($_GET['page'])){

    $page_title = $_GET['page'];
    
    $query = mysqli_query($mysqli,"SELECT * FROM pages WHERE page_title = '$page_title'");
    
    $row = mysqli_fetch_array($query);
    
    $title = $row['page_title'];
    $content = $row['page_content'];
    $created_at = $row['page_created_at'];
    $updated_at = $row['page_updated_at'];

    echo $content;
  }

?>

<?php include("footer.php"); ?>