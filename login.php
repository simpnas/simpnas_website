<?php 
  session_start();
  include "config.php";
    
  if(isset($_POST['login'])){

      $username = mysqli_real_escape_string($mysqli,$_POST['username']);
      $password = mysqli_real_escape_string($mysqli,$_POST['password']);

      $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_access > 0");
      
      if(mysqli_num_rows($sql) == 1){
          $row = mysqli_fetch_array($sql);
          session_start();
          $_SESSION['logged'] = TRUE;
          $_SESSION['user_id'] = $row['user_id'];
          header("Location: index.php");
      }else{
          $response = 
          "<div class='alert alert-danger alert-dismissible fade show'>
            Invalid username or password. If you just registered your account please give 48 hours for us to approve.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
      }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <?php 
        
      if(isset($response)){
        echo "$response";
      }
        
      ?>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
    </form>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>