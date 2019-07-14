<?php
include('config_DB.php');
header('Content-Type: application/json');
	$database =new DBController();
echo json_encode( $database->runQuery("select * from product"));


?>
