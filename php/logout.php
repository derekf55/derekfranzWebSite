<?php
    session_start();
    setcookie("rememberme", ' ', time() + 3600,'/');
    session_unset();
    session_destroy();
    header("Location: ../index.php");

?>