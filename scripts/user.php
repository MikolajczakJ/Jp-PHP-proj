<?php
require_once "./connect.php";

class User{
    public $id;
    public $name;
    public $surName;
    public $email;
    public $password;
    function __construct($id, $name, $surName, $email, $password){
        $this->id = $id;
        $this->name = $name;
        $this->surName = $surName;
        $this->email = $email;
        $this->password = $password;
    }
    // metoda haszująca hasło przy pomocy argon2id
    static function hash($password){
        return password_hash($password, PASSWORD_ARGON2ID);
    }
    // Szuka użytkownika w bazie danych i zwraca jego dane
    static function findUser($user){
        $stmt= $conn->prepare("SELECT * FROM users where email=?");
        $stmt ->bind_param('s',$user->email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    // aktualizacja użytkownika znajdującego się pod określonym id 
    static function updateUser($userId, $newUser){
        $stmt = $conn->prepare("UPDATE users SET name = ?, surname = ?, password = ?  WHERE users.id = ?;" );
        $stmt ->bind_param('sssi',$newUser->name,$newUser->surName,$newUser->password,$userId);
        $stmt->execute();
    }

        
        
}
?>