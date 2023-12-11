<?php

class Action
{

    private $car;

    public function __construct()
    {
        $this->car = "Mustang";
    }

    public function setCar($car)
    {
        $this->car = $car;
    }

    public function getCar()
    {
        return $this->car;
    }

    protected function startDrive()
    {
        return "Engine started! $this->car is running!";
    }
}