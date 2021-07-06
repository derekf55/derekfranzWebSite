<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="jquery/bootstrap.min.css" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180.png">

    <title>Set Alarm</title>
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
        .time-input{
            width: 300px;
            margin-bottom: 20px;
        }
        .my-header{
          margin-bottom: 20px;
        }

        }
    </style>
  </head>
  <body>
  <div class="container-fluid main-view">
        <form action="php/set_alarm.php" method="POST">
          <div class="d-flex justify-content-center">
            <h2 class="my-header">Set an alarm to flicker the lights<h2>
          </div>

        <div class="d-flex justify-content-center">
                <input class="form-control timepicker time-input" name="alarm" id="alarm" type="time">
        </div>

        <div class="d-flex justify-content-center">
        <div class="input-group mb-3 time-input">
          <select class="custom-select selector" id="Room" name="Room">

            <?php
                require "php/connect.php";
                $sql = "SELECT DISTINCT groupName FROM homeAutomation WHERE groupName != 'Remotes' order by groupName ;";
                $results = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($results)){
                    echo $row['groupName'];
                    $groupName = $row['groupName'];
                    echo '<option name="Room" value="'.$groupName.'">'.$groupName.'</option>';
                
                }
                ?>
        </select>
        </div>
        </div>

        <div class="d-flex justify-content-center">
        <button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg btn-options">Submit</button>

        </div>

        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'index.php';" 
            class="btn btn-lg btn-options" style="background:rgb(255, 186, 0);">Back</button>
        </div>
            
        </div>
        </form>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
