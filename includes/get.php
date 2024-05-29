<?php 

require_once('database.php');

$json = file_get_contents("php://input"); // Get the JSON string
// The following lines are only useful inside the PHP script
$object = json_decode($json); // Convert JSON to a PHP object


$params = $object->parameters;

if(!$params) return;
$result = $database->getUser($params);

echo json_encode($result); 

// {function: "postRemarks", parameters: {message: "Test", ref_id: 17149, user_id: 1234}}
