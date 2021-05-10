<?php

if (isset($_POST['login-submit'])){
    require "connect.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Check if there is an empty field
    if (empty($email) || empty($password)){
        header('Location: ../login.php?error=emptyfield');
        exit();
    }
    else{
        $sql = "SELECT * FROM userinfo WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../login.php?error=sql");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)){
                $pwdcheck = password_verify($password, $row['pwd']);
                if ($pwdcheck == False){
                    header("Location: ../login.php?error=wrongpass&email=".$email);
                    exit();
                }
                else if ($pwdcheck == True){
                    //echo 'made it here';
                    //exit();
                    session_start();
                    $_SESSION['uid'] = $row['userid'];
                    $_SESSION['useremail'] = $row['email'];
                    $_SESSION['userType'] = $row['UserType'];
                    setcookie("rememberme", $row['userid'], time() + (86400 * 80), '/');
                    //setcookie("userType", $row['UserType'], time() + (86400 * 80), '/');
                    header("Location: ../index.php?login=sucess");
                    
                }
                else{
                    header("Location: ../login.php?error=wrongpass");
                    exit(); 
                }
            }
            else{
                header("Location: ../login.php?error=nouser"); 
                exit();
            }
        }
    }
}
else{
    echo 'wer here';
    exit();
    header("Location: ../login.php");
    exit();
}


