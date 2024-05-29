<?php
    require_once('database.php');
    require_once('users.php');

    $database = new DatabaseConnection("localhost", "root", "", "test");
    $database->connect();
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

    $database->closeConnection();