<?php 
session_start();
if(isset($_SESSION["auth_user"]) && session_status()==2){
  header("location: ./index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Register Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, #333, #222);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 300px;
    }

    .form-container {
      padding: 20px;
    }

    .form-container h2 {
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 8px;
    }

    input {
      padding: 8px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      padding: 10px;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #555;
    }
    .fon {
        color:black;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-container">
      <h2 class ="fon" >Login</h2>
      <form action="../scripts/login.php" method="post">
        <label class ="fon" for="login-email">Email:</label>
        <input type="text" id="login-email" name="login-email" required>

        <label class ="fon" for="login-password">Hasło:</label>
        <input type="password" id="login-password" name="login-password" required>

        <button type="submit">Logowanie </button>
      </form>

    </div>
  </div>

  <div class="container" style="margin-left: 20px;">
    <div class="form-container">
      <h2 class ="fon">Register</h2>
      <form action="../scripts/register.php" method="post">
        <label class ="fon" for="register-firstname">Imię:</label>
        <input type="text" id="register-firstname" name="register-firstname" required>
        <label class ="fon" for="register-lastname">Nazwisko:</label>
        <input type="text" id="register-lastname" name="register-lastname" required>

        <label  class ="fon" for="register-email">Email:</label>
        <input type="email" id="register-email" name="register-email" required>

        <label class ="fon" for="register-password">Hasło:</label>
        <input type="password" id="register-password" name="register-password" required>
        <label class ="fon" for="register-password2">Powtórz hasło:</label>
        <input type="password" id="register-password2" name="register-password2" required>

        <button type="submit">Rejestracja</button>
      </form>

    </div>
  </div>
</body>
</html>
