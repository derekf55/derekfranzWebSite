<?php 
require 'connect.php';
if (isset($_GET['command'])){
    $command = $_GET['command'];
    // Commands that the server should run itself
    $forServer = array();
    // Commands that should be run by the pi
    $forPi = array("Donny","netflix","back","LEDpower","fade",'TVPower','Mute','VolumeUp','VolumeUp5','VolumeDown','VolumeDown5','Input','Select', 'TVup','TVdown','TVleft','TVright',
    "ChannelUp","ChannelDown","ExtraInput1","ExtraInput2","ExtraInput3","Sleep","Donny");

    // Add each of the buttons for the vibe lights
    $x = 1;
    while ($x < 6){
        array_push($forPi,'red'.$x);
        array_push($forPi,'green'.$x);
        array_push($forPi,'white'.$x);
        array_push($forPi,'blue'.$x);
        $x = $x +1;
    }
    
    $x = 1;
    if ($command == 'VolumeUp5' || $command == 'VolumeDown5'){
        $x = 6;
        $command = substr($command,0,-1);
    }

    

    do {

        // If the command is meant for the pi
        if (in_array($command, $forPi)){
            $sql = 'INSERT INTO ProcessToRun (Command,Server) VALUES(?,"Pi");';
            $stmt = mysqli_stmt_init($conn);
            
            // If the statement fails to execute  
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "Failed to execute SQL";
                exit();
            // If the statement executes sucessfully 
            }else{
                mysqli_stmt_bind_param($stmt,"s",$command);
                mysqli_stmt_execute($stmt);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } 
        //If the command is accepted  
        } else if (in_array($command, $forServer)){
            $sql = 'INSERT INTO ProcessToRun (Command,Server) VALUES(?,"Server");';
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "Failed to execute SQL";
                exit();
            
            } else{
                mysqli_stmt_bind_param($stmt,"s",$command);
                mysqli_stmt_execute($stmt);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

        // If the command is not accepted 
        } else{
            echo 'Not a valid command';
            exit();
        }
        $x--;
    } while ($x > 0);

} else if (isset($_GET['specialVol'])){
        // First go down to 0, guess that the volume is not higher than 50
        $newVol = $_GET['specialVol'];
        if ($newVol == ""){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        for ($i = 0; $i < 50; $i++){
            $sql = 'INSERT INTO ProcessToRun (Command,Server) VALUES(?,"Pi");';
            $stmt = mysqli_stmt_init($conn);
            $command = "VolumeDown";
            
            // If the statement fails to execute  
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "Failed to execute SQL";
                exit();
            // If the statement executes sucessfully 
            }else{
                mysqli_stmt_bind_param($stmt,"s",$command);
                mysqli_stmt_execute($stmt);
                //header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }


        for ($i = 0; $i < newVol; $i++){
            $sql = 'INSERT INTO ProcessToRun (Command,Server) VALUES(?,"Pi");';
            $stmt = mysqli_stmt_init($conn);
            $command = "VolumeUp";

            // If the statement fails to execute  
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "Failed to execute SQL";
                exit();
            // If the statement executes sucessfully 
            }else{
                mysqli_stmt_bind_param($stmt,"s",$command);
                mysqli_stmt_execute($stmt);
                
            }
        }
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}

?>
