<?php
session_start();
require_once("./connect.php");
require_once("./user.php");
$user = new User($_POST["name"],$_POST["surname"],$_POST["email"],$_POST["password"]);
if(User::addUser($user,$conn)){
    $_SESSION["success"] = "Pomyślnie założono konto";

}else{
    $_SESSION["error"] = "Nastąpił nieoczekiwany błąd, spróbuj ponownie później";
}

?>