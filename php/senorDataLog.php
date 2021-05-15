<?php
    require 'connect.php';
    if (!isset($_POST['sensorName']) || !isset($_POST['location']) || !isset($_POST['sensorReading']) || !isset($_POST['sensorType'])){
        echo 'Missing required data';
        exit();
    }
    $sensorName = $_POST['sensorName'];
    $location = $_POST['location'];
    $sensorReading = $_POST['sensorReading'];
    $sensorType = $_POST['sensorType'];

    if (empty($sensorName) || empty($sensorReading) || empty($location) || empty($sensorType)){
        echo 'There is a field that is not set';
        exit();
    }

    $sql = 'INSERT INTO SensorData (SensorName, Location, SensorReading, SensorType) VALUES (?,?,?,?);';
    $stmt = mysqli_stmt_init($conn);
    // If the statement fails to execute  
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "Failed to execute SQL";
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssss",$sensorName, $location, $sensorReading, $sensorType);
    mysqli_stmt_execute($stmt);
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    echo 'success';

  