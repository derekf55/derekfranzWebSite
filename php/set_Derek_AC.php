<?php
    require 'connect.php';

    if (!isset($_POST['temp'])){
        echo 'Didnt set a temp';
        exit();
    }

    $temp = $_POST['temp'];

    $sql = "UPDATE homeAutomation set State = ? WHERE Appliance = 'Derek_Room_Temp';";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "Something went wrong";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$temp);
        mysqli_stmt_execute($stmt);
        header("Location: ../Derek_AC.php?sucess=yes");
        exit();
    }

?>