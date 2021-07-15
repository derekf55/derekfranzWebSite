<?php 
require 'connect.php';
if (isset($_GET['command'])){
    $command = $_GET['command'];
    // Commands that the server should run itself
    $forServer = array();
    // Commands that should be run by the pi
    $forPi = array("Donny","netflix","back","LEDpower","fade",'TVPower','Mute','VolumeUp','VolumeUp5','VolumeDown','VolumeDown5','Input','Select', 'TVup','TVdown','TVleft','TVright',
    "ChannelUp","ChannelDown","ExtraInput1","ExtraInput2","ExtraInput3","Sleep","Donny",
    "AC_Power","AC_Fan_Faster","AC_FanSlow","AC_Temp_Down","AC_Temp_Up","Slow");

    $forPi2 = array('Derek_AC_Power','Derek_AC_Temp_Up','Derek_AC_Temp_Down','Derek_AC_Fan_Low','Derek_AC_Fan_Medium','Derek_AC_Fan_High');

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

    if ($command == 'Derek_AC_Power'){
        $sql = "SELECT State FROM homeAutomation WHERE Appliance = 'Derek_AC';";
        $results = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($results)){
            $sql = "UPDATE homeAutomation SET State = -1 WHERE Appliance = 'Derek_Room_Temp';";
            mysqli_query($conn,$sql);
            if ($row['State'] == 1){
                $state = 0;
            } else{
                $state = 1;
            }
        }
        $sql = "UPDATE homeAutomation set State = ? WHERE Appliance = 'Derek_AC';";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "Something went wrong here";
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$state);
            mysqli_stmt_execute($stmt);
        }
    }


    if ($command == 'disableClimate'){
        $sql = "UPDATE homeAutomation set State = -1 WHERE Appliance = 'Derek_Room_Temp'; ";
        mysqli_query($conn,$sql);
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
        } else if (in_array($command, $forPi2)){
            $sql = 'INSERT INTO ProcessToRun (Command,Server) VALUES(?,"Pi2");';
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "Failed to execute SQL";
                exit();
            
            } else{
                mysqli_stmt_bind_param($stmt,"s",$command);
                mysqli_stmt_execute($stmt);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        } 
        
        else{
            header('Location: ' . $_SERVER['HTTP_REFERER']);
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
