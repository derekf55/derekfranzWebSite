<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="jquery/bootstrap.min.css" crossorigin="anonymous">

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
        $sql = "SELECT SensorInfo.Location, ROUND(AVG(SensorReading),2) as SensorReading 
        FROM SensorData 
        JOIN SensorInfo 
        on SensorInfo.SensorName = SensorData.SensorName
        WHERE Timestamp > (CURRENT_TIMESTAMP - INTERVAL 3 MINUTE)
        GROUP BY Location
        HAVING max(Timestamp)";

        $results = mysqli_query($conn,$sql);
        if (mysqli_num_rows($results) == 0){
            echo '<h2 class="">There was a problem getting the temperature</h2>';
        }
        while ($row = mysqli_fetch_assoc($results)){
            if ($row['Location'] == "Derek's Room" && $_SESSION['userType'] != "admin"){
                continue;
            }
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
    <script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
