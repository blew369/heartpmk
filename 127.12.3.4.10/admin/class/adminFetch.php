<?php
$adid = $_POST['id'];
include_once('../config/function.php');
$conDB = new Db_con();
$sql = $conDB->adminUpdateFetch($adid);
$row = $sql->fetch_assoc();

echo json_encode($row);


?>