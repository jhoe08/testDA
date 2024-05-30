<?php 

require_once('database.php');
session_start();

$json = file_get_contents("php://input"); // Get the JSON string
// The following lines are only useful inside the PHP script
$object = json_decode($json); // Convert JSON to a PHP object


if($object->parameters || $object->function) {
  $params = $object->parameters;
  $function = $object->function;
}

switch ($function) {
  case 'saveTransaction':
    $queries = $params;
    $result = $database->saveData('transid', $queries);
    break;
  case 'viewAllTrans':
    $result = $database->getData2('transid', NULL, NULL);
    break;
  
  case 'registerBatchTrans':
    $user_id = $username ? $username : '7777777';
    $message = $object->remarks;
    foreach ($params as $key => $value) {
      $queries = (object) array("user_id"=>$username,"ref_id"=>$value, "message"=>$message);
      $result = $database->saveData('remarks', $queries );
    }
    break;

  case 'countItems':
    $table = $object->table;
    $field = $object->field;
    $conditions = $object->query;
    $result = $database->countItems($table, $field=NULL, $conditions=NULL);
    break;

  case 'pagination':
    $table = $object->table;
    $offset = $object->offset;
    $perPage = $object->perPage;

    $result = $database->pagination($table, $offset, $perPage);
    break;


  

  default:
    $database->closeConnection();
    break;
}

echo json_encode($result); 