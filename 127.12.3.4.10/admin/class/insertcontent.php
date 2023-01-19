<?php
include_once('../config/function.php');
date_default_timezone_set("Asia/Bangkok");
$conDB = new Db_con();
$postid = $_POST['id'];



$post_title = $_POST['post_title'];
$post_content = $_POST['post_content'];
$post_image = $_FILES['post_image'];


if($postid !=''){
    $sql = $conDB->Updatecontent($post_title, $post_content, $post_image, $postid);
} else{
    $sql = $conDB->insertContent($post_title, $post_content, $post_image);
}

    

  if ($sql) {
    echo "Success Fully";
  } else{
      echo "Error";
  }

?>