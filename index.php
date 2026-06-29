<?php
require 'Student.php';

$student1= new Student('Asad', 95);
$student2= new Student('Fadumo', 88);

echo $student1->name . " - " . $student1->getResult() . "<br>";
echo $student2->name . " - " . $student2->getResult() . "<br>";

?>