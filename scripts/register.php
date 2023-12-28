<?php
session_start();
require_once("./connect.php");
require_once("./mailer.php");
require_once("./user.php");
$verification_code = bin2hex(random_bytes(16));
$user = new User(0,$_POST["register-firstname"],$_POST["register-lastname"],$_POST["register-email"],$_POST["register-password"],1,$verification_code);
if(User::addUser($user,$conn)){
    $_SESSION["success"] = "Pomyślnie założono konto";
    $user = User::findUserByMail($_POST["register-email"],$conn);
    User::logInUser($user);
    User::confirmAccount($mail,$user);
    header("location:../strony/index.php");
}else{
    $_SESSION["error"] = "Nastąpił nieoczekiwany błąd, spróbuj ponownie później";
}

?>