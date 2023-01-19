<?php
include_once('../config/function.php');
$conDB = new Db_con();
$memberid = $_POST['id'];

$sql = $conDB->deletemembers($memberid);
?>