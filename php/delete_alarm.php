<?php 
require 'connect.php';

if (isset($_GET['delete'])){
    $sql = "DELETE FROM alarm WHERE ID = ?;";
    $stmt = mysqli_stmt_init($conn);
            
    // If the statement fails to execute  
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "Failed to execute SQL";
        exit();
    // If the statement executes sucessfully 
    }else{
        mysqli_stmt_bind_param($stmt,"s",$_GET['delete']);
        mysqli_stmt_execute($stmt);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}