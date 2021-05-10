
 <?php
    session_start();
    include 'php/connect.php';

    if(isset($_SESSION['uid'])){
      }
      else{
        header("Location: login.php");
        
      }

    ?>