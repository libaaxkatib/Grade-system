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
   public function getResult(){
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
     public function getAverage($grades){
    $total = 0;
    foreach ($grades as $g) {
        $total += $g;
    }
    return $total / count($grades);
   }
}


?>