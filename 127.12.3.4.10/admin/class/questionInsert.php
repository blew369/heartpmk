<?php
include_once('../config/function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$tdid = $_POST['tdid'];


$question = $_POST['question'];
$tiredid = $_POST['tiredid'];


if($tdid !=''){
    $sql = $conDB->Updatequestiontired($question, $tiredid, $tdid);
} else{
    $sql = $conDB->InsertQuestion($question, $tiredid, $tdid);
}

    

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>