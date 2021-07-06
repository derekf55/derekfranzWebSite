<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="jquery/bootstrap.min.css" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180.png">

    <title>Home Control</title>
    <style>
        
        .main-view{
            margin-top:50px;
        }
        .main-test{
            align:center;
        }
        .btn-options{
            display:block;
            margin-bottom: 20px;
            width: 300px;

        }
    </style>
  </head>
  <body>

  <?php
  session_start();
  include 'php/connect.php';
        // THIS IS VERY INSECURE BUT BETTER THAN THE NO LOGIN
        // IF this cookie is good
        if (isset($_COOKIE['rememberme'])){
          //echo '<h1> Cookie val is '.$_COOKIE['rememberme'].'<h1>';
          if ($_COOKIE['rememberme'] != ' '){
            //echo '<h1>We haere</h1>';
          $sql = "SELECT UserType FROM userinfo WHERE userid = ?;";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt,$sql)){
            echo 'cookie error deal with';
            exit();
          } else {
            mysqli_stmt_bind_param($stmt,"s",$_COOKIE['rememberme']);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)){
              $_SESSION['userType'] = $row['UserType'];
              $_SESSION['uid'] = $_COOKIE['rememberme'];
            }
          }
        } else{
          
        }
        } 


      if(isset($_SESSION['uid'])){
          if ($_SESSION['userType'] == "admin"){
            header("Location: admin_ui.php");
            exit();
          } else if ($_SESSION['userType'] == "Sam"){
            //echo 'SAM';
            header("Location: sam_ui.php");
            exit();
          }
           else if ($_SESSION['userType'] == "banned"){
            //echo 'you banned';
            header("Location: login.php?error=banned");
            exit();
          }
           else {
            echo $_SESSION['userType'];
            header("Location: main_ui.php");
            exit();
          }
        
      }
      else{
        //header("Location: login.php");        

        require 'login.php';
        exit();
        
      }
    ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
