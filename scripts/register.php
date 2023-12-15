<?php
session_start();
require_once("./connect.php");
require_once("./user.php");
<<<<<<< HEAD
$user = new User($_POST["name"],$_POST["surname"],$_POST["email"],$_POST["password"]);
=======
$user = new User($_POST["register-firstname"],$_POST["register-lastname"],$_POST["register-email"],$_POST["register-password"]);
>>>>>>> master
if(User::addUser($user,$conn)){
    $_SESSION["success"] = "Pomyślnie założono konto";

}else{
    $_SESSION["error"] = "Nastąpił nieoczekiwany błąd, spróbuj ponownie później";
}

?>