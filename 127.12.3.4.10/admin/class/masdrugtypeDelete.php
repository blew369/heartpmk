<?php
include_once('../config/function.php');
$conDB = new Db_con();
$id = $_POST['id'];
if($id != ''){
    echo "Success Fully";
    $sql = $conDB->Deletemasdrugtype($id);
} else{
    echo "Error";
}




?>