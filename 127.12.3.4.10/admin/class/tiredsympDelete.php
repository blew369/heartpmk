<?php
include_once('../config/function.php');
$conDB = new Db_con();
$tiredid = $_POST['id'];
if($tiredid != ''){
    echo "Success Fully";
    $sql = $conDB->Deltetiredsymp($tiredid);
} else{
    echo "Error";
}




?>