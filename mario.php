<!doctype html>
<html lang="en">
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    .text_name{
        text-align: center;
    }
    .btn-options{
            display:block;
            width: 300px;
            margin-top: 20px;

        }
</style>
<title>Mario Kart Track Picker</title>
<body>
    <main role="main" class="container text_name" >
    <div class="container-fluid main-view">
    <?php
        require 'php/connect.php';

        $sql = 'SELECT * FROM mariokart ORDER by rand() LIMIT 1;';

        $results = mysqli_query($conn, $sql);
        $resultsCheck = mysqli_num_rows($results);
        
        while ($row = mysqli_fetch_assoc($results)){
            echo '<h1>'.$row['Track'].'</h1>';
            echo '<h1>'.$row['Cup'].'</h1>';
            $img_name = str_replace(' Cup','',$row['Cup']);
            echo '<img src="img/mario/'.$img_name.'.png" width="250" height="250">';
            

        }
       
        
    ?>

        <div class="d-flex justify-content-center ">
            <button type="button" onClick="window.location.reload();" class="btn btn-danger btn-lg btn-options">New Track</button>
        </div>

        <div class="d-flex justify-content-center">
            <button type="button" onclick="window.location.href = 'index.php';" class="btn btn-lg btn-options" style="background:rgb(255, 186, 0);">Back</button>
        </div>

    </main>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>

    </body>
</html>
