<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>User List</h2>

        <!-- Search form -->
        <form action="user_list.php" method="get">
            <label for="searchAttribute">Search by:</label>
            <select name="searchAttribute" id="searchAttribute">
                <option value="id_user">ID</option>
                <option value="name">First Name</option>
                <option value="surname">Last Name</option>
                <option value="email">Email</option>
            </select>
            <input type="text" name="searchValue" placeholder="Search...">
            <button type="submit">Search</button>
        </form>

        <?php include '../scripts/user_list.php'; ?>

    </div>

</body>
</html>