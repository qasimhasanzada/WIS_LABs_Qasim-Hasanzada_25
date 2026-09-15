<?php

class Vehicle
{
    protected $brand;

    function __construct($brand)
    {
        $this->brand = $brand;
    }

    function start()
    {
        echo "The vehicle is starting.<br>";
    }
}

class Car extends Vehicle
{
    function showBrand()
    {
        echo "Car brand: " . $this->brand;
    }
}

$car1 = new Car("Toyota");

$car1->start();
$car1->showBrand();

?>