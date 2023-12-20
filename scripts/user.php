<?php
class User{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $password;
    function __construct($id,$name, $surName, $email, $password){
        $this->id = $id;
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
        if(password_verify($password,$row['password'])){
            return new User($row["id_user"],$row["name"],$row["surname"],$row["email"],$row["password"]); 
        }
        else{
            return null;    
        }
    }
    // dodawanie użytkownika zwraca true jeśli użytkownik zostanie dodany, fale jeśli nie
    static function addUser($user, $conn){
        echo $user->surname;
        $stmt= $conn->prepare("INSERT INTO `users` (`name`, `surname`, `email`, `password`) VALUES (?, ?, ?, ?);");
        $pass = User::hashUserPassword($user->password);
        $stmt ->bind_param('ssss',$user->name,$user->surname,$user->email,$pass);
        $stmt->execute();
        $outcome =$stmt->affected_rows==1;
        $stmt->close();
        return $outcome;

    }
    // aktualizacja użytkownika znajdującego się pod określonym id 
    static function updateUser($userId, $newUser, $conn){
        $stmt = $conn->prepare("UPDATE users SET name = ?, surname = ?, password = ?  WHERE users.id_user = ?;" );
        $stmt ->bind_param('sssi',$newUser->name,$newUser->surname,$newUser->password,$userId);
        $stmt->execute();
        $stmt->close();

    }
    static function logInUser($user){
        $_SESSION["auth_user"] = array(
            'id'       => $user->id,
            'name'     => $user->name,
            'surname'  => $user->surname,
            'email'    => $user->email,
        );
        print_r($_SESSION["auth_user"]);
    }
    static function logOut(){
        unset($_SESSION["auth_user"]);
    }

        
        
}
?>