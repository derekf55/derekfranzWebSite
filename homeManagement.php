<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180.png">

    <title>Home Management</title>
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
        .he{
            text-align:center;
        }
    </style>
  </head>
  <body>
  <div class="container-fluid ">

        <h1 class="he">People who are currently here</h1>
  <?php

        require "php/connect.php";
        #$sql = 'SELECT macToName.Name, WifiInfo.last_seen 
        #FROM `WifiInfo` JOIN macToName ON macToName.MacAddress = WifiInfo.MacAddress 
        #WHERE WifiInfo.last_seen > CURRENT_TIMESTAMP - INTERVAL 5 MINUTE 
        #AND WifiInfo.Relevant = 1
        #GROUP by Name
        #HAVING MAX(WifiInfo.last_seen)
        #';

        $filePath = 'php/peopleHere.sql';
        $fileReader = fopen($filePath, "r") or die ("Unable to open SQL");
        $sql = fread($fileReader,filesize($filePath));

        $results = mysqli_query($conn,$sql);
        #echo $results;
        while ($row = mysqli_fetch_assoc($results)){
            echo '<h2 class="he">'.$row['Name'].'</h2>';
            
        }


    ?>

        
        </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>



