<?php
session_start();
require_once("./connect.php");
require_once("./user.php");
$user = new User($_POST["register-firstname"],$_POST["register-lastname"],$_POST["register-email"],$_POST["register-password"]);
if(User::addUser($user,$conn)){
    $_SESSION["success"] = "Pomyślnie założono konto";

}else{
    $_SESSION["error"] = "Nastąpił nieoczekiwany błąd, spróbuj ponownie później";
}

?>