<?php
class User{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $password;
    function __construct($name, $surName, $email, $password){
        $this->name = $name;
        $this->surname = $surName;
        $this->email = $email;
        $this->password = $password;
    }
    // metoda haszująca hasło przy pomocy argon2id
    static function hashUserPassword($password){
        return password_hash($password, PASSWORD_ARGON2ID);
    }
    // Szuka użytkownika w bazie danych i zwraca jego dane
    static function findUser($email,$password,$conn){
        $stmt= $conn->prepare("SELECT * FROM users where email=?");
        $stmt ->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $row = $result->fetch_assoc();
        echo $password;
        echo $row['password'];
        if(password_verify($password,$row['password'])){
            return $row;
        }
        else{
            return null;    
        }
    }
    // dodawanie użytkownika
    static function addUser($user, $conn){
        echo $user->surname;
        $stmt= $conn->prepare("INSERT INTO `users` (`name`, `surname`, `email`, `password`) VALUES (?, ?, ?, ?);");
        $pass = User::hashUserPassword($user->password);
        $stmt ->bind_param('ssss',$user->name,$user->surname,$user->email,$pass);
        $stmt->execute();
        $stmt->close();

    }
    // aktualizacja użytkownika znajdującego się pod określonym id 
    static function updateUser($userId, $newUser){
        $stmt = $conn->prepare("UPDATE users SET name = ?, surname = ?, password = ?  WHERE users.id = ?;" );
        $stmt ->bind_param('sssi',$newUser->name,$newUser->surName,$newUser->password,$userId);
        $stmt->execute();
        $stmt->close();

    }

        
        
}
?>