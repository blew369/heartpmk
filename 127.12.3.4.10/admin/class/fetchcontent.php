<?php
$postid = $_POST['id'];
include_once('../config/function.php');

$conDB = new Db_con();
$sql = $conDB->fetchcontent($postid);
$row = $sql->fetch_assoc();

echo json_encode($row);


?>