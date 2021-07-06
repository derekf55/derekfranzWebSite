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
    <link rel="stylesheet" href="css/Derek_AC.css">

    <title>Party Counter</title>
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
        require 'php/header.php';
    ?>
    
    <div class="container-fluid main-view">
    

  

    <div class="d-flex justify-content-center">
            <?php
                $sql = "SELECT count(*) as c
                FROM WifiInfo 
                
                right join PartyLog
                on PartyLog.MacAddress = WifiInfo.MacAddress
                
                left join knownpeople
                on knownpeople.macAdd = PartyLog.MacAddress
                
                WHERE WifiInfo.Relevant = 1";
                $results = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($results)){
                    $count = $row['c'];
                    echo '<h1>People who have stoped by:'.$row['c'].'</h1>';  
                }
            ?>
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
