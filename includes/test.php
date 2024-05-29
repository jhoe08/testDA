<?php 

require_once('database.php');

$json = file_get_contents("php://input"); // Get the JSON string
// The following lines are only useful inside the PHP script
$object = json_decode($json); // Convert JSON to a PHP object


// pagination($table, $offset, $perPage)
$result = $database->pagination($object->table, $object->offset, $object->perPage);

echo json_encode($result); 

// {function: "postRemarks", parameters: {message: "Test", ref_id: 17149, user_id: 1234}}
