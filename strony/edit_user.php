<?php
session_start();
if(!isset($_SESSION["auth_user"])){
    header("location: ./index.php");
}
else{
    if($_SESSION["auth_user"]["role"]!= 2){
        header("location: ./index.php");
    }
}
if (!isset($_GET['id'])) {
    echo 'User ID is missing.';
    exit();
}
$userID = $_GET['id'];
require_once("../scripts/connect.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE id_user = $userID";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo 'User not found.';
    exit();
}

$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input here
    require_once "../scripts/user.php";
    $newFirstName = $_POST['firstname'];
    $newLastName = $_POST['surname'];
    // $isAdmin = isset($_POST['is_admin']) ? 1 : 0;

    // Update user details in the database
    // Use prepared statements for security in a production environment
$editUser = new User($userID,$newFirstName,$newLastName,$user["email"],$user["password"]);
    User::updateUser($userID,$editUser,$conn);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>Edit User</h2>

        <form method="post" action="">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $user['name']; ?>" required> <br>

            <label for="surname">Last Name:</label>
            <input type="text" id="surname" name="surname" value="<?php echo $user['surname']; ?>" required><br>

            <!-- <label for="is_admin">Admin:</label>
            <input type="checkbox" id="is_admin" name="is_admin" <?php echo $user['is_admin'] ? 'checked' : ''; ?>> -->

            <button type="submit">Save Changes</button>
        </form>

        <a href="index.php">Back to User List</a>
    </div>

</body>
</html>