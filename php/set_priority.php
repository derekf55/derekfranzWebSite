<?php
    require 'connect.php';
    // Check for errors
    if (!isset($_POST['priority'])){
        header("Location: ../homeManagement.php");
        exit();
    }

    $priority = $_POST['priority'];
    $priority = mysqli_real_escape_string($conn,$priority);
    $priority = strip_tags($priority);


    $sql = "UPDATE `personDetectionPriority` SET `PriorityLevel`=? WHERE ID = 1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "Something went wrong";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$priority);
        mysqli_stmt_execute($stmt);
        header("Location: ../homeManagement.php");
        exit();
    }

?>