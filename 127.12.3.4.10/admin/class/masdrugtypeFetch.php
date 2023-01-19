<?php
$drugid = $_POST['id'];
include_once('../config/function.php');

$conDB = new Db_con();
$sql = $conDB->FetchmasDrugtype($drugid);
$row = $sql->fetch_assoc();

echo json_encode($row);


?>