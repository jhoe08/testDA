<?php
  require_once('users.php');

  $mysqli = new mysqli("localhost","root","","test");

  // Check connection
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  $user = new User();

$user->setFirstname('John');
$user->setMiddlename('Smith');
$user->setLastname('Doe');
$user->setBirthday('1990-05-15'); // Assuming the format is YYYY-MM-DD
$user->setDepartment('HR');
$user->setPosition('Manager');
$user->setAddress('123 Main St');
$user->setCity('Metroville');
$user->setProvince('Central Visayas');


// echo '</br>First Name: ' . $user->getFirstname();
// echo '</br>Last Name: ' . $user->getLastname();
// echo '</br>Birthday: ' . $user->getBirthday();

// echo '</br>Full Name: ' . $user->getFullname();


?>