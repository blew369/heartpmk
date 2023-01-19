<?php
include_once('../config/function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$postid = $_POST['id'];

echo $postid;


if($postid !=''){
    $sql = "SELECT post_image FROM post WHERE id='$postid'";
    $result = $conDB->dbcon->query($sql);
    $rows = $result->fetch_assoc();
    $fileimg = $rows['post_image'];

    @unlink('../../contentimg/'. $fileimg);


    $sql = "DELETE FROM post WHERE id='$postid'";
    $result = $conDB->dbcon->query($sql);

    return $result;

   
}
  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }
?>