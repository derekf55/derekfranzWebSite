<?php

if (isset($_POST['signup'])){
    require 'connect.php';

    //Setting variables from signup form
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //Check that all fields are filled out
    if (empty($email) || empty($password) || empty($password2)){
        header("Location: ../signup.php?error=emptyfields&email=".$email);
        exit();
    }
    //Check if email is valid
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invaildemail");
        exit();
    }
    //Check if password is valid
    else if ($password !== $password2){
        header("Location: ../signup.php?error=passwordmismatch&email=".$email);
        exit();
    }
    //Check if password is 8 characters
    else if (strlen($password)<8){
        header("Location: ../signup.php?error=passwordlength&email=".$email);
        exit();
    }
    //See if E-mail has already been registered
    else{
        $sql = "SELECT email from userinfo WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        //Checks for sql error
        if (!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit(); 
        }
        //Searches if there is a an email in the database
        else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            //Returns each row that contains a match
            $rowsOfResults = mysqli_stmt_num_rows($stmt);
            //See if email is already in database
            if ($rowsOfResults > 0){
                header("Location: ../signup.php?error=emailused");
                exit();
            }
            //Puts user info into website
            else{
                $sql = "INSERT INTO userinfo (email,pwd) VALUES (?,?);";
                $stmt = mysqli_stmt_init($conn);
                //Checks for sql error
                if (!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit(); 
                //Insert data into database
                }
                else{
                    //Hash the password
                    $hashedpwd = password_hash($password,PASSWORD_DEFAULT );
                    //Run sql and return to sucess page
                    mysqli_stmt_bind_param($stmt,"ss",$email,$hashedpwd);
                    mysqli_stmt_execute($stmt);

                    // Log user in?
                    session_start();
                    $sql = "SELECT * FROM userinfo WHERE email=?;";
                    $stmt2 = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt2,$sql)){
                        header("Location: ../signup.php?error=sqlerror");
                        exit(); 
                    }
                    else{
                    mysqli_stmt_bind_param($stmt2,"s",$email);
                    mysqli_stmt_execute($stmt2);
                    $results = mysqli_stmt_get_result($stmt2);
                        if ($row = mysqli_fetch_assoc($results)){
                                $_SESSION['uid'] = $row['userid'];
                                $_SESSION['useremail'] = $row['email'];
                                header("Location: ../index.php?login=sucess");
                    }
                }
            }
        }
    }    
}
    //Close db connection
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    mysqli_close($conn);

}
else{
    header("Location: ../signup.php");
    exit();  
}


?>