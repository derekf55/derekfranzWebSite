<?php
    require 'connect.php';
    if (!isset($_POST['tts'])){
        echo 'No text sent';
        exit();
    }

    $tts = $_POST['tts'];
    if ($tts == ""){
        header("Location: ../text-to-speech.php?sucess=yes");
    }

    $sql = "INSERT INTO `SoundQueue`(`TTS`) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "Something went wrong";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$tts);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO `ProcessToRun` (`Command`,`Server`) VALUES ('tts','Pi');";
    mysqli_query($conn,$sql);
    header("Location: ../text-to-speech.php?sucess=yes");
    

?>