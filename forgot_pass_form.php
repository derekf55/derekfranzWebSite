<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Forgot Password</title>

   

  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180.png">


    
    <!-- Custom styles for this template -->
    <link href="./login_css/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .form-signin input[type="email"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  
  <body class="text-center" data-gr-c-s-loaded="true">
  <main role="main" class="container">
  
          
    <form class="form-signin" action="php/forgot_pass.php" method="POST">
    <?php
          if (isset($_GET['reset'])){
            if($_GET['reset'] == 'sucess'){
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
            <strong>Sucess</strong> A reset e-mail has been sent 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>';
        
            }
          
          }
          if (isset($_GET['error'])){
            if ($_GET['error'] == 'tokenexpired' || $_GET['error'] == 'notoken' || $_GET['error'] == 'badtoken'){
              echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>Error:</strong> This link has expired.  
                Type your e-mail for a new link.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>';
            }
            else if ($_GET['error'] == 'sql'){
              echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>Error:</strong> There was an error.  
                Please try again.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>';
            }
            }
          
          ?>
  <img class="mb-4" src="img/icons8-home.svg" alt="" width="150" height="150">
  <h1 class="h3 mb-3 font-weight-normal">Enter your email to to reset password</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input name="email" type="email" id="inputEmail" class="form-control " placeholder="Email address" required="" autofocus="">
  <button id="reset" name="reset" class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
  <p class="mt-5 mb-3 text-muted">© Derek Franz</p>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body></html>
