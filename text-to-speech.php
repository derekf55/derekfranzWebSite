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

    <title>Bed Room Control</title>
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
        .ttsInput{
            width: 300px;
            margin-bottom: 10px;
        }
    </style>
  </head>
  <body>
  <div class="container-fluid main-view">
        
        <form action="php/send_text.php" method="POST">
        <div class="d-flex justify-content-center">
            <h2 class="my-header">Type the text you'd like to be spoken<h2>
          </div>

          <div class="d-flex justify-content-center">
                <input class="form-control ttsInput" name="tts" id="tts" type="text" autocomplete="off">
        </div>

        <div class="d-flex justify-content-center">
        <button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg btn-options">Submit</button>

        </div>

        </form>



        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'index.php';" 
            class="btn btn-lg btn-options" style="background:rgb(255, 186, 0);">Back</button>
        </div>
            
        </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
