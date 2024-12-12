<?php
// view_art.php - Просмотр картин
session_start();

if (!isset($_SESSION['user_role'])) {
    header('Location: index.php');
    exit();
}

// Подключение к базе данных
$conn = new mysqli('localhost', 'root', '', 'gallery_db');
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$sql = "SELECT * FROM artworks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Art</title>
</head>
<body>
    <h1>Gallery</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['artist']); ?></td>
                    <td><?php echo htmlspecialchars($row['year']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="<?php echo $_SESSION['user_role'] === 'admin' ? 'admin.php' : 'user.php'; ?>">Back to Dashboard</a>
</body>
</html>
