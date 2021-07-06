<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    
    <title>Sign Up</title>

    

     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="jquery/bootstrap.min.css" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180.png">


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
  
          
    <form class="form-signin" action="php/usersignup.php" method="POST">
    <?php
          if (isset($_GET['error'])){
            //Empty Fields
            if ($_GET['error'] == 'emptyfields'){
              echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>Error:</strong> Please fill out all fields
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>';}
            //SQL Error
            else if ($_GET['error'] == 'sql'){
                echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>Error:</strong> Something went wrong :(
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>';
            }
            //Password mismatch
            else if ($_GET['error'] == 'passwordmismatch'){
              echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
              <strong>Error:</strong> Sorry, your passwords didn\'t match.  Please try again.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>';
          }
            // If the password doesn't meet the requirnments
            else if ($_GET['error'] == 'passwordlength'){
              echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
              <strong>Error:</strong> Password must be at least 8 characters long
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>';
          }
          //Invalid E-mail
          else if ($_GET['error'] == 'invaildemail'){
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
            <strong>Error:</strong> Please enter a valid E-mail
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>';
        }
          // If the email is already in the database
          else if ($_GET['error'] == 'emailused'){
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
            <strong>Error:</strong> Sorry that email has already been used
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>';
        }
        //SQL Error
        else if ($_GET['error'] == 'sqlerror'){
          echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
          <strong>Error:</strong> An error occured
          Please try again
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
      }
          
          }
          ?>
  <img class="mb-4" src="img/icons8-home.svg" alt="" width="150" height="150">
  <h1 class="h3 mb-3 font-weight-normal">Welecome to Blue Haus</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus=""
  value ="<?php 
    if (isset($_GET['email'])){
      echo $_GET['email'];
    }
    ?>" autofocus="">
  
  
  <label for="inputPassword" class="sr-only">Password</label>
  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
  <label for="inputPassword2" class="sr-only">Password</label>
  <input name="password2" type="password" id="inputPassword2" class="form-control" placeholder="Re-type Password" required="">
  <button id="signup" name="signup" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
  <p class="mt-4 mb-3 text-muted">Already have an account? Click <a href="login.php">here</a> to login</p>
  <p class="mt-5 mb-3 text-muted">© Derek Franz</p>
</form>

<script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
    
</body></html>
