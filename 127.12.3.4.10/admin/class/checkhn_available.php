<?php
include_once('../config/function.php');

$hncheck = new DB_con();
// Get post value

$hn = $_POST['hn'];

$sql= $hncheck->checkhnavailable($hn);

if($sql->num_rows > 0){
    echo "<span style='color: red;'>HN นี้ถูกเชื่อมโยงกับบัญชีอื่นแล้ว.</span>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
} else {
    echo "<span style='color: green;'>HN สามารถใช้ลงทะเบียนได้.</span>";
    echo "<script>$('#submit').prop('disabled', false);</script>";
    }

?>