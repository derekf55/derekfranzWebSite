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
    <link rel="stylesheet" href="css/custom_styles.css">

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
        .people_here{
            text-align:left;
        }
    </style>
  </head>
  <body>
  <div class="container-fluid he">
  
        
  
  <?php
        require "php/connect.php";
        require "php/admin_header.php";  
        $timezone = 'America/Chicago';
        date_default_timezone_set($timezone);  

        $sql = "SELECT PriorityLevel FROM `personDetectionPriority` WHERE ID = 1";
        $results = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($results)){
            echo '<h1 class="">Priority Level : '.$row['PriorityLevel'].'</h1>';
        
        }
        $filePath = 'php/peopleHere.sql';
        $fileReader = fopen($filePath, "r") or die ("Unable to open SQL");
        $sql = fread($fileReader,filesize($filePath));

        $results = mysqli_query($conn,$sql);
        #echo $results;
        while ($row = mysqli_fetch_assoc($results)){
            $timeArrived = strtotime($row['Last_Updated']);
            // If the data hasnt been updated in at least three minutes assume that its bad
            if ((time()-$timeArrived) > 180 ){
                echo '<h2>Data too old</h2>';
                echo '<h2>Check that presence detection is running</h2>';
                break;
            }
            echo '<h2 class="">'.$row['Name'].'</h2>';
            
        }
        mysqli_close($conn);


    ?>
    
    <div class="container-fluid ">
    <form action="php/set_priority.php" method="POST"> 
        <div class="d-flex justify-content-center ">
                <h2>Set Priority Level</h2>
        </div>
        <div class="d-flex justify-content-center he btn-options selection_options">
            <select class=" custom-select selector " id="priority" name="priority">
                <?php
                    require "php/connect.php";
                    $sql = "SELECT PriorityLevel FROM `personDetectionPriority` WHERE ID != 1";
                    $results = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($results)){
                        $PriorityLevel = $row['PriorityLevel'];
                        echo '<option name="priority" value="'.$PriorityLevel.'">'.$PriorityLevel.'</option>';
                    
                    }

                ?>
            </select>
        </div>  

        <div class="d-flex justify-content-center">
            <button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg btn-options">Submit</button>
        </div>

    </form> 
    </div>

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



