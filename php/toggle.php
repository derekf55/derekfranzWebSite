<?php
require 'connect.php';
// Just reading state data
if (isset($_GET['appliance']) && isset($_GET['changeState'])) {
    if ($_GET['changeState'] == "True"){
        $appliance = $_GET['appliance'];
        $sql = 'SELECT State FROM `homeAutomation` WHERE Appliance=?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "sql error";
            exit();
        } else{
            mysqli_stmt_bind_param($stmt,"s",$appliance);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)){
                $currentState = $row['State'];
            }
            if ($currentState == "1"){
                $newState = "0";
            } else{
                $newState = "1";
                }
            
            $sql = 'UPDATE homeAutomation SET State=? WHERE Appliance=?';
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL error";
                exit();
            } else{
                mysqli_stmt_bind_param($stmt,"ss",$newState,$appliance);
                mysqli_stmt_execute($stmt);
                echo $newState;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
        }
    }
    }
}
if (isset($_GET['appliance']) && isset($_GET['setstate'])) {
    if ($_GET['setstate'] == "on"){
        $newState = "1";
    }else if ($_GET['setstate'] == "off"){
	$newState = "0";
	} 
        $appliance = $_GET['appliance'];
        $sql = 'SELECT State FROM `homeAutomation` WHERE Appliance=?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "sql error";
            exit();
        } else{
            mysqli_stmt_bind_param($stmt,"s",$appliance);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)){
                $currentState = $row['State'];
            }
            
            
            $sql = 'UPDATE homeAutomation SET State=? WHERE Appliance=?';
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL error";
                exit();
            } else{
                mysqli_stmt_bind_param($stmt,"ss",$newState,$appliance);
                mysqli_stmt_execute($stmt);
                echo $newState;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
        }
    }
    }


else if (isset($_GET['appliance'])){
        $appliance = $_GET['appliance'];
        $sql = 'SELECT State FROM `homeAutomation` WHERE Appliance=?;';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "sql error";
            exit();
        } else{
            mysqli_stmt_bind_param($stmt,"s",$appliance);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)){
                echo $row['State'];
                exit();
            }
        }
    
} else if (isset($_GET['group']) && isset($_GET['setstate'])){
    if ($_GET['setstate'] == "on"){
        $newState = "1";
    }else if ($_GET['setstate'] == "off"){
	    $newState = "0";
    } 
    
    $group = $_GET['group'];
    #echo $group;
    #echo $newState;
    $sql = "UPDATE homeAutomation set State=? WHERE groupName=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "sql error";
            exit();
    } else{
            mysqli_stmt_bind_param($stmt,"ss",$newState, $group);
	    mysqli_stmt_execute($stmt);
	    echo $newState;
        }
} else{
    echo "not set";
    exit();
}

