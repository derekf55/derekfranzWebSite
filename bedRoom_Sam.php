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
    </style>
  </head>
  <body>
  <div class="container-fluid main-view">
        

  <?php
  // Lights 
        require "php/connect.php";
        require "php/sam_header.php";
        $sql = "SELECT Name,State,Appliance FROM homeAutomation WHERE groupName = 'Sam_Room' and Type = 'Light';";
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

    <?php
    // Blinds
        require "php/connect.php";
        $sql = "SELECT Name,State,Appliance FROM homeAutomation WHERE groupName = 'Sam_Room' and Type = 'Blinds';";
	    $results = mysqli_query($conn,$sql);
	    while ($row = mysqli_fetch_assoc($results)){
            $name = $row['Name'];
            $appliance = $row['Appliance'];
            $state = $row['State'];
            if ($state == 0){
                $state = 'up';
            } else{
                $state = 'down';
            }

            echo '<div class="d-flex justify-content-center ">';
            echo '<button type="button" onclick="window.location.href = \'php/toggle.php?appliance='.$appliance.'&changeState=True\';" 
            class="btn btn-lg btn-options" style="background:rgb(29, 84, 171);color:white;">Roll '.$name.' '.$state.'</button>';
            echo '</div>';
        }
        ?>


        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'index.php';" 
            class="btn btn-lg btn-options" style="background:rgb(255, 186, 0);">Back</button>
        </div>
            
        </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
