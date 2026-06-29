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
}

$rows = $db->query("SELECT * FROM students ORDER BY grade DESC")->fetchAll();
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
    <?php foreach ($rows as $row): 
    $student = new Student($row['name'], $row['grade']);
?>
    <div class="student-item">
        <span><?= $student->name ?></span>
        <span><?= $student->getGrade() ?></span>
        <span><?= $student->getResult() ?></span>
    </div>
<?php endforeach; ?>    
    </div>
</body>
</html>