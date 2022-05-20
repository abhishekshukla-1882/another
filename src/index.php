<?php

include "./autoloader.php";
require  './vendor/autoload.php';

$mongo = new \MongoDB\Client("mongodb://mongo",array("username"=>"root","password"=>"password123"));
$students = new classes\models\Students($mongo);

$students->name = "Abhishek Shukla";
// $students->roll_no = "1223";
$students->setName("Abhishek Shukla");
// echo $students->Name;

echo $students->getName();
// $students->update('628609469fdc5eebdf08fd52');
// $students->delete('628609469fdc5eebdf08fd52');
// $students->save();


echo "<pre>";
print_r($students->load());
