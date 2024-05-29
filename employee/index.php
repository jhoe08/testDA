
<?php include_once('../header.php');  

if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") {
    $id = $_SERVER['QUERY_STRING'];
    $id = explode("=", $id);

    $query = (object) array("username"=>(int)$id[1]);
    $datas = $database->getData2('register', $query,  NULL);
    // print_r($query);
    include_once('single.php');
} else {
    $query = (object) array("LIMIT"=>'5, 5');
    $datas = $database->getData2('register',NULL, $query);
    include_once('all.php');
}

include_once('../footer.php'); ?>