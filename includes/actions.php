<?php 
// header('Location: /');

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
    $result = $database->saveTransactions($queries);
    break;
  case 'updateTransaction':
    $conditions = (object) array("product_id" => $object->id);
    $result = $database->updateTransactions($params, $conditions);
    break;
  case 'removeTransaction':
    $queries = $params;
    $result = $database->removeTransactions($queries);
    break;
  case 'deleteTransaction':
    $queries = $params;
    $result = $database->deleteTransactions($queries);
    break; 
    
  case 'viewAllTrans':
    $result = $database->getTransactions();
    break;
  
  case 'registerBatchTrans':
    $user_id = '7777777';
    $message = $object->remarks;
    foreach ($params as $key => $value) {
      $queries = (object) array("user_id"=>$user_id,"ref_id"=>$value, "message"=>$message);
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