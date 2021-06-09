
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
        if ($_SESSION['userType'] != "admin"){
            header("Location: main_ui.php");
        }
      }
      else{
        header("Location: login.php");
        
      }

    ?>