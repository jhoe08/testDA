<?php
    // require_once('database.php');
    // require_once('users.php');

    // $database = new DatabaseConnection("localhost", "root", "", "test");
    // $database->connect();
    // $user = new User();

    // $user->setFirstname('John');
    // $user->setMiddlename('Smith');
    // $user->setLastname('Doe');
    // $user->setBirthday('1990-05-15'); // Assuming the format is YYYY-MM-DD
    // $user->setDepartment('HR');
    // $user->setPosition('Manager');
    // $user->setAddress('123 Main St');
    // $user->setCity('Metroville');
    // $user->setProvince('Central Visayas');

    // $database->closeConnection();



    function phoneFormat($number) { 
        $pattern = '/((\+[0-9]{2})|0)[.\- ]?9[0-9]{2}[.\- ]?[0-9]{3}[.\- ]?[0-9]{4}/';
        $format = '';
        // Pass phone number in preg_match function 
        if(preg_match($pattern, $number)) { 
            // Store value in format variable 
            // $format = $value[1] . '-' . $value[2] . '-' . $value[3]; 
            var_dump($number);
        } else { 
            // If given number is invalid 
            echo "Invalid phone number <br>"; 
        } 
          
        // Print the given format 
        echo $format;
    } 