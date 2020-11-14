<?php 
  include("config.php");

if(isset($_POST['register'])){
    
  $username = strip_tags(mysqli_real_escape_string($mysqli,$_POST['username']));
  $email = strip_tags(mysqli_real_escape_string($mysqli,$_POST['email']));
  $password = md5($_POST['password']);
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  
  $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE user_email = '$email'");
    
  if(mysqli_num_rows($sql) == 1){
      $response = 
      "<div class='alert alert-danger alert-dismissible fade show'>
        This name has already been taken or you are already registered just not active please give 48 hours for us to approve.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";

      mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Registration Failed', event_details = '$user - $email Registration Failed due to username already taken', event_ip = '$ip', event_user_agent = '$user_agent', event_timestamp = NOW(), user_id = 0");
  }else{   
    mysqli_query($mysqli,"INSERT INTO users SET user_email = '$email', username = '$username', user_password = '$password', user_access = 0");

    $user_id = mysqli_insert_id($mysqli);

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Registration', event_details = '$user - $email Registered', event_ip = '$ip', event_user_agent = '$user_agent', event_timestamp = NOW(), user_id = $user_id");

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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
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
      <input type="text" id="username" name="username" class="form-control" placeholder="Input a Username" required autofocus>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Input Email" required>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Choose a Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" type="submit">Register</button>
    </form>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>