<?php
require_once("./connect.php");
require_once("./user.php");
$user = User::findUser($_POST["email"],$_POST["password"],$conn);
if($user == null) {
echo "Błędny login lub hasło";
}else{
    echo "Śmiga";
}

?>