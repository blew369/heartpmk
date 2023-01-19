<?php
include_once('../config/function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
  $memberid = $_POST['memberid'];  
  $username =  $_POST['username'];
  $password = md5($_POST['password']);
  $hn = $_POST['hn'];
  $prename = $_POST['prename'];
  $patientname = $_POST['patientname'];
  $patientlname = $_POST['patientlname'];
  $address = $_POST['address'];
  $telnumber = $_POST['telnumber'];
  $weight = $_POST['weight'];
  $swellid = $_POST['swellid'];
  $tiredid = $_POST['tiredid'];
  $drugid = $_POST['drugid'];
  $drug = $_POST['drug'];
  $docnote = $_POST['docnote'];
  if($memberid !=''){
    $sql = $conDB->updatemembers($username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote, $memberid);
    print_r($drugid);
  }else{
    $sql = $conDB->registration($username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote);
  }
  

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>