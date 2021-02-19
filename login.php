<!DOCTYPE html>
<?php
	if ($_SERVER['HTTPS'] != "on"){
		$url = "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		header("Location: $url");
		exit();
	}
?>
<html lang="en" class="gr__getbootstrap_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Derek Franz">
    <link rel="icon" href="icon32.ico">
    <link rel="apple-touch-icon" sizes="128x128" href="icon128.png">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="./login_new_files/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./login_new_files/signin.css" rel="stylesheet">
  </head>
  
  <body class="text-center" data-gr-c-s-loaded="true">
  <main role="main" class="container">
  
          
    <form class="form-signin" action="php/login.php" method="POST">
    <?php
          if (isset($_GET['error'])){
            if ($_GET['error'] == 'emptyfield'){
              echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>Error:</strong> Please enter a username and password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>';}
            
            else if ($_GET['error'] == 'sql'){
                echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>Error</strong> Something went wrong :(
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>';
            }
            else if ($_GET['error'] == 'wrongpass'){
              echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
              <strong>Error:</strong> Sorry, your password is incorrect
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>';
          }
          else if ($_GET['error'] == 'nouser'){
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
            <strong>Error:</strong> Sorry, looks you aren\'t signed up.  Click below to create an account
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>';
        }
          
          }
        if (isset($_GET['password'])){
          if ($_GET['password'] == 'reset'){
            echo '<div class="alert alert-success alert-dismissible fade show " role="alert">
                        <h4 class="alert-heading">Sucess</h4>
                        <p>Your password has been reset</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
          }
        }
        if (isset($_GET['reset'])){
          if($_GET['reset'] == 'sucess'){
          echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
          <strong>Sucess</strong> A reset e-mail has been sent 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
      
          }
        
        }
          ?>
  <img class="mb-4" src="./ClipBoard.svg" alt="" width="150" height="150">
  <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>
  <label for="inputEmail" class="sr-only" >Email address</label>
  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" value="
    <?php 
    if (isset($_GET['email'])){
      echo $_GET['email'];
    }
    ?>" autofocus="">


  <label for="inputPassword" class="sr-only">Password</label>
  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
  <button name="login-submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-4 mb-3 text-muted">New User? Click <a href="signup.php">here</a> to sign up</p>
  <p class="mt-4 mb-3 text-muted"><a href="forgot_pass_form.php">Forgot password</a></p>
  <p class="mt-5 mb-3 text-muted">© Derek Franz</p>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
</body></html>
