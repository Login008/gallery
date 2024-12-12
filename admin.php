<?php
// admin.php - Главная страница для администратора
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
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
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <nav>
        <ul>
            <li><a href="view_art.php">View Art</a></li>
            <li><a href="add_art.php">Add Art</a></li>
        </ul>
    </nav>
    <a href="logout.php">Logout</a>
</body>
</html>
