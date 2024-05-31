
<?php 
    include_once('../header.php');  
    $perPage = 20;
    
    if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") {
      $id = $_SERVER['QUERY_STRING'];
      $id = explode("=", $id);

      $query = (object) array("username" => (int) $id[1]);
      $datas = $database->getUsers($query, NULL);
      // print_r($query);
      include_once('single.php');
    } else {
      $query = (object) array("LIMIT" => 10);
      $query = NULL;
      $datas = $database->getUsers(NULL, $query);
      include_once('all.php');
    }

include_once('../footer.php'); ?>