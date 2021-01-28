<?php

$dbServername = "192.168.2.51";
$dbUsername = "derek";
$dbPassword = "Firestare5%";
$dbName = "homeAutomation";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if (!$conn){
  die("Connection Failed". mysqli_connect_error());
}

?>
