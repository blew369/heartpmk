<?php
include_once('function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();

$reid = $_POST['req'];
$weight = $_POST['weight'];
$weight2 = $_POST['weightsum'];
$swellid = $_POST['swellid'];
$tiredid = $_POST['tiredid'];
$drug = $_POST['drug'];
$drug2 = $_POST['drugsum'];
$other1 = $_POST['other'];

if (($reid)!='') {
    $sql = $conDB->UpdateReuest($weight, $weight2, $swellid, $tiredid,  $drug,  $drug2, $other1, $reid);
  } else{
      echo "Error";
  }


  echo $reid."<br>";
  

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>