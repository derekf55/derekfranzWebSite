
 <?php
    session_start();
    include 'php/connect.php';
    
    if(isset($_SESSION['uid'])){
        if ($_SESSION['userType'] != "admin"){
            header("Location: main_ui.php");
        }
      }
      else{
        header("Location: login.php");
        
      }

    ?>