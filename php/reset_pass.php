<?php
require 'connect.php';

if(isset($_POST['reset'])){

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($password) || empty($password2)){
        header('Location: '.$_SERVER['HTTP_REFERER'].'&error=emptypass');
        exit();
    }
    else if ($password != $password2){
        header('Location: '.$_SERVER['HTTP_REFERER'].'&error=passmismatch');
        exit();
    }
    else if (strlen($password)<8){
        header('Location: '.$_SERVER['HTTP_REFERER'].'&error=passlength');
        exit();
    }

    $currentDate = date("U");

    $sql = 'SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= '.$currentDate;
    $stmt = mysqli_stmt_init($conn);
    //If sql statment fails
    //If your token has expired
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header('Location: ../forgot_pass_form.php?error=tokenexpired');
        echo 'token expired';
        exit();
    }
    //If the sql sucesseds
    else{
        mysqli_stmt_bind_param($stmt,'s',$selector);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        //If we cant get any rows
	if (!$row = mysqli_fetch_assoc($result)){
	    header('Location: ../forgot_pass_form.php?error=notoken');
            exit();
        }
        else{
            $tokenBin = hex2bin($validator);
            $tokenCheck  = password_verify($tokenBin, $row['pwdResetToken']);
            if ($tokenCheck == FALSE){
                header('Location: ../forgot_pass_form.php?error=badtoken');
                exit();
            }
            else if ($tokenCheck == TRUE){
                $tokenEmail = $row['pwdResetEmail'];
                $sql = 'SELECT * FROM userinfo WHERE email=?';
                $stmt = mysqli_stmt_init($conn);
                //If sql statment fails
                if (!mysqli_stmt_prepare($stmt,$sql)){
                    header('Location: ../forgot_pass_form.php?error=sql');
                    exit();
                }
                //If the sql sucesseds
                else{
                    mysqli_stmt_bind_param($stmt,'s',$tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row  = mysqli_fetch_assoc($result)){
                        header('Location: ../forgot_pass_form.php?error=sql');
                        exit();
                    }
                    else{
                        //Update the password from the database
                        $sql = 'UPDATE userinfo SET pwd=? WHERE email=?';
                        $stmt = mysqli_stmt_init($conn);
                        //If sql statment fails
                        if (!mysqli_stmt_prepare($stmt,$sql)){
                            header('Location: ../forgot_pass_form.php?error=sql');
                            exit();
                        }
                        //If the sql sucesseds
                        else{
                            $hashedNewPwd = password_hash($password, PASSWORD_DEFAULT); 
                            mysqli_stmt_bind_param($stmt,'ss',$hashedNewPwd, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            
                            //Delete the token from the database
                            $sql = 'DELETE FROM pwdReset WHERE pwdResetEmail=?';
                            $stmt = mysqli_stmt_init($conn);
                            //If sql statment fails
                            if (!mysqli_stmt_prepare($stmt,$sql)){
                                header('Location: ../forgot_pass_form.php?error=sql');
                                exit();
                            }
                            //If the sql sucesseds
                            else{
                                mysqli_stmt_bind_param($stmt,'s', $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header('Location: ../login.php?password=reset&email='.$tokenEmail);
                            }

                    }
            


            }
        }
    }
        }
}
}
//If the user entered the wrong way
else{
    header('Location: ../index.php');
    //header('Location: ../index.php');
}
