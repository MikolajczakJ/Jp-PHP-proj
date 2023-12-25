<?php
class User{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $password;
    public $role;
    public $ver_code;
    function __construct($id,$name, $surName, $email, $password,$role,$ver_code){
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->ver_code = $ver_code;
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
            return new User($row["id_user"],$row["name"],$row["surname"],$row["email"],$row["password"],$row["role_id"],$row["ver_code"]); 
        }
        else{
            return null;    
        }
    }

    static function findUserById($id,$conn){
        $stmt= $conn->prepare("SELECT * FROM users where id_user=?");
        $stmt ->bind_param('s',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $row = $result->fetch_assoc();
            return new User($row["id_user"],$row["name"],$row["surname"],$row["email"],$row["password"],$row["role_id"],$row["ver_code"]); 
    }
    // dodawanie użytkownika zwraca true jeśli użytkownik zostanie dodany, fale jeśli nie
    static function addUser($user, $conn){
        echo $user->surname;
        $stmt= $conn->prepare("INSERT INTO `users` (`name`, `surname`, `email`, `password`,`ver_code`) VALUES (?, ?, ?, ?,?);");
        $pass = User::hashUserPassword($user->password);
        $stmt ->bind_param('sssss',$user->name,$user->surname,$user->email,$pass,$user->ver_code);
        $stmt->execute();
        $outcome =$stmt->affected_rows==1;
        $stmt->close();
        return $outcome;

    }
    // aktualizacja użytkownika znajdującego się pod określonym id 
    static function updateUser($userId, $newUser, $conn){
        $stmt = $conn->prepare("UPDATE users SET name = ?, surname = ?, role_id = ?  WHERE users.id_user = ?;" );
        $stmt ->bind_param('ssii',$newUser->name,$newUser->surname,$newUser->role,$userId);
        $stmt->execute();
        $stmt->close();

    }
    static function logInUser($user){
        $_SESSION["auth_user"] = array(
            'ver_code' => $user->ver_code,
            'role'     => $user->role,
            'id'       => $user->id,
            'name'     => $user->name,
            'surname'  => $user->surname,
            'email'    => $user->email,
        );
    }
    static function logOut(){
        unset($_SESSION["auth_user"]);
    }

        
        
}
?>