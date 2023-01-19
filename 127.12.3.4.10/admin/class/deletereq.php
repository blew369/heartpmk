<?php
include_once('../config/function.php');
$conDB = new Db_con();

$reid = $_POST['id'];

$sql = $conDB->DeleteRequest($reid);

?>