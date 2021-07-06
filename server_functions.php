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

    <title>Server Status</title>
    <link rel="stylesheet" href="css/custom_styles.css">
  </head>
  <body>

    <?php
        require 'php/admin_header.php';
    ?>
    
    <div class="container-fluid top-view">
        <h1>Server Status</h1>
    </div>
    <div class="container-fluid main-view">
        <?php
            require 'php/connect.php';
            $sql = "SELECT Name, Status, max(Timestamp) 
            FROM `ServiceStatus` 
            WHERE Timestamp > (CURRENT_TIMESTAMP - INTERVAL 2 MINUTE) 
            GROUP by Name
            HAVING MAX(Timestamp)
            ORDER by Status Desc, Name 
            ";
            $results = mysqli_query($conn,$sql);
            if (mysqli_num_rows($results) == 0){
                echo '<h2 class="">Either something is broken or everything is busted who can say</h2>';
            }
            while ($row = mysqli_fetch_assoc($results)){
                echo '<h2 class="">'.$row['Name'].' : '.$row['Status']. '</h2>';   
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
