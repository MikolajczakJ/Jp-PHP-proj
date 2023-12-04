<?php
class Reg {
    private static $passwordPattern = '/^(?=.*\d)(?=.*[A-Za-z])[A-Za-z\d@$!%*?&]{8,}$/';
    private static $emailPattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
    private static $namePattern = '/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+$/u';
    static function ProperEmail($email){
            if(preg_match(self::$emailPattern, $email)) {
                return null;
            } else {
                return "Niepoprawny adres email";
            }
    }
    static function ProperPassword($password){
        if(preg_match(self::$passwordPattern, $password)) {
            return null;
        } else {
            return "Hasło nie spełnia wymagań zabezpieczeń";
        }
    }
    static function ProperName($name){
        if(preg_match(self::$namePattern, $name)) {
            return null;
        } else {
        return "W imieniu lub nazwisku znajdują się nieodpowiednie znaki";
        }
    }

}
?>