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

    <title>TV Control</title>
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

    </style>
  </head>
  <body>
  <div class="container-fluid main-view">
        <div class="d-flex justify-content-center ">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=TVPower';" 
            class="btn btn-primary btn-lg btn-options">TV ON/OFF</button>
        </div>
        <!--<div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Sleep';" 
            class="btn btn-danger btn-lg btn-options">Sleep</button>
        </div>    -->
        <div class="d-flex justify-content-center">
            
        </div>    

        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Input';" 
            class="btn btn-success btn-lg btn-options button-side">Input</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Mute';" 
            class="btn btn-lg btn-options" style="background:rgb(52, 120, 140);color:white;">Mute</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=VolumeDown5';" 
            class="btn btn-dark btn-lg button-volMany button-side">- 5</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=VolumeDown';" 
            class="btn btn-dark btn-lg button-vol button-side">Volume Down</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=VolumeUp';" 
            class="btn btn-info btn-lg button-vol button-side">Volume Up</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=VolumeUp5';" 
            class="btn btn-info btn-lg button-volMany button-side">+ 5</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=TVup';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(135, 61, 156);color:white;">Up</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=TVleft';" 
            class="btn btn-lg btn-options button-side" style="background:rgb(235, 64, 52);color:white;">Left</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Select';" 
            class="btn btn-lg  button-select " style="background:rgb(122, 69, 120);color:white;">Select</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=TVright';" 
            class="btn btn-info btn-lg btn-options button-side" style="background:rgb(66, 135, 245);color:white;">Right</button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=TVdown';" 
            class="btn btn-lg btn-options button-side" style="background:rgb(50, 168, 82);color:white;">Down</button>
        </div>
  <!--      <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=ChannelDown';" 
            class="btn btn-dark btn-lg btn-options button-side">Channel Down</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=ChannelUp';" 
            class="btn btn-info btn-lg btn-options button-side">Channel Up</button>
	</div>
-->
<!--
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=ExtraInput1';" 
            class="btn btn-info btn-lg btn-options button-side" style="background:rgb(144, 3, 252)">Extra Input 1</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=ExtraInput2';" 
            class="btn btn-primary btn-lg btn-options button-side" style="background:rgb(6, 69, 150)">Extra Input 2</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=ExtraInput3';" 
            class="btn btn-dark btn-lg btn-options button-side" style="background:rgb(0, 143, 29)">Extra Input 3</button>
	</div>
-->
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
