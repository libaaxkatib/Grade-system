<?php
require 'Student.php';

$student1= new Student('Asad', 95);
$grades = [95, 88, 72, 90, 85];
$avg = $student1->getAverage($grades);

echo $student1->name . "<br>";
echo "Average: " . $avg . "<br>";
?>