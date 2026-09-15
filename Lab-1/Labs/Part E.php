<?php

class Person
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function introduce()
    {
        echo "My name is " . $this->name . "<br>";
    }
}

class Student extends Person
{
    function study()
    {
        echo $this->name . " is studying.";
    }
}

$student1 = new Student("Ahmad");

$student1->introduce();
$student1->study();

?>