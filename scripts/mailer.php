<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;  
    $mail->Username = 'testycovid7@gmail.com';
    $mail->Password = 'apqfuadiktnlneem';
    $mail->SMTPSecure = 'tls';                              //Enable implicit TLS encryption
    $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('testycovid7@gmail.com', 'Testy covid');
    // $mail->addAddress("jakubmikolajczak1ti@gmail.com","test");     //Add a recipient
    $mail->addAddress("$_SESSION[auth_user][email]", "$_SESSION[auth_user][name]");     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Potwierdź swoje konto';
    $mail->Body    = 'Witaj,'. $_SESSION["auth_user"]["name"].' potwierdź swoje konto <a href = "localhost/JPPHPPROJ/Jp-PHP-proj/strony/verify.php?ver_code='.$_SESSION["auth_user"]["name"].'"> tutaj </a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    unset($_SESSION["imie"]);
    unset($_SESSION["email"]);
    unset($_SESSION["nazwisko"]);
    $mail->send();
    echo 'Message has been sent';
    header("location: ../strony/index.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





