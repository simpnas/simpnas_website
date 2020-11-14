<?php 
  include("config.php");
  include("check_login.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SimpNAS - A Simple Opensource Network Attached Storage Solution">
    <meta name="author" content="PittPC">
    <link rel="icon" href="favicon.ico">

    <title>SimpNAS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <link href="plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">SimpNAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="features.php">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="docs.php">Docs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forums.php">Forums</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
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
    </header>
    <main class="container">