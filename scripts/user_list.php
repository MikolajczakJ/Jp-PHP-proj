<?php

$searchAttribute = isset($_GET['searchAttribute']) ? $_GET['searchAttribute'] : 'id_user';
$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

require_once("connect.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE $searchAttribute LIKE '%$searchValue%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_user'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['surname'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td><a href="./edit_user.php?id=' . $row['id_user'] . '">Edit </a>';
        echo '<button onclick="deleteUser(' . $row['id_user'] . ')">Delete</button></td>';
        echo '</tr>';
    }
    
    echo '</table>';
} else {
    echo 'No users found.';
}

$conn->close();
?>
