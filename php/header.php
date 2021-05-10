
 <?php
    session_start();
    include 'php/connect.php';

    if(isset($_SESSION['uid'])){
      $sql = "SELECT * FROM userinfo WHERE userid=?;";
      $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../login.php?error=sql");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$_SESSION['uid']);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)){
              $_SESSION['userType'] = $row['UserType'];

            }

        }
          if ($_SESSION['userType'] == 'banned'){
            header("Location: login.php?error=banned");
          }
    } else {
        header("Location: login.php");
        
    }

    ?>