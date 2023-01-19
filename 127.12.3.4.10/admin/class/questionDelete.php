<?php
include_once('../config/function.php');
$conDB = new Db_con();
$tdid = $_POST['id'];
if($tdid != ''){
    echo "Success Fully";
    $sql = $conDB->Deletequestion($tdid);
} else{
    echo "Error";
}




?>