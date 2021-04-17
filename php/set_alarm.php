<?php
    require 'connect.php';
    if (isset($_POST['alarm'])){
        $room = $_POST['Room'];
        $alarm = mysqli_real_escape_string($conn,$_POST['alarm']);
        $alarm = strip_tags($alarm);
        #echo $_POST['alarm'];
        $timezone = 'America/Chicago';
        date_default_timezone_set($timezone);
        $alarm = date("Y-m-d H:i:s", strtotime($alarm));
        if ($alarm < date("Y-m-d H:i:s",$_SERVER['REQUEST_TIME'])){
            $alarm = date("Y-m-d H:i:s", strtotime('+1 days',strtotime($alarm)));
            echo $alarm;
            echo $room;
        }

        if (empty($alarm)){
            echo 'alarm empty';
            exit();
        }

        $sql = "INSERT INTO alarm (alarmTime, Room) VALUES (?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "Something went wrong";
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$alarm,$room);
            mysqli_stmt_execute($stmt);
            header("Location: ../alarm.php?sucess=yes");
            exit();
        }

    }

?>