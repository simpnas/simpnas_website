<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">SimpNAS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <?php

        $query = mysqli_query($mysqli,"SELECT * FROM pages WHERE page_active = 1");

        while($row = mysqli_fetch_array($query)){
        
          $page_id = $row['page_id'];
          $page_titlea = $row['page_title'];

      ?>
          <li class="nav-item">
            <a class="nav-link <?php if($page_titlea == $_GET['page']){ echo "active"; } ?>" href="?page=<?php echo $page_titlea; ?>"><?php echo $page_titlea; ?></a>
          </li>

      <?php
        }
      ?>
    </ul>
    <?php if(!$_SESSION['logged']){ ?>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item mr-2">
        <a class="nav-link" href="https://github.com/johnnyq/simpnas"><i class="fab fa-github"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
    <?php }else{ ?>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><?php echo $session_username; ?></a>
      </li>
    </ul>
    <?php } ?>
  </div>
</nav>