<?php 
  include("config.php");

if(isset($_POST['register'])){
    

    $username = strip_tags(mysqli_real_escape_string($mysqli,$_POST['username']));
    $password = strip_tags(mysqli_real_escape_string($mysqli,$_POST['password']));
    $register_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $register_browser = $_SERVER['HTTP_USER_AGENT'];
    
    $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE username = '$username'");
      
    if(mysqli_num_rows($sql) == 1){
        $response = 
        "<div class='alert alert-danger alert-dismissible fade show'>
          This name has already been taken or you are already registered just not active please give 48 hours for us to approve.
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }else{   
      mysqli_query($mysqli,"INSERT INTO users SET username = '$username', password = '$password', register_ip = '$register_ip', register_date = UNIX_TIMESTAMP(now()), register_browser = '$register_browser', user_access = 0");
      $response = 
        "<div class='alert alert-danger alert-dismissible fade show'>
          You are registered! Please give us 48 hours to approve and activate your account.
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

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Register Here</h1>
      <?php 
        
      if(isset($response)){
        echo "$response";
      }
        
      ?>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Choose a Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Choose a Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" type="submit">Register</button>
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