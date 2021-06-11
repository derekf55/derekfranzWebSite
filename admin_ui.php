<!doctype html>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180.png">

    <title>Home Control</title>
    <style>
        
        .main-view{
            margin-top:50px;
        }
        .main-test{
            align:center;
        }
        .btn-options{
            display:block;
            margin-bottom: 20px;
            width: 300px;

        } 
        .btn-dual{
            margin-bottom:10px;
            margin-bottom: 20px;
            margin-left: 10px;
            display:block;
            width: 300px;
        }
    </style>
  </head>
  <body>
  <div class="container-fluid main-view">

        <?php 
            include 'php/admin_header.php';
        ?>

  <!--
        <div class="d-flex justify-content-center ">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=PCOn';" class="btn btn-primary btn-lg btn-options">Wake PC</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=WindowsOn';" class="btn btn-success btn-lg btn-options">Start Windows</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=WindowsOff';" class="btn btn-danger btn-lg btn-options">Shutdown Windows</button>
        </div>    
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=PCOff';" class="btn btn-info btn-lg btn-options">Shutdown PC</button>
        </div>
        -->
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'tvRemote.php';" class="btn btn-dark btn-lg btn-options">TV Remote</button>
        </div>

        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'LED.php';" class="btn  btn-lg btn-options" style="background:rgb(149, 50, 168); color:white;">LED</button>
        </div>

        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'homeManagement.php';" class="btn  btn-lg btn-dual" style="background:rgb(20, 115, 128); color:white;">Home Management</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'mario.php';" class="btn  btn-lg btn-dual" style="background:rgb(201, 89, 32);color:white;">Mario Kart Track Picker</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Donny';" class="btn  btn-lg btn-dual" style="background:rgb(133, 51, 45); color:white;">Generate Donny Quote</button>
        </div>



        
        
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'lights.php';" class="btn  btn-lg btn-dual" style="background:rgb(255, 186, 0);">Living Room Lights</button>
            <button type="button" onclick="window.location.href = 'bedRoom.php';" class="btn  btn-lg btn-dual" style="background:rgb(189, 174, 9);">Bed Room Lights</button>
        </div>

        
        <div class="d-flex justify-content-center">
        <button type="button" onclick="window.location.href = 'Derek_AC.php';" class="btn  btn-lg btn-dual" style="background:rgb(45, 90, 133); color:white;">Derek AC Control</button>
            <button type="button" onclick="window.location.href = 'AC_Control.php';" class="btn  btn-lg btn-dual" style="background:rgb(19, 60, 240); color:white;">AC Control</button>
        </div>

        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'alarmViewer.php';" class="btn  btn-lg btn-dual" style="background:rgb(52, 191, 89); color:white;">View Alarms</button>
            <button type="button" onclick="window.location.href = 'alarm.php';" class="btn btn-danger btn-lg btn-dual" >Set Alarm</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'server_functions.php';" class="btn  btn-lg btn-dual" style="background:rgb(63, 141, 153); color:white;">Server Functions</button>
            <button type="button" onclick="window.location.href = 'text-to-speech.php';" class="btn  btn-lg btn-dual" style="background:rgb(50, 168, 82); color:white;">Text To Speech</button>
        </div>
        

        <?php
            include 'php/footer.php';
        ?>
            
        </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
