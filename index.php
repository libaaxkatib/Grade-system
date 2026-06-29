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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && $_POST['name'] !== '') {
        $name = $_POST['name'];
        $grade = $_POST['grade'];
        $stm = $db->prepare("INSERT INTO students (name, grade) VALUES (?, ?)");
        $stm->execute([$name, $grade]);
    }
    if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $stm = $db->prepare("DELETE FROM students WHERE id = ?");
    $stm->execute([$id]);
}
}

$rows = $db->query("SELECT * FROM students ORDER BY grade DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade System</title>
    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #f0f4f8;
    font-family: Arial, sans-serif;
    padding: 40px;
}

.container {
    background: white;
    max-width: 600px;
    margin: 0 auto;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

form {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

input {
    flex: 1;
    padding: 10px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 15px;
}

button {
    padding: 10px 20px;
    background-color: #4f46e5;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 15px;
}

.student-item {
    display: flex;
    justify-content: space-between;
    padding: 12px;
    border-bottom: 1px solid #f0f0f0;
    align-items: center;
}

.student-item span {
    font-size: 15px;
    color: #333;
}
.delete-btn {
    padding: 6px 14px;
    background-color: #ef4444;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 13px;
}

.student-item form {
    margin: 0;
    padding: 0;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Grade System</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="Magaca student...">
            <input type="number" name="grade" placeholder="Darajo (0-100)">
            <button type="submit">Ku dar</button>
        </form>
    <?php foreach ($rows as $row): 
    $student = new Student($row['name'], $row['grade']);
?>
    <div class="student-item">
        <span><?= $student->name ?></span>
        <span><?= $student->getGrade() ?></span>
        <span><?= $student->getResult() ?></span>
        <form method="POST">
            <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
            <button type="submit" class="delete-btn">Tirtir</button>
        </form>
    </div>
<?php endforeach; ?>   
    </div>
</body>
</html>