<?php

class Person
{

    # Properties
    public $firstName;
    public $lastName;
    public $age;

    # Methods

    public function __construct(string $firstName, string $lastName, int $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getClassification()
    {
        return ($this->age >= 18) ? 'adult' : 'minor';
    }
}
