<?php
include_once('../config/function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
  $adid = $_POST['adid'];  
  $username =  $_POST['username'];
  $password = md5($_POST['password']);
 $name = $_POST['name'];
 $lname = $_POST['lname'];
 $role = $_POST['role'];

  if($adid !=''){
    $sql = $conDB->adminUpdate($username, $password, $name, $lname, $role, $adid);
    print_r($adid);
  }else{
    $sql = $conDB->adminRegister($username, $password, $name, $lname ,$role);
  }
  

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>