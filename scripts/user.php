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
        return password_hash($password, PASSWORD_DEFAULT);
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
    static function confirmAccount($mail,$user)
    {
        //tutaj jeszcze muszę zmienić wartość w tableli użytkownicy na verified ( trzeba też to pole dodać)
        $mail->addAddress("$user->email", "$user->name". " $user->surname");     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Potwierdź swoje konto';
        $mail->Body    = 'Witaj,'. $user->name.' potwierdź swoje konto <a href = "localhost/JPPHPPROJ/Jp-PHP-proj/strony/verify.php?ver_code='.$user->ver_code.'"> tutaj </a>';
        $mail->AltBody = 'Wejdź na localhost/JPPHPPROJ/Jp-PHP-proj/strony/verify.php?ver_code='.$user->ver_code.' aby potwierdzić swoje konto';
        $mail->send();
        header("location: ../strony/index.php");
    }
    static function resetPassword($mail, $user_mail,$nowe_haslo,$conn)
    {
        $mail->addAddress("$user_mail", "$user_mail"); 
        $mail->isHTML(true);                      
        $user = User::findUserByMail($user_mail,$conn);
        $hash_new_pass = User::hashUserPassword($nowe_haslo);
        User::replacePassword($user,$hash_new_pass,$conn);
        $mail->Subject = 'Nowe hasło';
        $mail->Body    = "Witaj, wybrałeś opcję wygenerowania nowego hasła, oto ono: $nowe_haslo";
        $mail->AltBody    = "Witaj, wybrałeś opcję wygenerowania nowego hasła, oto ono: $nowe_haslo";
        $mail->send();
        header("location: ../strony/logandreg.php");
    }
    static function generateSafePassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=<>?';
        $characters_length = strlen($characters);
        $password = '';
    
        for ($i = 0; $i < 16; $i++) {
            $password .= $characters[random_int(0, $characters_length - 1)];
        }
        return $password;
    }
    static function findUserByMail($email, $conn){
        $stmt= $conn->prepare("SELECT * FROM users where email=?");
        $stmt ->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $row = $result->fetch_assoc();
        return new User($row["id_user"],$row["name"],$row["surname"],$row["email"],$row["password"],$row["role_id"],$row["ver_code"]); 
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
        $stmt= $conn->prepare("INSERT INTO `users` (`name`, `surname`, `email`,`role_id`, `password`,`ver_code`) VALUES (?, ?, ?,?, ?,?);");
        $pass = User::hashUserPassword($user->password);
        $stmt ->bind_param('sssiss',$user->name,$user->surname,$user->email,$user->role,$pass,$user->ver_code);
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
    static function replacePassword($user, $newPassword, $conn){
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE users.email = ?;" );
        $stmt ->bind_param('ss',$newPassword,$user->email);
        $stmt->execute();
        $stmt->close();

    }
    //Rola = -2 Tylko niezalogowani, Rola = -1 Wszyscy (razem z niezalogowanymi), Rola = 0 Tylko zalogowani, Rola = 1 Zwykły user, Rola =2 admin 
    static function hasPermission($role){
        if($role ==-2){
            if(isset($_SESSION["auth_user"])){
                header("location: ./index.php");
            }
        }
        elseif($role < -1){
            if(!isset($_SESSION["auth_user"])){
                header("location: ./index.php");
            }
            elseif($role!=0){
                if($_SESSION["auth_user"]["role"]!= $role){
                    header("location: ./index.php");
                }
                }
            }
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