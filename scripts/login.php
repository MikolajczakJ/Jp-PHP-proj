<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["login-email"];
    $password = $_POST["login-password"];

    // Sprawdzenie czy niepuste dane
    if (isset($email, $password) && !empty($email) && !empty($password)) {
        echo "Dane nie puste <br>";

        // Czy poprawny adres email
        $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);     // Czy email
        if ($filteredEmail === true) {
            $trimmedEmail = substr($filteredEmail, 0, 255);     // Do 255 znaków
            if ($trimmedEmail === true) {
                $normalizedEmail = strtolower($trimmedEmail);       // wszystko z małej

                $emailParts = explode('@', $normalizedEmail);       // Sprawdzenie domeny
                $domain = end($emailParts);
                if (!checkdnsrr($domain, 'MX')) {
                    echo "Domena niepoprawna";
                    header("../strony/logandreg.php");
                } else {
                    echo "Adres poprawny";
                    $filterPassword = trim($password);      // Bez białych znaków
        
                    require_once("./connect.php");
                    require_once("./user.php");
                    $user = User::findUser($normalizedEmail,$filterPassword,$conn);
                    if($user == null) {
                        $_SESSION["error"] = "Błędny login lub hasło";
                    }else{
                        // tutaj przypisanie danych użytkownika do sesji
                        User::logInUser($user);
                        header("location: ../strony/index.php");
                    }
                }
            }
        } else {
            echo "Adres niepoprawny";
        }
    } else {
        echo "Dane puste <br>";
    }
}
?>