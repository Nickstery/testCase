<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once('db/db.php');
require_once('classes/Person.php');
require_once('classes/Department.php');


$person = new Person('aaaaaaaaaaaa2');

if(!empty($person->id)) {
    $person->addToDepatment(1);
}
