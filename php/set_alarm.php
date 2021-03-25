<?php
    require 'connect.php';
    if (isset($_POST['alarm'])){
        $alarm = mysqli_real_escape_string($conn,$_POST['alarm']);
        $alarm = strip_tags($alarm);
        echo $alarm;

        if (empty($alarm)){
            echo 'alarm empty';
            exit();
        }

        $sql = "INSERT INTO alarm (alarmTime) VALUES (?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "Something went wrong";
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$alarm);
            mysqli_stmt_execute($stmt);
            header("Location: ../alarm.php?sucess=yes");
            exit();
        }

    }

?>