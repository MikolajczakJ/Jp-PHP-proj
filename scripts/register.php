<?php
session_start();
require_once("./connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["register-firstname"];
    $lastname = $_POST["register-lastname"];
    $email = $_POST["register-email"];
    $password = $_POST["register-password"];
    $password2 = $_POST["register-password2"];
    $errors = array();
    // Walidacja pól
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($password2)) {
        $errors["empty"] = "Wszystkie pola są wymagane";
    }
    // Oczyszczanie firstname i lastname tylko duże i małe litery
    if (!preg_match("/^[\p{L}a-zA-Z]+$/u", $firstname)) {
        $errors["firstname"] = "Nieprawidłowy format imienia, tylko małe i duże litery";
    }
    if (!preg_match("/^[\p{L}a-zA-Z]+$/u", $lastname)) {
        $errors["lastname"] = "Nieprawidłowy format nazwiska, tylko małe i duże litery";
    }
    // Walidacja email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Nieprawidłowy format adresu e-mail";
    }
    // Walidacja zgodności haseł
    if ($password !== $password2) {
        $errors["password2"] = "Hasła nie są identyczne";
    }
    // Oczyszczanie password tylko duże litery, małe litery i cyfry
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/", $password)) {
        $errors["password"] = "Nieprawidłowy format hasła <br> Minimum 6 znaków w tym <br> 1 duża litera, 1 mała litera i 1 cyfra";
    }
    // Sprawdzenie, czy wystąpiły jakiekolwiek błędy
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: ../strony/logandreg.php");
        exit();
    }
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
}
?>