<?php
require_once "../scripts/user.php";
require_once "../scripts/connect.php";
if (isset($_POST['verify'])) {
    
    $verificationCode = $_GET['ver_code'];
    User::verifyUser($verificationCode,$conn);
    header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weryfikacja maila</title>
</head>
<body>
    <h1>Weryfikacja maila</h1>
    
    <form method="post">
        <button type="submit" name="verify">Zweryfikuj</button>
    </form>
</body>
</html>