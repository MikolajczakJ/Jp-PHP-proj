<?php
session_start();
require_once("./connect.php");
require_once("./user.php");
$user = User::findUser($_POST["email"],$_POST["password"],$conn);
if($user == null) {
$_SESSION["error"] = "Błędny login lub hasło";
}else{

    echo "Śmiga";
}

?>