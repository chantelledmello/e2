<?php 

require 'Person.php';

$person = new Person('Kiara','Dmello', 15);
echo $person->getFullName();
echo $person->getClassification();


$person2 = new Person('John', 'Harvard', 45);
echo $person2->getFullName();
echo $person2->getClassification();