<?php
// index.php - Стартовая страница для авторизации
session_start();

if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'admin') {
        header('Location: admin.php');
        exit();
    } elseif ($_SESSION['user_role'] === 'user') {
        header('Location: user.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">Invalid credentials. Please try again.</p>
    <?php endif; ?>
    <form action="auth.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
    <a href="register.php">Register</a>
</body>
</html>
