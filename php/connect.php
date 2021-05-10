<?php

$dbServername = "webserver.com";
$dbUsername = "derek";
$dbPassword = "Firestare5%";
$dbName = "homeAutomation";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

$emailUserName = "derekfranz.live@gmail.com";
$emailPassword = "3mt<3Q{c";

if (!$conn){
  die("Connection Failed". mysqli_connect_error());
}

?>
