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

    <link rel="apple-touch-icon" sizes="120x120" href="img/tv/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/tv/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/tv/apple-touch-icon-180.png">

    <title>LED Control</title>
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
            margin-right:5px;
            margin-left:5px;
            border-radius:100px;
            padding-bottom:40px;
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

        <div class="d-flex justify-content-center ">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=LEDpower';" 
            class="btn btn-primary btn-lg btn-options">Power</button>
        </div>
        <div class="d-flex justify-content-center ">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=fade';" 
            class="btn  btn-lg btn-options btn-dual" style="background:rgb(15, 28, 22); color:white;">Vibe</button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=Slow';" 
            class="btn  btn-lg btn-options btn-dual" style="background:rgb(50, 168, 82); color:white;">Slow</button>
        </div>
        
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=red1';" 
            class="btn btn-danger btn-lg btn-options button-side" ></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=green1';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(26, 128, 4);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=blue1';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(5, 28, 120);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=white1';" 
            class="btn  btn-lg btn-options button-side" style="background:white; border: 2px solid black;"></button>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=red2';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(209, 91, 0);"> </button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=green2';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(32, 158, 5);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=blue2';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(39, 73, 207);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=white2';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(227, 177, 219);"></button>
        </div>  
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=red3';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(230, 143, 76);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=green3';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(11, 219, 216);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=blue3';" 
            class="btn  btn-lg btn-options button-side"style="background:rgb(69, 7, 102);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=white3';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(161, 127, 155);"></button>
        </div>  
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=red4';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(255, 185, 71);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=green4';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(9, 171, 169);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=blue4';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(137, 34, 191);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=white4';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(155, 188, 196);"></button>
        </div>  
        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=red5';" 
            class="btn  btn-lg btn-options button-side"style="background:rgb(227, 226, 5);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=green5';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(5, 120, 118);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=blue5';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(219, 7, 235);"></button>
            <button type="button" onclick="window.location.href = 'php/addCommand.php?command=white5';" 
            class="btn  btn-lg btn-options button-side" style="background:rgb(135, 166, 173);"></button>
        </div>      
        
        

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
    <script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
