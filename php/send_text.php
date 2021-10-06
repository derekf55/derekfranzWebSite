<?php
    require 'connect.php';
    if (!isset($_POST['tts'])){
        echo 'No text sent';
        exit();
    }

    $tts = $_POST['tts'];
    $speaker = $_POST['Speaker'];
    if ($tts == ""){
        header("Location: ../text-to-speech.php?sucess=yes");
    }

    $sql = "INSERT INTO `SoundQueue`(`TTS`,`Speaker`) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "Something went wrong";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"ss",$tts, $speaker);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO `ProcessToRun` (`Command`,`Server`) VALUES ('tts','Server');";
    mysqli_query($conn,$sql);
    header("Location: ../text-to-speech.php?sucess=yes");
    

?>