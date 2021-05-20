<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/tv/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/tv/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/tv/apple-touch-icon-180.png">

    <title>AC Control</title>
    <style>
        
        .main-view{
            margin-top:30px;
        }
        .main-test{
            align:center;
        }
        .btn-options{
            display:block;
            margin-bottom: 20px;
            width: 300px;
        }
        .button-side{
            margin-right:10px;
            margin-left:10px;
        }
        .button-select{
            margin-bottom:10px;
            margin-bottom: 20px;
            display:block;
            width: 150px;
        }
        .button-volMany{
            margin-bottom:10px;
            margin-bottom: 20px;
            display:block;
            width: 150px;
        }
        .button-vol{
            margin-bottom:10px;
            margin-bottom: 20px;
            display:block;
            width: 200px;
        }
        .he{
            text-align:center;
        }

    </style>
  </head>
  <body>

    <?php
        require 'php/header.php';
    ?>
    
    <div class="container-fluid he">
    <?php
        require "php/connect.php";
        $sql = "SELECT Location, ROUND(AVG(SensorReading),2) as SensorReading FROM SensorData WHERE Timestamp > (CURRENT_TIMESTAMP - INTERVAL 3 MINUTE) AND SensorType = 'Temperature_Sensor' group by Location having MAX(Timestamp)";

        $results = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($results)){
            echo '<h2 class="">'.$row['Location'].' '.$row['SensorReading'].' °F</h2>';   
        }
    ?>
    </div>

  <div class="container-fluid main-view">
        <div class="d-flex justify-content-center ">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=AC_Power';" 
            class="btn btn-primary btn-lg btn-options">AC ON/OFF</button>
        </div>
             

        

        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=AC_Fan_Faster';" 
            class="btn btn-dark btn-lg button-vol button-side">Fan Down</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=AC_FanSlow';" 
            class="btn btn-info btn-lg button-vol button-side">Fan Up</button>
        </div>
        
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=AC_Temp_Down';" 
            class="btn btn-dark btn-lg button-vol button-side">Temp Down</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=AC_Temp_Up';" 
            class="btn btn-info btn-lg button-vol button-side">Temp Up</button>
        </div>
        
 

        

        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'index.php';" 
            class="btn btn-lg btn-options" style="background:rgb(255, 186, 0);">Back</button>
        </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>