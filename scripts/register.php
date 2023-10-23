<?php
require_once("./connect.php");
require_once("./user.php");
$user = new User($_POST["name"],$_POST["surname"],$_POST["email"],$_POST["password"]);
User::addUser($user,$conn);

?>