<?php

class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getInfo() {
        return $this->name . " — " . $this->age . " jir";
    }
}

class Student extends Person {
    public $grade;

    public function __construct($name, $age, $grade) {
        parent::__construct($name, $age);
        $this->grade = $grade;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function getResult() {
        if ($this->grade >= 90) {
            return "A - Excellent";
        } elseif ($this->grade >= 80) {
            return "B - Good";
        } elseif ($this->grade >= 70) {
            return "C - Average";
        } else {
            return "F - Fail";
        }
    }
}
?>