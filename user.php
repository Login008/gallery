<?php
// user.php - Главная страница для пользователя
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'user') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, User</h1>
    <nav>
        <ul>
            <li><a href="view_art.php">View Art</a></li>
        </ul>
    </nav>
    <a href="logout.php">Logout</a>
</body>
</html>
