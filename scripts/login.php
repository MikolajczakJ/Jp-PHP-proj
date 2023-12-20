<?php
session_start();
require_once("./connect.php");
require_once("./user.php");
$user = User::findUser($_POST["login-email"],$_POST["login-password"],$conn);
if($user == null) {
$_SESSION["error"] = "Błędny login lub hasło";
}else{
    // tutaj przypisanie danych użytkownika do sesji
    User::logInUser($user);
}

?>