<?php
class Student {
    public $name;
    public $grade;

    public function __construct($name, $grade)     {
        $this->name = $name;
        $this->grade = $grade;
    }
    public function getGrade() {
        return $this->grade;
    }
}
?>