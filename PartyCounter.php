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
                
                join knownpeople
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
