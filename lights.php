<!doctype html>
<html lang="en">
  <head>

  <?php
    require 'php/header.php';
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="jquery/bootstrap.min.css" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180.png">

    <title>Light Control</title>
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
    </style>
  </head>
  <body>
  <div class="container-fluid main-view">
        
        <?php
        require "php/connect.php";
        $sql = "SELECT Name,State,Appliance FROM homeAutomation WHERE groupName = 'Living_Room';";
	    $results = mysqli_query($conn,$sql);
	    while ($row = mysqli_fetch_assoc($results)){
            $name = $row['Name'];
            $state = $row['State'];
            $appliance = $row['Appliance'];
            if ($state == 0){
                $state = 'on';
            } else{
                $state = 'off';
            }
            echo '<div class="d-flex justify-content-center ">';
            echo '<button type="button" onclick="window.location.href = \'php/toggle.php?appliance='.$appliance.'&changeState=True\';" 
            class="btn btn-lg btn-options" style="background:rgb(255, 186, 0);">Turn '.$name.' '.$state.'</button>';
            echo '</div>';
        }
        ?>

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
