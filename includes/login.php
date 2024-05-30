<?php

require_once('database.php');

if(isset($_POST['loginBtn'])) {

  // var_dump($_POST);

  $username = $_POST['username'];
  $password = $_POST['password'];

  $queries = (object) array("username"=>$username,"password"=>$password);

  $results = $database->login($queries);

  print_r($results);

  if($results) {
    if(count($results) >= 1) {
      if ( ! session_id() ) @ session_start();   
      $_SESSION['userdata'] = "";
      $_SESSION['username'] = "";
      
      header('Location: /transactions');
      
      $userData = (object) array(
        "username" => $results['username'],
        "firstname" => $results['first_name'],
        "lastname" => $results['last_name'],
        "mobile" => $results['mobile'],
        "email" => $results['email'],
      );

      $_SESSION['username'] = $results['username'];
      $_SESSION['userdata'] = $results;
    } 
  } else {
    header('Location: /login');
  }
}