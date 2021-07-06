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

    <title>Blue Haus</title>
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
        
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'mario.php';" class="btn btn-primary btn-lg btn-options" >Mario Kart Track Picker</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'LED.php';" class="btn  btn-lg btn-options" style="background:rgb(149, 50, 168); color:white;">LEDS</button>
	</div>
    <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'tvRemote.php';" class="btn btn-dark btn-lg btn-options">TV Remote</button>
	</div>
    <div class="d-flex justify-content-center ">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Donny';" class="btn btn-lg btn-options" style="background:rgb(201, 89, 32);color:white;">Generate Quote</button>
        </div>

    <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'AC_Control.php';" class="btn  btn-lg btn-options" style="background:rgb(19, 60, 240); color:white;">AC Control</button>
        </div>

<?php
        //require "php/connect.php";
        require "php/header.php";
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
        </div>

    <?php
        include 'php/footer.php';
    ?>

  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
