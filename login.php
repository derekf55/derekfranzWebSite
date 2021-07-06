<!DOCTYPE html>
<?php
	if ($_SERVER['HTTPS'] != "on"){
		$url = "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		header("Location: $url");
		exit();
	}
?>
<html lang="en" class="gr__getbootstrap_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="jquery/bootstrap.min.css" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180.png">

    <title>Login</title>

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
    <link href="./login_css/signin.css" rel="stylesheet">
  </head>
  
  <body class="text-center" data-gr-c-s-loaded="true">
  <main role="main" class="container">
  
          
    <form class="form-signin" action="php/process_login.php" method="POST">
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
        else if ($_GET['error'] == 'banned'){
          echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
          <strong>Error:</strong> Bro you got banned
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
  <img class="mb-4" src="img/icons8-home.svg" alt="" width="150" height="150">
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

<script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
    
</body></html>
