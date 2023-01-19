<?php
$memberid = $_POST['id'];
include_once('../config/function.php');

$conDB = new Db_con();
$sql = $conDB->fetchupdatemember($memberid);
$row = mysqli_fetch_array($sql);

echo json_encode($row);


?>