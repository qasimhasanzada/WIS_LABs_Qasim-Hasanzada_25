<?php
// Full Name: [Your Full Name]
// Student ID: [Your Student ID]

// Task 1
class Library
{
    // This is constant because the maximum number of books does not change.
    const MAX_BOOKS = 3;
}

echo "Maximum books allowed: " . Library::MAX_BOOKS . "<br>";

// Task 2
class StudentCounter
{
    public static $count = 0;

    public static function addStudent()
    {
        self::$count++;
    }
}

StudentCounter::addStudent();
StudentCounter::addStudent();
StudentCounter::addStudent();

echo "Total students: " . StudentCounter::$count . "<br>";

// Task 3
abstract class Vehicle
{
    abstract public function start();
}

class Car extends Vehicle
{
    public function start()
    {
        echo "Car engine started.<br>";
    }
}

class Bike extends Vehicle
{
    public function start()
    {
        echo "Bike started.<br>";
    }
}

$car = new Car();
$bike = new Bike();

$car->start();
$bike->start();
?>
