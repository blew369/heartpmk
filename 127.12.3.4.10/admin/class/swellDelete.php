<?php
include_once('../config/function.php');
$conDB = new Db_con();
$swid = $_POST['id'];
if($swid != ''){
    echo "Success Fully";
    $sql = $conDB->Delteswellsymp($swid);
} else{
    echo "Error";
}




?>