<?php 
    include_once('../header.php'); 
    $perPage = 20;

    if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") {
        $id = $_SERVER['QUERY_STRING'];
        // var_dump($id);
        if(strpos($id, 'id=') !== false) {
            $id = explode("id=", $id);
            if(!$id[1]) header("Location: /transactions");
            $query = (object) array("product_id"=>$id[1]);
            $datas = $database->getData2('transid', $query,  NULL);
            
            include_once('single.php');
        } elseif (strpos($id, 'page=') !== false) {
            // $perPage = 20;
            $page = explode("page=", $id);
            $functions = (object) array(
                "ORDER BY"  => " pr_date DESC",
                "LIMIT"     => $perPage,
                "OFFSET"    => ($page[1] -1) * $perPage);
            $datas = $database->getData2('transid',NULL, $functions);

            include_once('all.php');
        } else {
            // include_once('single.php');
        }
        
    } else {
        $functions = (object) array(
            "ORDER BY"  => " pr_date DESC",
            "LIMIT"     => $perPage);
        $datas = $database->getData2('transid',NULL, $functions);
        
        include_once('all.php');
    }

    include_once('../modal/transaction-register.php');
    include_once('../footer.php'); ?>