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

    <title>Alarm Viewer</title>
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
        .time-input{
            width: 300px;
            margin-bottom: 20px;
        }
        .my-header{
          margin-bottom: 20px;
        }
        .my-alarm{
            margin-bottom: 20px;
            width: 300px; 
        }
        .my-popup{
            margin-bottom: 20px;
            width: 500px; 
        }

        
    </style>
  </head>
  <body>
  <div class="container-fluid main-view">
  <div class="d-flex justify-content-center"> 
  <div class="alert alert-warning alert-dismissible collapse my-popup"  id="delete" role="alert">
          <strong>Delete?</strong> Are you sure you want to  delete?<br>
          <button href="php/delete.php" type="button" id="del" name="del" class="btn btn-success btn-block" onclick="del();">Yes</a>
          <button type="button" id="del" name="del" data-dismiss="alert" class="btn btn-danger btn-block " aria-label="Close" onclick="remov();">No</button>

          </button><br>
        </div>

        </div>

        

        <ul class="list-group">
        
         <?php
            require 'php/connect.php';
            date_default_timezone_set('America/Chicago'); 
            $sql = "SELECT * FROM `alarm` ";
            $results = mysqli_query($conn,$sql);
            if (mysqli_num_rows($results) == 0){
                echo '<div class="d-flex justify-content-center my-header">
                <h1>Currently no alarms</h1>
            </div>';
            } else{
                echo '<div class="d-flex justify-content-center my-header">
                    <h1>See what alarms are set</h1>
                </div>';
                while ($row = mysqli_fetch_assoc($results)){
                    $alarmTime = strtotime($row['alarmTime']);
                    $room = $row['Room'];
                    $id = $row['ID'];
                    //$formated_date = "11:30 PM";
                    $formated_date = date("h:i a",$alarmTime);
    
                    echo '
                    <div class="d-flex justify-content-center">
                     <div class="list-group d-flex justify-content-center my-alarm">
                    <a href="JavaScript:void(0)" class="list-group-item list-group-item-action" id="'.$id.'"onclick="pop('.$id.');">
                     <h5 class="mb-1"> '.$formated_date.' ('.$room.')</h5>
                     
                     </a>
                     </div>
                    </div>';
    
    
                    
                }
            }?> 
            
                <!-- <div class="d-flex justify-content-center">
                 <div class="list-group d-flex justify-content-center my-alarm">
                <a href="JavaScript:void(0)" class="list-group-item list-group-item-action" id=""onclick="pop();">
                 <h5 class="mb-1"> 11:30 PM (Derek's Room)</h5>
                 
                 </a>
                 </div>
                </div> -->


                
           
            

        



        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'index.php';" 
            class="btn btn-lg btn-options" style="background:rgb(255, 186, 0);">Back</button>
        </div>
            
        </div>
        </form>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" crossorigin="anonymous"></script>
    <script >
    function pop(id){
        $("#delete").show('fade');
        window.id = id;
        window.scrollTo(0, 40);

    }
    function remov(){
      $("#delete").show('fade');
      location.reload();
    }
    function del(){
      window.location = 'php/delete_alarm.php?delete='+id;
    }
    </script>
  </body>
</html>
