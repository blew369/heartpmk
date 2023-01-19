<?php
$swid = $_POST['id'];
include_once('../config/function.php');

$conDB = new Db_con();
$sql = $conDB->FetchSwellsymp($swid);
$row = $sql->fetch_assoc();

echo json_encode($row);


?>