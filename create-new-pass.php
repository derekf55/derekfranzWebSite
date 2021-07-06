<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Derek Franz">
    <link rel="icon" href="icon32.ico">
    <title>Sign Up</title>

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
    <link href="./login_css/signin.css" rel="stylesheet">
  </head>
  
  <body class="text-center" data-gr-c-s-loaded="true">
  <main role="main" class="container">
  
  <?php
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if(empty($selector) || empty($validator)){
        echo 'Could not validate your request';
    }
    
    else{
        //Check if tokens are valid hexidecimals 
        if(ctype_xdigit($selector) !== FALSE && ctype_xdigit($validator) ==! FALSE){
            ?>
            <form class="form-signin" action="php/reset_pass.php" method="POST">
          <?php
            if (isset($_GET['error'])){
              if ($_GET['error'] == 'passmismatch'){
                echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                      <strong>Error:</strong> Sorry, those passwords didn\'t match.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button></div>';
              }
              if ($_GET['error'] == 'empty'){
                echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                      <strong>Error:</strong> Please fill out both fields.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button></div>';
              }
              if ($_GET['error'] == 'passlength'){
                echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                      <strong>Error:</strong> Password must be 8 characters.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button></div>';
              }
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

            <img class="mb-4" src="./ClipBoard.svg" alt="" width="150" height="150">
            <h1 class="h3 mb-3 font-weight-normal">Please choose a new password</h1>
            <input type='hidden' name='selector' value="<?php echo $selector;?>">
            <input type='hidden' name='validator' value="<?php echo $validator;?>">
            <label for="password" class="sr-only">New Password</label>
            <input id="password" name="password" placeholder="New Password" type="password" class="form-control" required="" autofocus="">
            <label for="password2" class="sr-only">Confirm New Password</label>
            <input id="password2" name="password2" type="password" class="form-control" required="" autofocus="" placeholder="Re-type Password">
            <button id="reset" name="reset" class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
            <p class="mt-5 mb-3 text-muted">© Derek Franz</p>
        </form>

<?php
        }
    }


  ?>
          
    

          <script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
    
</body></html>
