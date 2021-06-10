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
    <link rel="stylesheet" href="css/Derek_AC.css">

    <title>Derek AC Control</title>
    <style>
        .tempInput{
            width: 300px;
            margin-bottom: 20px;
        }
        .disableClimate{
            margin-left: 10px;
        }
    </style>
    
  </head>
  <body>

    <?php
        require 'php/admin_header.php';
    ?>
    
    <div class="container-fluid main-view">
    <?php
        require "php/connect.php";
        $sql = "SELECT Location, ROUND(AVG(SensorReading),2) as SensorReading 
        FROM SensorData 
        JOIN SensorInfo 
        on SensorInfo.SensorName = SensorData.SensorName
        WHERE Timestamp > (CURRENT_TIMESTAMP - INTERVAL 3 MINUTE)
        and Location = 'Derek''s Room'
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
            <?php
                $sql = "SELECT State FROM homeAutomation WHERE Appliance = 'Derek_AC';";
                $results = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($results)){
                    if ($row['State'] == 1){
                        $state = 'OFF';
                    } else{
                        $state = 'ON';
                    }
                    echo '<button type="button" onclick="window.location.href = `php/addCommand.php?command=Derek_AC_Power`;" 
                    class="btn btn-primary btn-lg btn-dual">AC '.$state.'</button>';
                }
                    $sql = "SELECT State FROM homeAutomation WHERE Appliance = 'Derek_Room_Temp';";
                    $results = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($results)){
                        $t = $row['State'];
                        if ($t != -1){
                            echo '<button type="button" onclick="window.location.href = `php/addCommand.php?command=disableClimate`;" 
                            class="btn btn-secondary btn-lg btn-dual">Disable climate control</button>';
                        } 

                    }



            ?>


            <!-- <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Derek_AC_Power';" 
            class="btn btn-primary btn-lg btn-options">AC ON/OFF</button> -->
        </div>
        
        <div class="d-flex justify-content-center ">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Derek_AC_Temp_Up';" 
            class="btn btn-dark btn-lg btn-dual">Temp Up</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Derek_AC_Temp_Down';" 
            class="btn btn-info btn-lg btn-dual">Temp Down</button>
        </div>

        <div class="d-flex justify-content-center ">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Derek_AC_Fan_Low';" 
            class="btn btn-dark btn-lg btn-triple">Fan Low</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Derek_AC_Fan_Medium';" 
            class="btn btn-info btn-lg btn-triple">Fan Medium</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Derek_AC_Fan_High';" 
            class="btn btn-info btn-lg btn-triple">Fan High</button>
        </div>
        
        

        <form action="php/set_Derek_AC.php" method="POST">
            <div class="d-flex justify-content-center ">
                <h2>Set Climate Control</h2>
            </div>
            <div class="d-flex justify-content-center ">
                    <?php
                        $sql = "SELECT State FROM homeAutomation WHERE Appliance = 'Derek_Room_Temp';";
                        $results = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($results)){
                            $t = $row['State'];
                            if ($t == -1){
                                echo '<input class="form-control  tempInput" name="temp" id="temp" pattern="[0-9]*" type="text">';
                            } else{
                                echo '<input class="form-control  tempInput" name="temp" id="temp" pattern="[0-9]*" type="text" value="'.$t.'">';
                            }
                            
                        }
                    ?>
                    
            </div>

            <div class="d-flex justify-content-center">
                <button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg btn-options">Set</button>

            </div>


        </form>

        

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
