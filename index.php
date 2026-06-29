<?php
require 'Student.php';

$db = new PDO('sqlite:students.db');
$db->exec("
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        grade INTEGER NOT NULL
    )
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Grade System</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="Magaca student...">
            <input type="number" name="grade" placeholder="Darajo (0-100)">
            <button type="submit">Ku dar</button>
        </form>
    </div>
</body>
</html>