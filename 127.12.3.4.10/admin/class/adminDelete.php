<?php
include_once('../config/function.php');
$conDB = new Db_con();
$adid = $_POST['id'];  

$sql = $conDB->adminDelete($adid);
?>