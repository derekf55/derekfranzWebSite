<?php
require 'connect.php';
use PHPMailer\PHPMailer\PHPMailer;
//Check if the user is entering from the form
if(isset($_POST['reset'])){
    
    //Set two token variables
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    //url to send user to for password reset
    $url = 'https://derekfranz.live/homework_v5/create-new-pass.php?selector='.$selector.'&validator='.bin2hex($token);

    //Expiration time for user to reset their password
    //date(u) = current time and 1800 is 1 hour in seconds
    $expires = date('U')+1800;

    $userEmail = $_POST['email'];
    
    //Prepared statement to delete exisitng token in database
    $sql = 'DELETE FROM pwdReset WHERE pwdResetEmail=?';
    $stmt = mysqli_stmt_init($conn);
    //If sql statment fails
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo 'error1';
        exit();
    }
    //If the sql sucesseds
    else{
        mysqli_stmt_bind_param($stmt,'s',$userEmail);
        mysqli_stmt_execute($stmt);
    }

    //Prepared statement to insert token data into database
    $sql = 'INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES(?,?,?,?)';
    $stmt = mysqli_stmt_init($conn);
    //If sql statment fails
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo 'error2';
        exit();
    }
    //If the sql sucesseds
    else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,'ssss',$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    //Info about email that is sent to email
    $to = $userEmail;
    $subject = "Reset your password for Derek's Website";
    //Message in HTML
    $message = '<p>There was a request to reset your password.  Click <a href="'.$url.'">here</a> to reset.  If you did not make this request you can ignore this email.</p>';
    $headers = "From: Derek <derekfran55@gmail.com>\r\n";
    $headers .= "Reply-To: <derekfran55@gmail.com>\r\n";
    $headers .= "Content-type: text/html\r\n";

    #mail($to,$subject,$message,$headers);


require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "derekfranz.live@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "3mt<3Q{c";

//Set who the message is to be sent from
$mail->setFrom('derekfranz.live@gmail.com', 'Derek Franz');

//Set an alternative reply-to address
$mail->addReplyTo('derekfranz.live@gmail.com', 'Derek Franz');

//Set who the message is to be sent to
$mail->addAddress($to, '');

//Set the subject line
$mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);

//Replace the plain text body with one created manually
$mail->AltBody = 'There was a request to reset your password.  Click the attached link to reset password.  If you did not make this request you can ignore this email.'.$url;


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    exit();
} else {
    header('Location: ../login.php?reset=sucess');
    echo "Message sent!";
    exit();
}



   



}

//If the user entered from outside of the form
else{
    header('Location: ../index.php');
}



?>
