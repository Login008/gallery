<?php
// add_art.php - Форма добавления картины
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Подключение к базе данных
    $conn = new mysqli('localhost', 'root', '', 'gallery_db');
    if ($conn->connect_error) {
        die('Database connection failed: ' . $conn->connect_error);
    }

    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $year = $_POST['year'];

    $sql = "INSERT INTO artworks (title, artist, year) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $title, $artist, $year);

    if ($stmt->execute()) {
        echo "<p>Art added successfully!</p>";
    } else {
        echo "<p>Error adding art: " . $stmt->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Art</title>
</head>
<body>
    <h1>Add New Art</h1>
    <form action="" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="artist">Artist:</label>
        <input type="text" id="artist" name="artist" required><br>

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required><br>

        <button type="submit">Add Art</button>
    </form>
    <a href="admin.php">Back to Dashboard</a>
</body>
</html>
