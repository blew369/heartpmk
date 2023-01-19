<?php
include_once('../config/function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$id = $_POST['id'];
$drugname = $_POST['drugname'];
$drugid = $_POST['drugid'];


if($id !=''){
    $sql = $conDB->Updatemasdrugtype($drugname, $drugid, $id);
} else{
    $sql = $conDB->Insertmasdrugtype($drugname, $drugid);
}

    

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>