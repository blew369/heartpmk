<?php
include_once('../config/function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$tireid = $_POST['tireid'];
$triedname = $_POST['tiredname'];
$tiredid = $_POST['tiredid'];


if($tireid !=''){
    $sql = $conDB->UpdateTiredsymp($triedname, $tiredid, $tireid);
} else{
    $sql = $conDB->InserttiredSymp($triedname, $tiredid);
}

    

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>