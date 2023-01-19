<?php
include_once('../config/function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$swid = $_POST['swid'];
$swellname = $_POST['swellname'];
$swellid = $_POST['swellid'];


if($swid !=''){
    $sql = $conDB->Updateswellsymp($swellname, $swellid, $swid);
} else{
    $sql = $conDB->Insertswellsymp($swellname, $swellid);
}

    

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>